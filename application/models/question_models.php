<?php
class Question_models extends CI_Model{

    function reponse_list(){
        $hasil=$this->db->get('reponse');
        return $hasil->result();
    }

    function save_reponse(){
        $data = array(
                'reponse'  => $this->input->post('reponse'), 
                'id_question' => $this->input->post('id_question'),
                'statut' => $this->input->post('statut'),

            );
        $result=$this->db->insert('reponse',$data);
        return $result;
    }

    function update_reponse(){
        $reponse=$this->input->post('reponse');
        $id_question=$this->input->post('id_question');
        $statut=$this->input->post('statut');

        $this->db->set('reponse', $reponse);
        $this->db->set('id_question', $id_question);
        $this->db->set('statut', $statut);

        $this->db->where('reponse', $reponse);
        $result=$this->db->update('reponse');
        return $result;
    }

    function delete_reponse(){
        $reponse=$this->input->post('reponse');
        $this->db->where('reponse', $reponse);
        $result=$this->db->delete('reponse');
        return $result;
    }
    
}