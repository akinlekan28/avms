<?php

/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 14/10/2017
 * Time: 3:08 PM
 */
class Installer extends MY_Controller
{
    public function index()
    {
        $this->_createTables();
    }

    protected function _createDatabase()
    {
        $this->load->dbforge();

        $this->dbforge->create_database('avms');

        if($this->dbforge->create_database('avms'))
        {
            echo 'Database created!';
        }

    }
    public $privileges;

    protected function _createTables()
    {
        $this->load->dbforge();


        //Add Due Table
        $this->load->model('Due');
        $this->dbforge->add_field($this->Due->columns);
        $this->dbforge->add_key('due_id', TRUE);
        $this->dbforge->create_table('due', TRUE);

        //Add Exco Table
        $this->load->model('Exco');
        $this->dbforge->add_field($this->Exco->columns);
        $this->dbforge->add_key('exco_id', TRUE);
        $this->dbforge->create_table('exco', TRUE);

        //Add Material Table
        $this->load->model('Material');
        $this->dbforge->add_field($this->Material->columns);
        $this->dbforge->add_key('material_id', TRUE);
        $this->dbforge->create_table('material', TRUE);

        //Add Users Table
        $this->load->model('Users');
        $this->dbforge->add_field($this->Users->columns);
        $this->dbforge->add_key('user_id', TRUE);
        $this->dbforge->create_table('users', TRUE);

        //Add Privileges Table
        $this->load->model('Privileges');
        $this->dbforge->add_field($this->Privileges->columns);
        $this->dbforge->add_key('privilege_id', TRUE);
        $this->dbforge->create_table('privileges', TRUE);

        //Add  Tokens
        $this->load->model('Tokens');
        $this->dbforge->add_field($this->Tokens->columns);
        $this->dbforge->add_key('token_id', TRUE);
        $this->dbforge->create_table('tokens', TRUE);


        $this->_createPrivileges();

        echo 'Installed Successfully';
    }

    protected function _createPrivileges()
    {
        $this->load->model('privileges');

        $privileges = array(
            array('privilege_name' => 'Admin'  ,'privilege_info' => 'Full Access and Control, Can Edit and Delete account'),
            array('privilege_name' => 'Staff' ,'privilege_info' => 'Can Only View and Post Complaint')
        );

        foreach($privileges as $p)
        {
            $privilege = $this->privileges->getOne('', array('privilege_name' => $p['privilege_name']));

            if($privilege->privilege_id)
            {
                $this->privileges->update($p , $privilege->privilege_id);
            }
            elseif(!$privilege->privilege_id)
            {
                $privilege->insert($p);
            }

        }

    }
}