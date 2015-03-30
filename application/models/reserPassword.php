<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reserPassword extends CI_Model {
    
    
    public function email_check($email){
        $q_email = $this->db
                    ->select('user.email')
                    ->where('email', $email)
                    ->limit(1)
                    ->get('user');
        if ($q_email->num_rows > 0)
        {
           return $q_email->row();    
        }
        return false;
    }
    
    public function new_password($new_pass,$email)
    {
       $data = array('password'=>md5($new_pass));
       $this->db->where('email', $email);
       $this->db->update('user', $data); 
    }
    }