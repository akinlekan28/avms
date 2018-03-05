<?php

  class Siteviews extends MY_Model{
    public $page_id;

    public $page_count;

    protected $table = 'siteviews';

    protected $primary = 'page_id';

    public $columns = array(

      'page_id'=> array(
              'type' => 'INT',
              'constraint' => 11,
              'default' => 1
          ),

          'page_count' =>array(
              'type' => 'INT',
              'constraint'=> 11,
              'null' => FALSE,
          ),
      );


      public function add_count($id)
    {
        $this->load->helper('cookie');

        $check_visitor = $this->input->cookie(urldecode($id), FALSE);

        $ip = $this->input->ip_address();

        if ($check_visitor == false) {
            $cookie = array(
                "name"   => urldecode($id),
                "value"  => "$ip",
                "expire" =>  time() + 7200,
                "secure" => false
            );
            $this->input->set_cookie[$cookie];

            $this->siteviews->update_counter(urldecode($id));
        }
    }

    public function update_counter($id) {

        $this->db->where('page_id', urldecode($id));

        $this->db->select('page_count');

        $count = $this->db->get('siteviews')->row();

        $this->db->where('page_id', urldecode($id));

        $this->db->set('page_count', ($count->page_count + 1));

        $this->db->update('siteviews');
    }
 }

?>
