<?php

class Job_model extends MY_Model {


public function showJob($searchTerm = false, $whereClause = false)
{
    $where = false;

    if ($searchTerm && $whereClause) {

        $where = "WHERE CONCAT(job_title, job_requirements, job_link, job_email, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%' AND {$whereClause}";
    } elseif ($searchTerm) {

        $where = "WHERE CONCAT(job_title, job_requirements, job_link, job_email, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%'";
    } elseif ($whereClause) {

        $where = "WHERE {$whereClause}";
    }

    $select = "SELECT *, DATE_FORMAT(created_at, '%d/%m/%Y') AS dateString, DATE_FORMAT(created_at, '%H:%i:%s') AS timeString,
      CASE 
        WHEN job_currency = 'Real' THEN 'R$'
        WHEN job_currency = 'Dollar' THEN '$'
        WHEN job_currency = 'Euro' THEN '€'
      END AS job_currency_symbol
    FROM jobs {$where}";

    #echo $select; exit;

    $execute = $this->db->query($select);
    

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
}


  public function getJobById($job_id) 
  {
    $select = "SELECT * FROM jobs WHERE job_id = " . $this->db->escape($job_id);

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function showJobCount($searchTerm = false)
  {
    $where = false;

    if($searchTerm) {
      $where = "WHERE CONCAT(job_title, job_requirements, job_link, job_level, job_salary, job_currency, job_mode, job_contract) LIKE '%{$searchTerm}%'";
    }

    $select = "SELECT COUNT(*) AS count FROM jobs {$where}";

    //echo $select; exit();

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function totalJobs()
  {
    $select = "SELECT COUNT(*) AS countJobs FROM jobs WHERE job_is_archived = 0";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function deleteJob($id)
  {

    $delete = "DELETE FROM jobs WHERE job_id = '$id'";
    $execute = $this->db->query($delete);

    if($execute) {
      return array (
            'success' => true,
            'msg' => 'A vaga foi deletada com sucesso',
        );
    } else {
      return array (
            'success' => false,
            'msg' => 'Erro ao deletar vaga',
        );
    }
  }

  public function totalArchivedJobs()
  {
    $select = "SELECT COUNT(*) AS countArchivedJobs FROM jobs WHERE job_is_archived = 1";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }


  public function addJob($dados)
  {

    $this->load->library('session');


    $user = $this->session->userdata('usuario');

    $job_post_user = $user->user_name . ' - ' . $user->user_email;

    $job_id = $this->generateUUID();


    $insert = "INSERT INTO jobs (job_id, job_title, job_requirements, job_link, job_level, job_currency, job_mode, job_contract, job_email, job_salary, job_experience, job_is_archived, job_observation, job_post_user) 
    VALUES ('{$job_id}', '{$dados['job_title']}', '{$dados['job_requirements']}', '{$dados['job_link']}', '{$dados['job_level']}', 
            '{$dados['job_currency']}', '{$dados['job_mode']}', '{$dados['job_contract']}', '{$dados['job_email']}', '{$dados['job_salary']}', 
            '{$dados['job_experience']}', false, '{$dados['job_observation']}', '{$job_post_user}')";

    $execute = $this->db->query($insert);

    return ($execute) ? true : false;
  }

  public function updateJob($dados, $job_id)
  {
      $this->load->library('session');
      $user = $this->session->userdata('usuario');
      $job_post_user = $user->user_name . ' - ' . $user->user_email;

      $update = "UPDATE jobs 
                SET job_title = '{$dados['job_title']}',
                    job_requirements = '{$dados['job_requirements']}',
                    job_link = '{$dados['job_link']}',
                    job_level = '{$dados['job_level']}',
                    job_currency = '{$dados['job_currency']}',
                    job_mode = '{$dados['job_mode']}',
                    job_contract = '{$dados['job_contract']}',
                    job_email = '{$dados['job_email']}',
                    job_salary = '{$dados['job_salary']}',
                    job_experience = '{$dados['job_experience']}',
                    job_observation = '{$dados['job_observation']}'
                WHERE job_id = '{$job_id}'";

      $execute = $this->db->query($update);

      return ($execute) ? true : false;
  }


  public function archivedJobs()
  {

    $select = "SELECT *, CASE 
                          WHEN job_currency = 'Real' THEN 'R$'
                          WHEN job_currency = 'Dollar' THEN '$'
                          WHEN job_currency = 'Euro' THEN '€'
                        END AS job_currency_symbol 
              FROM jobs WHERE job_is_archived = 1";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();

  }

  public function archiveJob($id)
  {
    $query = "SELECT job_is_archived FROM jobs WHERE job_id = '$id'";
    $result = $this->db->query($query);
    $row = $result->row();
    $current_value = $row->job_is_archived;

    //echo $current_value; exit;

    $new_value = ($current_value == 0) ? 1 : 0;
    $update = "UPDATE jobs SET job_is_archived = {$new_value} WHERE job_id = '$id'";

    //echo $update; exit;
    $execute = $this->db->query($update);

    return ($execute) ? true : false;
  }

  public function getPublishedJobsByUser()
  {
    $this->load->library('session');

    $user = $this->session->userdata('usuario');

    $job_post_user = $user->user_name . ' - ' . $user->user_email;

    $query = "SELECT * FROM jobs WHERE job_post_user = " . $this->db->escape($job_post_user);

    $execute = $this->db->query($query);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();

  }

  public function getReportedJobs()
  {

    $select = "SELECT A.report_job_id, A.report_reason,
                  IF(LENGTH(A.report_observation) = 0, 'Nenhuma observação', report_observation) report_obs, 
                  CONCAT(B.user_name, ' (', B.user_email, ')') user_name, C.job_title, A.created_at reported_at,
                CASE A.report_reason
                  WHEN 'Fraudulent' THEN 'A vaga parece ser fraudulenta'
                  WHEN 'Misleading' THEN 'A vaga parece ser enganosa'
                  WHEN 'discriminatory' THEN 'A vaga parece ser discriminatória'
                  WHEN 'illegal' THEN 'A vaga parece ser ilegal'
                  WHEN 'invalid' THEN 'A postagem não é uma vaga'
                END AS report_reason_text 
              FROM report A
                  LEFT JOIN users B ON 
                    A.report_by = B.user_id
                  LEFT JOIN jobs C ON
                    A.report_job_id = C.job_id
                ";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();

  }

  public function reportJob($dados)
  {

    $this->load->library('session');

    $user = $this->session->userdata('usuario');

    $report_by = $user->user_id;

    $verify = "SELECT job_id, job_title FROM jobs WHERE job_id = '{$dados['report_job_id']}'";

    $execute = $this->db->query($verify);


    if($execute->num_rows() > 0) {

      $result_array = $execute->result_array();
      $job_title = $result_array[0]['job_title'];

      $report_id = $this->generateUUID();

      $insert = "INSERT into report (report_id, report_job_id, report_reason, report_observation, report_by)
      VALUES ('{$report_id}', '{$dados['report_job_id']}', '{$dados['report_reason']}', '{$dados['report_observation']}', '{$report_by}')";

      $execute = $this->db->query($insert);

      return array (
            'success' => true,
            'msg' => 'A vaga <strong>' . $job_title . '</strong> foi reportada',
        );

    } else {
      return array (
            'success' => false,
            'msg' => 'O ID informado não foi localizado',
        );
    }
  }

}