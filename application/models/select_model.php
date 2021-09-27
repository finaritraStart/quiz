<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Select_model extends CI_Model {
    
    function get_question($id_question)
    {
        return $this->db->get_where('questions',array('id_question'=>$id_question))->row_array();
        
    }
   
    function get_all_questions()
    {
        $this->db->order_by('id_question', 'asc');
        return $this->db->get('questions')->result_array();
        $this->db->order_by('id_reponse', 'asc');
        return $this->db->get('reponse')->result_array();
    }
   
    function add_question($params)
    {
        $this->db->insert('questions',$params);
        $this->db->insert('reponse',$params);
        return $this->db->insert_id();
    }
   
    function update_question($id_question,$id_reponse,$params)
    {
        $this->db->where('id_question',$id_question);
        return $this->db->update('questions',$params);
        $this->db->where('id_reponse',$id_reponse);
        return $this->db->update('reponse',$params);
    }
   
    function delete_question($id_question)
    {
        return $this->db->delete('questions',array('id_question'=>$id_question));
    }
}
?>