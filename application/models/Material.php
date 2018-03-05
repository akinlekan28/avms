<?php

class Material extends MY_Model{

  public $material_id;

  public $material_name;

  public $material;

  public $author;

  public $date_added;

  public $user_id;

  public $is_delete;

  protected $table = 'material';

  protected $primary = 'material_id';


  public $columns = array(

        'material_id'=> array(
            'type' => 'INT',
            'constraint' => 11,
            'unsigned' => TRUE,
            'auto_increment'=> TRUE,
        ),

        'material_name' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'material' =>array(
            'type' => 'VARCHAR',
            'constraint'=> 250,
            'null' => FALSE,
        ),

        'author' =>array(
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

    public function deleteMaterial($material_id, $fileName){
        $this->db->where('material_id', $material_id);
        unlink($fileName);
        $this->db->delete('material');
    }

    public function allMaterials($params = array()){

        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('is_delete','0');
        $this->db->order_by('date_added','desc');
        if(array_key_exists('material_id',$params) && !empty($params['material_id'])){
            $this->db->where('material_id',$params['material_id']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

}

?>