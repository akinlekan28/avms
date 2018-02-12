<?php

class Tokens extends My_Model{
	
	public $token_id;

	public $token;

	public $user_id;

    public $date_created;
    
    public $is_delete;


	protected $table = 'tokens';

    protected $primary = 'token_id';

	
	public $columns = array(

		'token_id'=> array(
			'type' => 'int',
			'constraint' => 11,
			'unsigned' => TRUE,
			'auto_increment'=> TRUE,
		),

		'token' =>array(
			'type' => 'varchar',
			'constraint'=> 500,
			'null' => FALSE,
		),

		'user_id' =>array(
			'type' => 'INT',
			'constraint'=> 11,
			'null' => FALSE,
        ),
        
        'email' =>array(
			'type' => 'varchar',
			'constraint'=> 300,
			'null' => FALSE,
        ),

		'date_created' =>array(
			'type' => 'varchar',
			'constraint'=> 250,
			'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'int',
            'constraint' => 11,
            'default' => 0
        )
	);

}
