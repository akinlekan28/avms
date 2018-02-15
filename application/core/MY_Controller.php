<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Controller
 *
 * @author Akintola Olalekan
 */
class MY_Controller extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->page_id = strtolower($this->uri->rsegment(1)).'_'.strtolower($this->uri->rsegment(2));
        $this->output->enable_profiler(TRUE);

    }
    
    
    
    public $page_id; 



    public $current_user;
        /**
     *  Make a controller acton secure
     * 
     * @return void
     */
    protected function _secure()
    {
        // user already logged in?
        if($this->current_user && $this->current_user->user_id)
        {
            return;
        }
        
        $this->_current_user();
        
        if(!$this->current_user || !$this->current_user->user_id)
        {
            redirect('Admin');
        }        
        
    }
    
    /**
     * Get crrent logged in user
     * @return User
     */
    protected function _current_user()
    {
        $id = $this->session->userdata("user_id");
        
        if($id)
        {
            $this->load->model('users');
            $this->current_user = $this->users->getOne('' , ['users.user_id' => $id]);
        }
    
        return $this->current_user;
    }

}
