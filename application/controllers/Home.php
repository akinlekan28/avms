<?php

class Home extends MY_Controller{

  public function __construct(){
        parent::__construct();
        $this->load->model(array(
          'material',
          'due',
          'exco',
          'category',
          'blog',
          'comment',
          'news',
          'siteviews'
        ));
    }

  public function index(){

    $this->siteviews->add_count(1);
    $this->siteview->_output('site/homepage');
  }

  public function annual_dues(){
    
    $data['dues'] = $this->due->getAll('', array('is_delete' => 0));
    $this->siteview->_output(['site/due'], $data);
  }

  public function study_materials(){

        // $config['base_url'] = site_url('home/study_materials');
        // $config['total_rows'] = $this->db->count_all('material');
        // $config['per_page'] = 9;
        // $config['attributes'] = array('class' => 'pagination-links');

        // $this->pagination->initialize($config);

    $data['materials'] = $this->material->allMaterials();
    $this->siteview->_output(['site/materials'], $data);
  }

  public function download($id){
        if(!empty($id)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->material->allMaterials(array('material_id' => $id));
            
            //file path
            $file = 'uploads/material/'.$fileInfo['material'];
            
            //download file from directory
            force_download($file, NULL);
        }
  }

  public function blog(){

    $data = [];
    $this->siteview->_output(['site/blog'], $data);
  }
}

?>