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

        //Add Blog Table
        $this->load->model('Blog');
        $this->dbforge->add_field($this->Blog->columns);
        $this->dbforge->add_key('post_id', TRUE);
        $this->dbforge->create_table('blog', TRUE);

        //Add Category Table
        $this->load->model('Category');
        $this->dbforge->add_field($this->Category->columns);
        $this->dbforge->add_key('category_id', TRUE);
        $this->dbforge->create_table('category', TRUE);

        //Add Comment Table
        $this->load->model('Comment');
        $this->dbforge->add_field($this->Comment->columns);
        $this->dbforge->add_key('comment_id', TRUE);
        $this->dbforge->create_table('comment', TRUE);

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

        //Add News Table
        $this->load->model('News');
        $this->dbforge->add_field($this->News->columns);
        $this->dbforge->add_key('news_id', TRUE);
        $this->dbforge->create_table('news', TRUE);

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

        
        //Add Site Views Table
        $this->load->model('Siteviews');
        $this->dbforge->add_field($this->Siteviews->columns);
        $this->dbforge->add_key('page_id', TRUE);
        $this->dbforge->create_table('siteviews', TRUE);

        //Add  Tokens
        $this->load->model('Tokens');
        $this->dbforge->add_field($this->Tokens->columns);
        $this->dbforge->add_key('token_id', TRUE);
        $this->dbforge->create_table('tokens', TRUE);


        $this->_createPrivileges();

        $this->_createSiteviews();

        echo 'Installed Successfully';
    }

    protected function _createPrivileges()
    {
        $this->load->model('privileges');

        $privileges = array(
            array('privilege_name' => 'Admin'  ,'privilege_info' => 'Full Access and Control, Can Edit and Delete account'),
            array('privilege_name' => 'Staff' ,'privilege_info' => 'Can Only View and Post')
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

    protected function _createSiteviews()
    {
        $this->load->model('siteviews');

        $siteviews = array(
          array('page_count' => 0)
        );

        foreach($siteviews as $s)
        {
            $siteview = $this->siteviews->getOne('', array('page_count' => $s['page_count']));

            if($siteview->page_id)
            {
                $this->siteviews->update($s , $siteview->page_id);
            }
            elseif(!$siteview->page_id)
            {
                $siteview->insert($s);
            }

        }

    }
}