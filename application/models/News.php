<?php

  class News extends MY_Model{
    
  public $news_id;

  public $title;

  public $user_id;

  public $news_post;

  public $date_added;

  public $slug_title;

  public $pic;

  public $is_delete;


  protected $table = 'news';

  protected $primary = 'news_id';

  public $columns = array(

    'news_id'=> array(
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

    'news_post' =>array(
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

   public function deleteNews($news_id, $fileName){
     $this->db->where('news_id', $news_id);
     unlink($fileName);
     $this->db->delete('news');
 }

  public function removeImage($news_id, $fileName){
    $this->db->where('news_id', $news_id);
    unlink($fileName);
  }

}

?>