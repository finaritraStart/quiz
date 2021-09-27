<?php
class Form_add extends CI_Model{
	public function insertReponse()
	{
	    	 	   
		  $rep=$this->input->post("reponse");
		 	  
		   $reponse = array(
		   'reponse' => $rep
		   
		    );
	        
	 $insert=$this->db->insert('reponse', $reponse);
	 return $insert;
}