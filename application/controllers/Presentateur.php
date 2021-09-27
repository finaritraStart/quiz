<?php
class Presentateur extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Presentateur_model');
    } 

   
    function index()
    {
        $data['presentateur'] = $this->Presentateur_model->get_all_presentateur();
        
        $data['_view'] = 'presentateur/index';
       
        $this->load->view('layouts/main',$data);
      
    }

   
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'password' => $this->input->post('password'),
				'username' => $this->input->post('username'),
            );
            
            $presentateur_id = $this->Presentateur_model->add_presentateur($params);
            redirect('presentateur/index');
        }
        else
        {            
            $data['_view'] = 'presentateur/add';
            
            $this->load->view('layouts/main',$data);
           
        }
    }  

    function edit($id)
    {   
        
        $data['presentateur'] = $this->Presentateur_model->get_presentateur($id);
        
        if(isset($data['presentateur']['id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'password' => $this->input->post('password'),
					'username' => $this->input->post('username'),
                );

                $this->Presentateur_model->update_presentateur($id,$params);            
                redirect('presentateur/index');
            }
            else
            {
                $data['_view'] = 'presentateur/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The presentateur you are trying to edit does not exist.');
    } 

   
    function remove($id)
    {
        $presentateur = $this->Presentateur_model->get_presentateur($id);

        
        if(isset($presentateur['id']))
        {
            $this->Presentateur_model->delete_presentateur($id);
            redirect('presentateur/index');
        }
        else
            show_error('The presentateur you are trying to delete does not exist.');
    }
    
}
