<?php

class Reponse_saisie extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reponse_saisie_model');
        $this->load->view('header');
        $this->load->view('footer');
    } 

    function index()
    {
        $data['reponse_saisie'] = $this->Reponse_saisie_model->get_all_reponse_saisie();
        
        $data['_view'] = 'reponse_saisie/index';
        $this->load->view('layouts/main',$data);
    }

    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_reponse' => $this->input->post('id_reponse'),
				'session' => $this->input->post('session'),
				'id_question' => $this->input->post('id_question'),
            );
            
            $reponse_saisie_id = $this->Reponse_saisie_model->add_reponse_saisie($params);
            redirect('reponse_saisie/index');
        }
        else
        {            
            $data['_view'] = 'reponse_saisie/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    function edit($id_saisie)
    {   
      
        $data['reponse_saisie'] = $this->Reponse_saisie_model->get_reponse_saisie($id_saisie);
        
        if(isset($data['reponse_saisie']['id_saisie']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_reponse' => $this->input->post('id_reponse'),
					'session' => $this->input->post('session'),
					'id_question' => $this->input->post('id_question'),
                );

                $this->Reponse_saisie_model->update_reponse_saisie($id_saisie,$params);            
                redirect('reponse_saisie/index');
            }
            else
            {
                $data['_view'] = 'reponse_saisie/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The reponse_saisie you are trying to edit does not exist.');
    } 

    function remove($id_saisie)
    {
        $reponse_saisie = $this->Reponse_saisie_model->get_reponse_saisie($id_saisie);

        if(isset($reponse_saisie['id_saisie']))
        {
            $this->Reponse_saisie_model->delete_reponse_saisie($id_saisie);
            redirect('reponse_saisie/index');
        }
        else
            show_error('The reponse_saisie you are trying to delete does not exist.');
    }
    
}
