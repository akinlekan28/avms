<?php

  class Dashboard extends MY_Controller{
     public function __construct(){
        parent::__construct();
        $this->load->model(array(
          'users',
          'material',
          'due',
          'exco',
          'category',
          'blog'
        ));
        $this->_secure();
    }

    public function index(){

      $this->adminview->_output('admin/dashboard');
    }

    public function addnews(){

       $this->adminview->_output('admin/news/add');
    }

    public function materials(){

      if($this->input->post() && $this->form_validation->run('material')) {

        if($_FILES) {

            $post = $_FILES;

            $config['upload_path'] = './uploads/material';
            $config['allowed_types'] = '*';
            $config['overwrite'] = TRUE;
            $config['max_size'] = 200000;
            $config['file_name'] = $this->input->post('material_name');

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('material')) {
                    $values = array(
                        'material' => 'uploads/material/' . $this->upload->data('file_name'),
                        'material_name' => $this->input->post('material_name'),
                        'author' => $this->input->post('author'),
                        'date_added' => date("Y-m-d H:m:s"),
                        'user_id' => $this->current_user->user_id,
                    );

                    $success = $this->material->insert($values);

                    if ($success) {
                        $data['response'] = TRUE;
                        $data['message'] = "Material Successfully Uploaded";
                    } else {
                        $data['response'] = FALSE;
                        $data['message'] = "Error Uploading Material";
                    }
                
            } else {

                $data['response'] = FALSE;
                $data['message'] = $this->upload->display_errors();
            }

        }
      }
      
        $data['materials'] = $this->material->getAll('', array('is_delete' => 0), '', '', '', '', 'material_id');

        $this->adminview->_output(['admin/materials/materials'], $data);
    }

    public function deleteMaterial($material_id){
       $material = $this->material->getOne('', array('material_id' => $material_id, 'is_delete' => 0));

        if(!$material->material_id)
        {
            echo json_encode(0);
        }
        elseif($material->material_id)
        {
            $fileName = $material->material;
            $success = $this->material->deleteMaterial($material_id, $fileName);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }

    public function dues(){

      if($this->input->post() && $this->form_validation->run('due')){

        $post = $this->input->post();
        $clean = $this->security->xss_clean($post);

        $values = array(
          'due_name' => $clean['due_name'],
          'price' => number_format($clean['price'] , 0 , '.' , ','),
          'date_added' => date("Y-m-d H:m:s"),
          'user_id' => $this->current_user->user_id,
        );

        $success = $this->due->insert($values);

        if($success){
          $data['response'] = TRUE;
          $data['message'] = "Due Successfully Added";
        } else{
          $data['response'] = FALSE;
          $data['message'] = "Error Adding Due";
        }
      }
      $data['dues'] = $this->due->getAll('', array('is_delete' => 0), '', '', '', '', 'date_added');

       $this->adminview->_output(['admin/dues/dues'], $data);
    }

    public function editDue($due_id){

      $due = $this->due->getOne('', array('due_id' => $due_id, 'is_delete' => 0));

        if($this->input->post() && $this->form_validation->run('due'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'due_name' => $clean['due_name'],
                'price' => number_format($clean['price'] , 0 , '.' , ',')
            );
            $success = $this->due->update($values, $due_id);
            if($success)
            {
                $data['response'] = TRUE;
                $data['message'] = 'Due Successfully Updated';
            }
            else
            {
                $data['response'] = FALSE;
                $data['message'] = 'Error Updating Due Details';
            }
        }
        $data['due'] = $due;

        $this->load->view('admin/dues/editdue', $data);
    }

    public function deleteDue($due_id){

       $due = $this->due->getOne('', array('due_id' => $due_id, 'is_delete' => 0));

        if(!$due->due_id)
        {
            echo json_encode(0);
        }
        elseif($due->due_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $due->update($value , $due_id);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }

    public function executives(){

      if($this->input->post() && $this->form_validation->run('exco')){

        $post = $this->input->post();
        $clean = $this->security->xss_clean($post);

            $config['upload_path'] = './uploads/excos';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['overwrite'] = TRUE;
            $config['max_size']  = 20000;
            $config['max_width'] = 0;
            $config['max_height'] = 0;
            $config['file_name'] = $clean['fullname'];

            $this->load->library('upload', $config);

            if(!$this->upload->do_upload('pic'))
            {

                $data['response'] = FALSE;
                $data['message'] = $this->upload->display_errors();
            }
            else {

                $values = array(
                    'fullname' => $clean['fullname'],
                    'position' => $clean['position'],
                    'level' => $clean['level'],
                    'phone' => $clean['phone'],
                    'nick' => $clean['nick'],
                    'pic' => 'uploads/excos/' . $this->upload->data('file_name'),
                    'classSession' => $clean['classSession']
                );

                $success = $this->exco->insert($values);

                if($success){
                    $data['response'] = TRUE;
                    $data['message'] = "Executive Information Successfully Added";
                }
                else{
                    $data['response'] = FALSE;
                    $data['message'] = "Error Adding Executive Information";
                }
            }
      }

      $data['excos'] = $this->exco->getAll('', array('is_delete' => 0), '', '', '', '', 'exco_id');

      $this->adminview->_output(['admin/excos/excos'], $data);
    }

    public function editExco($exco_id){

        $exco = $this->exco->getOne('', array('exco_id' => $exco_id, 'is_delete' => 0));

        if($this->input->post() && $this->form_validation->run('exco'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'fullname' => $clean['fullname'],
                'position' => $clean['position'],
                'level' => $clean['level'],
                'phone' => $clean['phone'],
                'nick' => $clean['nick'],
                'classSession' => $clean['classSession']
            );

            $success = $this->exco->update($values, $exco_id);

            if($success)
            {
                $data['response'] = TRUE;
                $data['message'] = 'Executive details Successfully Updated';
            }
            else
            {
                $data['response'] = FALSE;
                $data['message'] = 'Error Updating Executive Details';
            }
        }

      $data['exco'] = $exco;

      $this->load->view('admin/excos/editexco', $data);
    }

    public function deleteExco($exco_id){

      $exco = $this->exco->getOne('', array('exco_id' => $exco_id, 'is_delete' => 0));

        if(!$exco->exco_id)
        {
            echo json_encode(0);
        }
        elseif($exco->exco_id)
        {
           $fileName = $exco->pic;
            $success = $this->exco->deleteExecutive($material_id, $fileName);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }
    }

    public function access(){

      if(!$this->current_user->is(array('Admin')))
        {
            $data['title'] = "Access Denied";
            $data['message'] = 'You do not have permission to visit this page!';

            $this->load->view('errors/404' , $data);

            return;
        }

        if ($this->input->post() && $this->form_validation->run('access'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);
            $user = $clean['user_id'];

            $value = array(
                'privilege' => $clean['privilege']
            );

            if($this->current_user->privilege == "Admin")
            {
                $success = $this->users->update($value, $user);

                if($success) {
                    $data['response'] = TRUE;
                    $data['message'] = "User Access level updated Successfully";
                }else {
                    $data['response'] = FALSE;
                    $data['message'] = "Error Updating User Access Level";
                }
            }

        }

      $data['users'] = $this->users->getAll('', array('is_delete' => 0, 'user_id !=' => $this->current_user->user_id));

      $this->adminview->_output('admin/auth/access', $data);
    }

    public function categories(){

        if($this->input->post() && $this->form_validation->run('addcat')){

            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'category_name' => $clean['category_name'],
                'category_description' => $clean['category_description'],
            );

            $success = $this->category->insert($values);

            if($success)
            {
                $data['response'] = TRUE;
                $data['message'] = 'Category Successfully Added';
            }
            else
            {
                $data['response'] = FALSE;
                $data['message'] = 'Error Adding Category Details';
            }
        }

      $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
      $this->adminview->_output(['admin/blog/categories'], $data);
    }

    public function editCategory($category_id){

         $category = $this->category->getOne('', array('category_id' => $category_id, 'is_delete' => 0));

        if($this->input->post() && $this->form_validation->run('addcat'))
        {
            $post = $this->input->post();
            $clean = $this->security->xss_clean($post);

            $values = array(
                'category_name' => $clean['category_name'],
                'category_description' => $clean['category_description']
            );

            $success = $this->category->update($values, $category_id);

            if($success)
            {
                $data['response'] = TRUE;
                $data['message'] = 'Category Details Successfully Updated';
            }
            else
            {
                $data['response'] = FALSE;
                $data['message'] = 'Error Updating Category Details';
            }
        }

        $data['category'] = $category;

        $this->load->view('admin/blog/editcat', $data);
    }

    public function deleteCategory($category_id){

        $category = $this->category->getOne('', array('category_id' => $category_id, 'is_delete' => 0));

        if(!$category->category_id)
        {
            echo json_encode(0);
        }
        elseif($category->category_id)
        {
            $value = array(
                'is_delete' => 1
            );

            $success = $category->update($value , $category_id);

            if($success)
            {
                echo json_encode(1);
            }
            else
            {
                echo json_encode(0);

            }
        }

    }

    public function addpost(){

        $data['categories'] = $this->category->getAll('', array('is_delete' => 0));
        $this->adminview->_output(['admin/blog/addpost'], $data);
    }

    public function viewpost(){

        $data['blogPosts'] = $this->blog->getAll('', array('is_delete' => 0));
        $this->adminview->_output(['admin/blog/viewpost'], $data);
    }


  }

?>