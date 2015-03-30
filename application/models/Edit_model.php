<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edit_model extends CI_Model {
    
    function edit($username,$name,$email, $phone,$description, $user_id )
    {
        $data = array(
                        'username' =>$username,
                        'nume' => $name,
                        'email' =>$email,
                        'tel' =>$phone,
                        'descriere' =>$description,
                        'user_id' => $user_id
        );
        $this->db->where('user_id', $user_id);
        $this->db->update('user', $data); 
    }
    
    public function select_users_modify()
    {
        $query = $this->db
                    ->select('user.user_id')
                    ->select('user.username')
                    ->select('user.nume')
                    ->select('user.tel')
                    ->select('user.email')
                    ->select('user.descriere')
                    ->select('categorie.categorie')
                    ->select('rol.rol')
                    ->join('rol', 'user.user_id=rol.user_id')
                    ->join('categorie', 'user.user_id=categorie.user_id')
                    ->get('user');
        return $query->result();   
    }
}

