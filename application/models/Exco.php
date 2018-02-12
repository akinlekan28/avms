<?php

class Exco extends MY_Model{

  public $exco_id;

  public $fullname;

  public $position;

  public $level;

  public $phone;

  public $nick;

  public $pic;

  public $is_delete;


  protected $table = 'exco';

  protected $primary = 'exco_id';

  public $columns = array(
     'exco_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'fullname' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'position' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'level' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'phone' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'nick' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
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

  public function deleteExecutive($exco_id, $filename){
      $this->db->where('exco_id', $exco_id);
      unlink($fileName);
      $this->db->delete('exco');
  }

}

?>