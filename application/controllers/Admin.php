<?php

class Admin extends MY_Controller{

   public function __construct(){
        parent::__construct();
        $this->load->model(array('users', 'tokens'));
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

    public function resetpassword(){

        $data = [];
        if($this->input->post() && $this->form_validation->run('forgot')){
            $post = $this->input->post();

            $clean = $this->security->xss_clean($post);
            $email = $clean['email'];
            
            
            $sender = "reset@avmsfunaab.com.ng";
            $subject = "Password Reset Link";

            $emailCheck = $this->users->getUser($email);
        
            if($emailCheck){
                $token = $this->users->insertToken($email, $emailCheck->user_id);
                $qstring = $token;
                $url = site_url('admin/confirm_password/'.$qstring);
                $link = '<a href="' . $url . '">' . $url . '</a>';
                $name = $emailCheck->lastname . " " . $emailCheck->firstname;
                $message = '';
                $message .= '<strong>Hello' . ' '. $name . ' ' . '<br>You Requested to reset your password on Avms Funaab web portal</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link . '<strong> to Reset</strong>';
                $this->_sendEmail($sender , $email , $subject , $message);
                
                $data['response'] = TRUE;
                $data['message'] = "Password Reset Link Sent to your Mail";
            } else {
                $data['response'] = FALSE;
                $data['message'] = "Cannot Verify Email.";
            }
        }
        $this->load->view('admin/auth/forgot', $data);
    }


  public function confirm_password()
  {       
          $token = $this->uri->segment(3);
          $token_user = $this->users->getByToken($token);

          if(!$token_user  || !$token_user->token )
          {
              $data['response'] = false;
              $data['message'] = "Token Not Valid";

              
          }
          else{
            if($this->input->post() && $this->form_validation->run('confirm'));
            {
                $post = $this->input->post();
                
                $createPassword = md5($post['password']);
                
                $success = $this->users->update_password($createPassword, $token_user->user_id);

                if($success)
                {
                     $data['response'] = true;
                     $data['message'] = "Password Successfully Changed! you can now Login";
                     
                }
                else{
                     $data['response'] = false;
                     $data['message'] = "Error Updating your Password";
                     $this->load->view("admin/auth/resetpassword", $data);
                    return;
                }
                
                $this->session->set_flashdata('message' , $data);
                redirect('admin');
            }
          }
                
          $this->load->view('admin/auth/changepassword' , $data);
  }
 
   protected function _sendEmail($sender , $email , $subject , $body)
   {

     $ci = & get_instance();
     $ci->load->library('email');


    $ci->email->set_newline("\r\n");
    $ci->email->from($sender , 'Avms Funaab Password Reset');
    $ci->email->to($email);
    $ci->email->subject($subject);

    $ci->email->message($body);

    if($ci->email->send())
    {
          $data['response'] = true;
          $data['message'] =  "Email successfully Sent";
    }
    else
    {
         $data['response'] = false;
         $data['message'] = "Error sending Email.";
    }

   }

}


?>