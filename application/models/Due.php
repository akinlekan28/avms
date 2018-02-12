<?php

class Due extends MY_Model{

  public $due_id;

  public $due_name;

  public $price;

  public $date_added;

  public $user_id;

  public $is_delete;

  protected $table = 'due';

  protected $primary = 'due_id';

  public $columns = array(

        'due_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'due_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'price' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'date_added' => array(
            'type' => 'DATE',
            'null' => FALSE
        ),

        'user_id' =>array(
            'type' => 'INT',
            'constraint' => 11,
            'null' => FALSE,
        ),

         'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        )

    );

}

?>