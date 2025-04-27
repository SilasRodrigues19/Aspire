<?php

class Auth_model extends MY_Model {

  public function checkUsernameExists($username)
  {
    $query = "SELECT COUNT(*) as count FROM users WHERE user_name = ?";
    $result = $this->db->query($query, array($username));
    $row = $result->row();
    return ($row->count > 0) ? true : false;
  }

 public function checkEmailExists($email)
 {
    $query = "SELECT COUNT(*) as count FROM users WHERE user_email = ?";
    $result = $this->db->query($query, array($email));
    $row = $result->row();
    return ($row->count > 0) ? true : false;
 }

  public function signUpUser($data)
  {
     $usernameExists = $this->checkUsernameExists($data['user']);
     $emailExists = $this->checkEmailExists($data['email']);
 
     if ($usernameExists) {
         return 'Username already exists.';
     }
 
     if ($emailExists) {
         return 'Email already exists.';
     }
 
     $argon_password = password_hash($data['password'], PASSWORD_ARGON2I);
     $user_id = $this->generateUUID();
 
     $insert = "INSERT INTO users (user_id, user_name, user_password, user_email, created_at) VALUES 
     ('{$user_id}', '{$data['user']}', '{$argon_password}', '{$data['email']}', NOW())";
 
     $execute = $this->db->query($insert);
 
     return ($execute) ? true : false;
  }


  public function isUserActive($username)
  {
     $this->db->select('user_is_active');
     $this->db->where('user_name', $username);
     $select = $this->db->get('users');

     if ($select->num_rows() > 0) {
         $user = $select->row();
         return $user->user_is_active == 1;
     }

     return false;
  }



  public function signInUser($data)
  {
    $username = $data['user'];
    $this->db->where('user_name', $username);
    $select = $this->db->get('users');

    if ($select->num_rows() > 0) {
        $user = $select->row();
        $is_active = $this->isUserActive($username);

        if (!$is_active) {
            return array(
                'success' => false,
                'error' => 'O usuário <strong>' . $username . '</strong> está inativo',
            );
        }

        if (password_verify($data['password'], $user->user_password)) {
            return array(
                'success' => true,
                'user' => $user,
            );
        }
    }

    return array(
        'success' => false,
        'error' => 'Usuário ou senha incorretos.',
    );
  }

  public function validateMail($dados)
  {

    $this->db->where('user_email', $dados['email']);
    $select = $this->db->get('users');

    if ($select->num_rows() > 0) {
        return array (
              'success' => true,
              'mail' => $dados['email'],
          );
    } else {
        return array (
              'success' => false,
              'error' => 'Email não encontrado',
          );
    }
  }

  public function getEmailSecret() 
  {
      $select = "SELECT MAX(email_secret) as email_secret FROM email";
      $execute = $this->db->query($select);
      $row = $execute->row();
      return ($execute->num_rows() > 0) ? $row->email_secret : null;
  }

  public function resetPassword($data)
  {
    $argon_password = password_hash($data['newPassword'], PASSWORD_ARGON2I);

    $this->db->where('user_email', $this->input->get('email'));
    $update = $this->db->update('users', array('user_password' => $argon_password));

    //echo $this->db->last_query(); exit;

    if ($update) {
        return array (
            'success' => true,
            'msg' => 'Senha redefinida com sucesso',
        );
    } else {
        return array (
            'success' => false,
            'msg' => 'Falha ao redefinir sua senha',
        );
    }
  }

}