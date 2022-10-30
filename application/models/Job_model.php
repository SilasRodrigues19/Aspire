<?php

class Job_model extends CI_Model {

  public function showJob()
  {
    $select = "SELECT * from jobs";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function totalJobs()
  {
    $select = "SELECT COUNT(*) AS countJobs FROM jobs;";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();
  }

  public function listJobLevel()
  {
    $select = "SELECT DISTINCT SUBSTRING(job_level, 1) AS job_level FROM jobs";

    $execute = $this->db->query($select);

    return ($execute->num_rows() > 0) ? $execute->result_array() : array();

  }


}