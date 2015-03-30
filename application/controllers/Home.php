<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
//                $this->session->sess_destroy();
                
                if (!$this->session->userdata('username')){
                   redirect('Admin');
                }
                
                if($this->session->userdata('rol') != 'admin') {
 
                    redirect('User/select_user');
                }
                
                $rol = $this->session->userdata('rol');

                if ($rol == 'admin') {
                       redirect('Admin/select_user');
                }

                
	}
        
}

