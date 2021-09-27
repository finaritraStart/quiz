<?php
class Presentateur_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function get_presentateur($id)
    {
        return $this->db->get_where('presentateur',array('id'=>$id))->row_array();
    }
   
    function get_all_presentateur()
    {
        $this->db->order_by('id', 'asc');
        return $this->db->get('presentateur')->result_array();
    }
   
    function add_presentateur($params)
    {
        $this->db->insert('presentateur',$params);
        return $this->db->insert_id();
    }
   
    function update_presentateur($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('presentateur',$params);
    }
   
    function delete_presentateur($id)
    {
        return $this->db->delete('presentateur',array('id'=>$id));
    }
}
