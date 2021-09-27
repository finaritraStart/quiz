<?php 
class Reponse_saisie_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
   
    function get_reponse_saisie($id_saisie)
    {
        return $this->db->get_where('reponse_saisie',array('id_saisie'=>$id_saisie))->row_array();
    }
   
    function get_all_reponse_saisie()
    {
        $this->db->order_by('id_saisie', 'asc');
        return $this->db->get('reponse_saisie')->result_array();
    }
    
    function add_reponse_saisie($params)
    {
        $this->db->insert('reponse_saisie',$params);
        return $this->db->insert_id();
    }
   
    function update_reponse_saisie($id_saisie,$params)
    {
        $this->db->where('id_saisie',$id_saisie);
        return $this->db->update('reponse_saisie',$params);
    }
   
    function delete_reponse_saisie($id_saisie)
    {
        return $this->db->delete('reponse_saisie',array('id_saisie'=>$id_saisie));
    }
}
