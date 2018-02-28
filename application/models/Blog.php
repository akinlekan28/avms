<?php

class Blog extends MY_Model{

  public $post_id;

  public $title;

  public $user_id;

  public $draft_status;

  public $category_id;

  public $post;

  public $date_added;

  public $slug_title;

  public $pic;

  public $is_delete;


  protected $table = 'blog';

  protected $primary = 'post_id';

  public $columns = array(

     'post_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'title' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'user_id' =>array(
			'type' => 'INT',
			'constraint'=> 11,
			'null' => FALSE,
        ),

        'category_id' =>array(
            'type' => 'INT',
            'constraint'=> 11,
            'null' => FALSE,
        ),

        'draft_status' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

        'post' =>array(
            'type' => 'TEXT',
            'null' => FALSE,
        ),

        'date_added' =>array(
            'type' => 'DATE',
            'null' => FALSE,
        ),

        'slug_title' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'pic' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        )
  );

  public function getUser($user_id = NULL){
       if ($user_id) {
            $staff = $this->users->getOne('', array('is_delete' => 0, 'user_id' => $user_id));
            if ($staff->user_id) {
                return $staff->firstname . " " . $staff->lastname;
            } else {
                return NULL;
            }
        } else {
            $staff = $this->users->getOne('', array('is_delete' => 0, 'user_id' => $this->user_id));
            if ($staff->user_id) {
                return $staff->firstname . " " . $staff->lastname;
            } else {
                return NULL;
            }
        }
  }

  public function getCategory($category_id = NULL){
        if ($category_id) {
            $category = $this->category->getOne('', array('is_delete' => 0, 'category_id' => $category_id));
            if ($category->category_id) {
                return $category->category_name;
            } else {
                return NULL;
            }
        } else {
            $category = $this->category->getOne('', array('is_delete' => 0, 'category_id' => $this->category_id));
            if ($category->category_id) {
                return $category->category_name;
            } else {
                return NULL;
            }
        }
 }

  public function deletePost($post_id, $fileName){
     $this->db->where('post_id', $post_id);
     unlink($fileName);
     $this->db->delete('blog');
 }

 public function removeImage($post_id, $fileName){
    $this->db->where('post_id', $post_id);
    unlink($fileName);
  }

}

?>