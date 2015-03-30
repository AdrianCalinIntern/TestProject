<?php

class User_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
   
    public function select_users($username)
    {
        $query = $this->db
                  ->select('user.user_id')
                  ->select('user.username')
                  ->select('user.nume')
                  ->select('user.tel')
                  ->select('user.email')
                  ->select('user.descriere')
                  ->select('rol.rol')
                  ->select('categorie.categorie')
                  ->join('rol', 'user.user_id=rol.user_id')
                  ->join('categorie', 'user.user_id=categorie.user_id')
                  ->where('username', $username)
                  ->get('user');
        if ($query->num_rows > 0)
        {
           return $query->result();  
           
        }
        return false;

    }
    
     function edit_user_data($name,$email, $phone,$description, $user_id )
    {
        $data = array(
//                        'username' =>$username,
                        'nume' => $name,
                        'email' =>$email,
                        'tel' =>$phone,
                        'descriere' =>$description,
                        'user_id' => $user_id
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data); 
    }
        
    }
?>

