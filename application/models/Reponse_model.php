<?php
class Reponse_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
   
    function get_reponse($id_reponse)
    {
        return $this->db->get_where('reponse',array('id_reponse'=>$id_reponse))->row_array();
    }
   
    function get_all_reponse()
    {
        $this->db->order_by('id_reponse', 'asc');
        return $this->db->get('reponse')->result_array();
    }
        
    function add_reponse($params)
    {
        $this->db->insert('reponse',$params);
        return $this->db->insert_id();
    }
   
    function update_reponse($id_reponse,$params)
    {
        $this->db->where('id_reponse',$id_reponse);
        return $this->db->update('reponse',$params);
    }
    
    function delete_reponse($id_reponse)
    {
        return $this->db->delete('reponse',array('id_reponse'=>$id_reponse));
    }
}
