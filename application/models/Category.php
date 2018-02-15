<?php

class Category extends MY_Model{

    public $category_id;

    public $category_name;

    public $category_description;

    public $is_delete;

    protected $table = 'category';

    protected $primary = 'category_id';

    public $columns = array(

        'category_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'category_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'category_description' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        ),

    );

}

?>