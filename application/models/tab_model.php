<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Tab_model extends CI_Model {
    
    public function pourcentageList() {
        $this->db->select(array('id_question', 'question', 'participant', 'juste', 'faux' ,'resultat'));
        $this->db->from('pourcentage');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>