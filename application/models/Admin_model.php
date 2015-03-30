<?php

class Admin_model extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    public function verify_user($username, $password){
        $q = $this->db
                    ->select('user.username')
                    ->select('user.password')
                    ->select('categorie.categorie')
                    ->select('rol.rol')
                    ->join('rol', 'user.user_id=rol.user_id')
                    ->join('categorie', 'user.user_id=categorie.user_id')
                    ->where('username', $username)
                    ->where('password', $password)
                    ->limit(1)
                    ->get('user');
        if ($q->num_rows > 0)
        {
           return $q->row();    
        }
        return false;
    }
    public function select_users()
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
    public function insert_user($pass,$name,$username,$email,$phone,$descpiption)
    {
        $data = array(
                    'username' => $username,
                    'nume' => $name,
                    'password' =>($pass),
                    'email' => $email,
                    'tel' => $phone,
                    'descriere' =>$descpiption,
        );
        $this->db->insert('user', $data);
    } 
    public function insert_user_rol($type, $user_id)
    {
        $data = array ('rol' => $type, 'user_id' => $user_id);
        
        $this->db->insert('rol', $data);
    }
    public function insert_user_age($age, $user_id)
    {
        $date = array ('categorie' => $age, 'user_id' => $user_id);
        $this->db->insert('categorie', $date);
 
    }

    public function get_last_user_id() {
         $query = $this->db
                    ->select('user.user_id')
                    ->order_by('user_id', 'DESC')
                    ->limit('1')
                    ->get('user');
        return $query->result();
    }
    
    public function remove_category($rem)
    {
        $this->db->delete('categorie', array('categorie' => $rem));
 
    }

    public function add_category($add)
    {
        $this->db->insert('categorie', array('categorie' => $add));
    }
    
    public function sort_asc()
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
                    ->order_by('user.username', 'ASC')
                    ->join('rol', 'user.user_id=rol.user_id')
                    ->join('categorie', 'user.user_id=categorie.user_id')
                    ->get('user');
        return $query->result();   
    }
    
    public function sort_desc()
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
                    ->order_by('user.username', 'DESC')
                    ->join('rol', 'user.user_id=rol.user_id')
                    ->join('categorie', 'user.user_id=categorie.user_id')
                    ->get('user');
        return $query->result();   
    
    }
    
}
?>

