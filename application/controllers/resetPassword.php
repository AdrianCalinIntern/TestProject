<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class resetPassword extends CI_Controller {
 
    function resetPass()
    {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'required');
                if ($this->form_validation->run()!==false)
                {
                   //verificare email existent in db
                   $this->load->model('reserPassword');
                   $valid_email = $this->reserPassword->email_check($email = $this->input->post('email'));
                   if($valid_email!==false)
                   {
                       $email = $this->input->post('email');
                       $new_pass = random_string('alnum', 10);//generare parola noua random
                       $this->reserPassword->new_password($new_pass,$email);
                       //trimitere mail
                       

                        //Send mail using gmail from localhost
                        $config = Array( 
                                'protocol' => 'smtp', 
                                'smtp_host' => 'ssl://smtp.googlemail.com', 
                                'smtp_port' => 465, 
                                'smtp_user' => 'adrian.calin991@gmail.com',  
                                'smtp_pass' => '**********',
                                'mailtype' => 'html', 
                                'charset' => 'iso-8859-1', 
                                'wordwrap' => TRUE 
                                ); 

                                $message = $new_pass; 
                                $this->load->library('email', $config); 
                                $this->email->set_newline("\r\n"); 
                                $this->email->from('adrian.calin991@gmail.com'); // here goes your mail 
                                $this->email->to(email);// here goes your mail 
                                $this->email->subject('Resset pwd'); 
                                $this->email->message($message); 
                                if($this->email->send()) 
                                { 
                                    echo 'Email sent.'; 
                                } 
                                else 
                                { 
                                    show_error($this->email->print_debugger()); 
                                } 

                        } else{echo 'Email not exist in db';}
                    }
  
    }
    
}
