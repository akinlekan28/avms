<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 19/09/2017
 * Time: 11:36 PM
 */
class Privileges extends MY_Model
{
    public $privilege_id;

    public $privilege_name;

    public $privilege_info;

    public $is_delete;


    protected $table = 'privileges';

    protected $primary = 'privilege_id';


    public $columns = array(

        'privilege_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'privilege_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'privilege_info' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 300,
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        )

    );

}