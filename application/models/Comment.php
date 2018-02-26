<?php

  class Comment extends MY_Model{

    public $comment_id;

    public $post_id;

    public $name;

    public $email;

    public $message;

    public $date_added;

    public $is_delete;

    protected $table = 'comment';

    protected $primary = 'comment_id';

    public $columns = array(

        'comment_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'post_id' =>array(
            'type' => 'INT',
            'constraint'=> 11,
            'null' => FALSE,
        ),

        'name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 100,
            'null' => FALSE,
        ),

        'email' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 200,
        ),

        'message' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'DATE',
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );

    public function getPostName($post_id = NULL)
    {
         if ($post_id) {
            $post = $this->blog->getOne('', array('is_delete' => 0, 'post_id' => $post_id));
            if ($post->post_id) {
                return $post->title;
            } else {
                return NULL;
            }
        } else {
            $post = $this->blog->getOne('', array('is_delete' => 0, 'post_id' => $this->post_id));
            if ($post->post_id) {
                return $post->title;
            } else {
                return NULL;
            }
        }
    }

  }

?>