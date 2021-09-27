<?php

class presentateurs extends CI_Controller
{

   public function __construct()
  {
  	parent::__construct();
    
  	if (!isset($_SESSION['pres_logged'])) {
       $this->load->model('Question_model');
      
      
  		$this->session->set_flashdata("error", "please login first to view this page"); 
      
  	}
  }
  
  public function pres_profile()
  {
     $data['questions'] = $this->Question_model->get_all_questions();
    
  	$this->load->view('pres_profile',$data);
    
  }
public function test()
  {
    $this->load->view('panel');
  }

  
public function control()
  { 
    $this->db->truncate('reponse_saisie');
    $this->db->truncate('pourcentage');

  }
  
 
function index(){
        $this->load->view('browse');
    }

}

