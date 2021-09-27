<?php
class Pourcentage extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pourcentage_model');
        $this->load->view('header');
        $this->load->view('footer');
    } 

    function index()
    {
        $data['pourcentage'] = $this->Pourcentage_model->get_all_pourcentage();
        
        $data['_view'] = 'pourcentage/index';
        $this->load->view('layouts/main',$data);
    }

    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'id_question' => $this->input->post('id_question'),
				'question' => $this->input->post('question'),
				'participant' => $this->input->post('participant'),
				'juste' => $this->input->post('juste'),
				'faux' => $this->input->post('faux'),
				'resultat' => $this->input->post('resultat'),
            );
            
            $pourcentage_id = $this->Pourcentage_model->add_pourcentage($params);
            redirect('pourcentage/index');
        }
        else
        {            
            $data['_view'] = 'pourcentage/add';
            $this->load->view('layouts/main',$data);
        }
    }  
   
    function edit($id_pourcentage)
    {   
        
        $data['pourcentage'] = $this->Pourcentage_model->get_pourcentage($id_pourcentage);
        
        if(isset($data['pourcentage']['id_pourcentage']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'id_question' => $this->input->post('id_question'),
					'question' => $this->input->post('question'),
					'participant' => $this->input->post('participant'),
					'juste' => $this->input->post('juste'),
					'faux' => $this->input->post('faux'),
					'resultat' => $this->input->post('resultat'),
                );

                $this->Pourcentage_model->update_pourcentage($id_pourcentage,$params);            
                redirect('pourcentage/index');
            }
            else
            {
                $data['_view'] = 'pourcentage/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pourcentage you are trying to edit does not exist.');
    } 

   
    function remove($id_pourcentage)
    {
        $pourcentage = $this->Pourcentage_model->get_pourcentage($id_pourcentage);

       
        if(isset($pourcentage['id_pourcentage']))
        {
            $this->Pourcentage_model->delete_pourcentage($id_pourcentage);
            redirect('pourcentage/index');
        }
        else
            show_error('The pourcentage you are trying to delete does not exist.');
    }
    
}
