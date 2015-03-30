<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        session_start();
        
    }

    public function index()
	{
//        echo md5('');die();
        
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
            if ($this->form_validation->run()!==false)
            {
                //primeste date din model
                $this->load->model('Admin_model'); 
                $res = (array)$this
                        ->Admin_model
                        ->verify_user(
                                $this->input->post('username'),
                                md5($this->input->post('password')));  
                
                
            if($res !== false)
            {

                $session = array('username' => $res['username'],
                                'rol' => $res['rol'],
                                'categorie' => $res['categorie']
                    );
                
                $this->session->set_userdata($session);
                
                redirect('home');
            }
            }else
            {
                    $this->load->view('login_page');  
//                    echo '<script>alert("Username or password is incorrect. Please try againe");</script>';
            }    
	}
        
    public function select_user()
        {
                $this->load->model('Admin_model'); 
                $data['query'] = $this-> Admin_model -> select_users();
                $this->load->view('admin_page', $data); //admin view

        }
        
        
    public function insert_user(){
   
                $this->load->library('form_validation');
                $this->form_validation->set_rules('type', 'Type', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
                $this->form_validation->set_rules('phone', 'Phone', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                
                if ($this->form_validation->run()!==false)
                {
                    $this->load->model('Admin_model'); 
                    $re =(array)$this
                                    ->Admin_model
                                    ->insert_user(
                                            $pass = md5($this->input->post('password')),
                                            $name = $this->input->post('name'),
                                            $username = $this->input->post('username'),
                                            $email =$this->input->post('email'),
                                            $phone =$this->input->post('phone'),
                                            $descpiption = $this->input->post('description')
                                    );
                    
                    $last_user_id = $this-> Admin_model -> get_last_user_id(); //returneaza id-ul inregistrarii din tabela useri
                    foreach ($last_user_id as $row) 
                    {
                        $user_id = $row->user_id;
                    }
                    
                    $rol = (array)  $this
                                    ->Admin_model
                                    ->insert_user_rol(
                                           $type = $this->input->post('type'),
                                           $user_id
                                    ); 
                    $age = (array)  $this
                                    ->Admin_model
                                    ->insert_user_age(
                                           $age = $this->input->post('age'),
                                            $user_id
                                    ); 
                    
                    echo "Succes";
                } else {
                    echo "<script>alert('eroare validari');</script>";
                }
                
                //selectare useri
                $this->load->model('Admin_model'); 
                $data['query'] = $this-> Admin_model -> select_users();
                
                $contor = 0;
                foreach($data['query'] as $row) {
                    echo "<tr>";
                         echo '<tr>';
                    echo ' <td> ';
                    print $row->user_id.'</td>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->username.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->tel.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->email.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->descriere.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->nume.'<br>';
                    echo ' </td> ';
                    echo ' <td> ';
                    print $row->rol.'<br>';
                    echo ' </td> ';
                     echo ' <td> ';
                    print $row->categorie.'<br>';
                    echo ' </td> ';
                    echo '<td> <button href="#editUser" data-toggle="modal" class="btn btn-xs btn-primary" onclick="edit_user('.$contor.')"> Edit </button> </td>';
                echo '</tr>';
                $contor ++;
                    echo "</tr>";
                }    
               
        }
        
       public function edit_category()
       {
           $this->load->model('Admin_model');
           $remove =(array)$this
                                ->Admin_model
                                ->remove_category(
                                             $rem = $this->input->post('remove_category')
                                    );
           
           $ad =(array)$this
                            ->Admin_model
                            ->add_category(
                                            $add = $this->input->post('new_category')
                                    );  
           
           echo "Succes";
       }
       
       public function sort_asc()
       {
           $this->load->model('Admin_model'); 
                    $sort =(array)$this->Admin_model->sort_asc();
                    
                    //afisare date ordonate
                    $data['query'] = $this-> Admin_model -> sort_asc();
                    foreach($data['query'] as $row) {
                    $contor = 0;
                    echo "<tr>";
                        echo "<td>".$row->user_id."</td>";
                        echo "<td>".$row->username."</td>";
                        echo "<td>".$row->tel."</td>";
                        echo "<td>".$row->email."</td>";
                        echo "<td>".$row->descriere."</td>";
                        echo "<td>".$row->nume."</td>";
                        echo "<td>".$row->rol."</td>";
                        echo "<td>".$row->categorie."</td>";
//                        echo '<td> <button href="#editUser" data-toggle="modal" class="btn btn-xs btn-primary" onclick="edit_user('.$contor.')"> Edit </button> </td>';
                        $contor++;
                    echo "</tr>";
       }
       
       }
       
       public function sort_desc()
       {
           $this->load->model('Admin_model'); 
                    $sort =(array)$this->Admin_model->sort_desc();
                    
                    //afisare date ordonate
                    $data['query'] = $this-> Admin_model -> sort_desc();
                    foreach($data['query'] as $row) {
                    echo "<tr>";
                        echo "<td>".$row->user_id."</td>";
                        echo "<td>".$row->username."</td>";
                        echo "<td>".$row->tel."</td>";
                        echo "<td>".$row->email."</td>";
                        echo "<td>".$row->descriere."</td>";
                        echo "<td>".$row->nume."</td>";
                        echo "<td>".$row->rol."</td>";
                        echo "<td>".$row->categorie."</td>";
                    echo "</tr>";
       }
       }
}
