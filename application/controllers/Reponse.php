<?php
class Reponse extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reponse_model');
    } 

    function index()
    {
        $data['reponse'] = $this->Reponse_model->get_all_reponse();
        
        $data['_view'] = 'reponse/index';
        
        $this->load->view('layouts/main',$data);
       

    }
  
    function add()
    {   
        $this->load->library('form_validation');
        $this->form_validation->set_rules('id_reponse','Id Reponse','required|integer');
		$this->form_validation->set_rules('reponse','Reponse','required|max_length[250]');
		$this->form_validation->set_rules('id_question','Id Question','required|integer');
		$this->form_validation->set_rules('statut','Statut','required|integer');
		
		if($this->form_validation->run())     
        {   
            $params = array(
                'id_reponse' => $this->input->post('id_reponse'),
				'reponse' => $this->input->post('reponse'),
				'id_question' => $this->input->post('id_question'),
				'statut' => $this->input->post('statut'),
            );
            
            $reponse_id = $this->Reponse_model->add_reponse($params);
            redirect('reponse/index');
        }
        else
        {            
            $data['_view'] = 'reponse/add';
            
            $this->load->view('layouts/main',$data);
            
        }
    }  
  
    function edit($id_reponse)
    {   
        
        $data['reponse'] = $this->Reponse_model->get_reponse($id_reponse);
        
        if(isset($data['reponse']['id_reponse']))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('id_reponse','Id Reponse','required|integer');
			$this->form_validation->set_rules('reponse','Reponse','required|max_length[250]');
			$this->form_validation->set_rules('id_question','Id Question','required|integer');
			$this->form_validation->set_rules('statut','Statut','required|integer');
		
			if($this->form_validation->run())     
            {   
                $params = array(
                    'id_reponse' => $this->input->post('id_reponse'),
					'reponse' => $this->input->post('reponse'),
					'id_question' => $this->input->post('id_question'),
					'statut' => $this->input->post('statut'),
                );

                $this->Reponse_model->update_reponse($id_reponse,$params);            
                redirect('reponse/index');
            }
            else
            {
                $data['_view'] = 'reponse/edit';
                $this->load->view('header');
                $this->load->view('layouts/main',$data);
                $this->load->view('footer');
            }
        }
        else
            show_error('The reponse you are trying to edit does not exist.');
    } 

    function remove($id_reponse)
    {
        $reponse = $this->Reponse_model->get_reponse($id_reponse);

       
        if(isset($reponse['id_reponse']))
        {
            $this->Reponse_model->delete_reponse($id_reponse);
            redirect('reponse/index');
        }
        else
            show_error('The reponse you are trying to delete does not exist.');
    }
    
}
