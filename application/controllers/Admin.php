<?php

class Admin extends MY_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->model('users');
    }

   public function index()
    {
        $data = [];
        $message = $this->session->flashdata('message');
        if($message) 
        {
         $data['message'] = $message['message'];
         $data['response'] = $message['response'];
        }
        if($this->input->post() && $this->form_validation->run('login'))
            {
                $post = $this->input->post();
                $clean = $this->security->xss_clean($post);
        
                $success = $this->users->getOne('', array('is_delete' => 0, 'email' => $clean['email'], 'password' => md5($clean['password'])));
                if($success->user_id)
                {
                  $this->session->set_userdata("user_id" , $success->user_id);
                  redirect('dashboard');
                }
                  else {
                      $data['response'] = FALSE;
                      $data['message'] = "Login Unsuccessful | Check your login credentials";
                  }
              }
        
        $this->load->view('admin/auth/login', $data);
    }

    public function signup()
    { 
        $data = [];

        if($this->input->post() && $this->form_validation->run('signup'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);
  
            $getEmail = $this->users->getOne('', array('is_delete' => 0, 'email' => $clean['email']));
  
            $value = array(
                'firstname' => $clean['firstname'],
                'lastname' => $clean['lastname'],
                'email' => $clean['email'],
                'password' => md5($clean['password']),
                'privilege' => "Staff",
                'date_registered' => date("Y-m-d"),
            );
  
            if($getEmail->user_id)
            {
                $data['response'] = FALSE;
                $data['message'] = "Email Already in the Database";
            }
            else {
                $success = $this->users->insert($value);
  
                if($success)
                {
                    $data['response'] = TRUE;
                    $data['message'] = "User Account Created | Login";
                }
                else
                {
                    $data['response'] = FALSE;
                    $data['message'] = "Error Creating User Account";
                }
            }
        }
  
        $this->load->view('admin/auth/signup',$data);
    }

    public function signout()
    {
        $this->_secure();
        $this->session->sess_destroy();
        redirect('admin');
    }

}


?>