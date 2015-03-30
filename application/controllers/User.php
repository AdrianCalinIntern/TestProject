<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
        
    public function select_user()
    {
        $this->load->model('User_model'); 
        $d['query'] = $this->User_model->select_users($username = $this->session->userdata('username'));
        $this->load->view('welcome_message',$d); //user view
    }
    
    public function edit()
    {
            $delay = sleep(1);//asteapta pana formul js
            $this->load->model('User_model');
            $this->User_model->edit_user_data(
//                                        $username = $this->input->post('username'),
                                        $name = $this->input->post('name'),
                                        $email = $this->input->post('email'),
                                        $phone = $this->input->post('phone'),
                                        $describe = $this->input->post('describe'),
                                        $user_id = $this->input->post('user_id')
                                );
            
             $data['query'] = $this-> User_model -> select_users($username = $this->session->userdata('username'));
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
                        echo '<td> <button href="#editUser" data-toggle="modal" class="btn btn-xs btn-primary" onclick="edit_user('.$contor.')"> Edit </button> </td>';
                        $contor++;
                        
                    echo "</tr>";
       }
    
}

}
