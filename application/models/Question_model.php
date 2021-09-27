<?php

class Question_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
  
    function get_question($id_question)
    {
        return $this->db->get_where('questions',array('id_question'=>$id_question))->row_array();
    }
   
    function get_all_questions()
    {
        $this->db->order_by('id_question', 'asc');
        return $this->db->get('questions')->result_array();
    }
   
    function add_question($params)
    {
        $this->db->insert('questions',$params);
        return $this->db->insert_id();
    }
   
    function update_question($id_question,$params)
    {
        $this->db->where('id_question',$id_question);
        return $this->db->update('questions',$params);
    }
   
    function delete_question($id_question)
    {
        return $this->db->delete('questions',array('id_question'=>$id_question));
    }
}
