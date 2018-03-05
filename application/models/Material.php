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

    public function allMaterials($limit, $offset){
        $this->db->order_by('material_id','desc');
        $result = $this->db->get('material', $limit, $offset);
        return $result->row();
    }

}

?>