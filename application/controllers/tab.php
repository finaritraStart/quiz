<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
class Tab extends CI_Controller {
  
    public function __construct() {
        parent::__construct();
       
     
        $this->load->model('tab_model');
    }    
  
    public function index() {
        
        $data['pourcentageInfo'] = $this->tab_model->pourcentageList();
        
        $this->load->view ('header');
        $this->load->view('tab', $data);
        $this->load->view ('footer');
    }
  
    
    
}


?>