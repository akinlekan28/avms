<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 1:34 AM
 */
class Adminview
{
    protected $CI;

    public function __construct()
    {
        $this->CI = &get_instance();

        $this->CI->load->library('session');
    }
    public function _output($view_url, $data = array())
    {
        $this->CI->load->model('page_data');
        $data['view_url'] = &$view_url;
        $data['u'] = $this->CI->current_user;
        $page_data = $this->CI->page_data->get_data($this->CI->page_id);


        $data['page_title'] = $page_data['title'];
        $data['page_info'] = $page_data['info'];
        $data['page_links'] = $page_data['links'];
        $data['tab'] = $page_data['tab'];
        $this->CI->load->view('layout/admin_view', $data);
    }
}