<?php

class Pourcentage_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function get_pourcentage($id_pourcentage)
    {
        return $this->db->get_where('pourcentage',array('id_pourcentage'=>$id_pourcentage))->row_array();
    }
   
    function get_all_pourcentage()
    {
        $this->db->order_by('id_pourcentage', 'asc');
        return $this->db->get('pourcentage')->result_array();
    }
    
    function add_pourcentage($params)
    {
        $this->db->insert('pourcentage',$params);
        return $this->db->insert_id();
    }
   
    function update_pourcentage($id_pourcentage,$params)
    {
        $this->db->where('id_pourcentage',$id_pourcentage);
        return $this->db->update('pourcentage',$params);
    }
   
    function delete_pourcentage($id_pourcentage)
    {
        return $this->db->delete('pourcentage',array('id_pourcentage'=>$id_pourcentage));
    }
}
