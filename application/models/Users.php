<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 19/09/2017
 * Time: 11:13 PM
 */
class Users extends MY_Model
{
    public $user_id;

    public $firstname;

    public $lastname;

    public $email;

    public $password;

    public $privilege;

    public $date_registered;

    public $is_delete;

    protected $table = 'users';

    protected $primary = 'user_id';

    public $columns = array(

        'user_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'firstname' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'lastname' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'email' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 150,
            'null' => FALSE,
        ),

        'password' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'privilege' =>array(
            'type' => 'varchar',
            'constraint'=> 200,
            'null' => FALSE,
        ),

        'date_registered'=> array(
            'type' => 'DATE',
            'null' => FALSE,
        ),

        'is_delete' => array(
            'type' => 'INT',
            'constraint' => 11,
            'default' => 0,
        )
    );

    public function is($privilege ='')
    {
        if(is_array($privilege))
        {
            return in_array($this->privilege  , $privilege);
        }

        $roles = func_get_args();

        return in_array($this->privilege  , $roles);
    }

    public function insertToken($email, $user_id)
    {
        $token = substr(sha1(rand()), 0, 30);

        $data = array(
                'token' => $token,
                'user_id' => $user_id,
                'email' => $email,
                'date_created' => date('Y-m-d H:m:s'),
               
            );
        $query = $this->db->insert_string('tokens',$data);
        $this->db->query($query);
        return $token ;

    }

    public function update_password($createPassword, $user_id)
    {
        $data = array(
            'password' => $createPassword
        );
        $response = $this->db->update('users', $data, array('user_id' => $user_id));
        return $response;
    }

    public function getByToken($token)
    {
        $q = $this->db->get_where('tokens', array('token' => $token), 1);
        if($this->db->affected_rows() > 0){
            $row = $q->row();

            if(date('Y-m-d') > $row->date_created)
            {
                return false;
            }
            else
            {
                return $row;
            }
            
        }else{
            error_log('no user found getUserInfo('.$token.')');
            return false;
        }
    }
}