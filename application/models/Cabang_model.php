<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cabang_model extends CI_model
{
    
    
    public function deletedata($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->delete('list_cabang');
        return $query;
    }
    
    
    public function updatedata($id, $cabang)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('list_cabang', array('nama_cabang' => $cabang));
        return $query;
    }
    
    public function editdata($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('list_cabang');
        return $query->row();
    }
    
    
    public function savedata($id, $cabang)
    {
        $query = $this->db->insert('list_cabang', array("nama_cabang"=> $cabang));    
        return $query;
        
    }
    
    
    
    // ======================= DATATABLE =======================================
    var $table ="list_cabang";
    var $select_column = array("*");
    var $order_column = array(
        "id",
        "nama_cabang",
        null
    );


    function make_query()
    {
        $this->db->select($this->select_column);
        $this->db->from($this->table);

        if(isset($_POST["search"]["value"]))
        {
            $this->db->like("nama_cabang", $_POST["search"]["value"]);
            
        }

        if(isset($_POST["order"]))
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else
        {
            $this->db->order_by("id","DESC");
        }

    }


    function make_datatables()
    {
        $this->make_query();
        if($_POST["length"] != -1)
        {
            $this->db->limit($_POST["length"], $_POST["start"]);
        }
        $query = $this->db->get();
        return $query->result();
    }


    function get_filtered_data()
    {
        $this->make_query();
        $query = $this->db->get();
        return $query->num_rows();
    }


    function get_all_data()
    {
        $this->db->select("*");
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    
}