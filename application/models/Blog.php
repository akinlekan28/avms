<?php

class Blog extends MY_Model{

  public $post_id;

  public $title;

  public $user_id;

  public $category_id;

  public $post;

  public $date_added;

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

        'post' =>array(
            'type' => 'TEXT',
            'null' => FALSE,
        ),

        'date_added' =>array(
            'type' => 'DATE',
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

}

?>