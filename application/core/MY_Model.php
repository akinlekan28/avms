<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of My_Model
 *
 * @author Akintola Olalekan
 */

class MY_Model extends CI_Model{

    protected $table = '';
    protected $primary = 'id';

    public function __construct($data = null) {
        parent::__construct();

        $this->load->database();

        $this->load->helper('inflector');

        if (!$this->table) {
            $this->table = strtolower(plural(get_class($this)));
        }
        if(is_array($data)){
            foreach($data as $key => $value){
                if(property_exists($this,$key)) $this->$key = $value;
            }
        }
    }

    
      /**
      *
      *@param int $id Id of record to fetch
      *@param $where array
      */
      public function getOne($id = '', $where = array()) {

        if($id || $id === 0) $where[$this->primary] = $id;

         $row = $this->db->get_where($this->table, $where)->row_array();
         $class_name =  get_class($this);

        return new $class_name($row);
      }
    
    
    /**
    * @param $fields
    * @param $where
    * @param $table
    * @param $limit
    * @param $order_by
    * @param $group_by
    * @param $desc_order
    */
    public function getAll($fields = '', $where = array(), $table = '', $limit = '', $order_by = '', $group_by = '', $desc_order = '') {
        $data = array();
        if ($fields != '') {
            $this->db->select($fields);
        }

        if (count($where)) {
            $this->db->where($where);
        }

        if ($table != '') {
            $this->table = $table;
        }

        if ($limit != '') {
            $this->db->limit($limit);
        }

        if ($order_by != '') {
            $this->db->order_by($order_by);
        }

        if ($group_by != '') {
            $this->db->group_by($group_by);
        }

        if ($desc_order != '') {
            $this->db->order_by($desc_order, 'desc');
        }

        $Q = $this->db->get($this->table);

        if ($Q->num_rows() > 0) {
            foreach ($Q->result_array() as $row) {
                $class_name =  get_class($this);
                
                $data[] = new $class_name($row);
            }
        }
        $Q->free_result();

        return $data;
    }

    /**
    * @param $data = array of values to be inserted
    * @return True OR False
    * @return Last inserted id
    */
    public function insert($data) {
        // $data['create_time'] = date('Y-m-d H:i:s');
        $success = $this->db->insert($this->table, $data);
        if ($success) {
            return $this->db->insert_id();
        } else {
            return FALSE;
        }
    }
    
    
    /**
    *@param
    *@author
    */
    public function update($data, $id , $where='')
    {
        if($where)
        {
            $this->db->where($where);
        }
        else
        {
            $this->db->where($this->primary, $id);
        }


        return $this->db->update($this->table, $data);
        
    }

    
    /**
    * @param $id = primary key 
    * @param return bool
    */
    public function delete($id) 
    {
        $this->db->where($this->primary, $id);
        return $this->db->delete($this->table);
       
    }
    
     /**
     * @return int
     * Get the specified primary column
     */
    public function getPrimaryKey()
    {
        return $this->primary;
    }
    
    /*
    * get the value of the primary column
    */
    public function getId()
    {
        if($this->primary)
        {
            return  $this->{$this->primary};
        }
    }
    
    
    /**
     *
     * @param array $where
     * @return type
     */
    public function count($where = '')
    {
        if($where) $this->db->where( $where );

        $total = $this->db->count_all_results( $this->table) ;

        return $total;
    }
    
}