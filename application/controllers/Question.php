<?php

class Question extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Question_model');
        
    } 

    
    function index()
    {
        $data['questions'] = $this->Question_model->get_all_questions();
        
        $data['_view'] = 'question/index';
        
        $this->load->view('layouts/main',$data);
       
    }

   
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'question' => $this->input->post('question'),
            );
            
            $question_id = $this->Question_model->add_question($params);
            redirect('question/index');
        }
        else
        {            
            $data['_view'] = 'question/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    
    function edit($id_question)
    {   
        
        $data['question'] = $this->Question_model->get_question($id_question);
        
        if(isset($data['question']['id_question']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'question' => $this->input->post('question'),
                );

                $this->Question_model->update_question($id_question,$params);            
                redirect('question/index');
            }
            else
            {
                $data['_view'] = 'question/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The question you are trying to edit does not exist.');
    } 

    
    function remove($id_question)
    {
        $question = $this->Question_model->get_question($id_question);

        
        if(isset($question['id_question']))
        {
            $this->Question_model->delete_question($id_question);
            redirect('question/index');
        }
        else
            show_error('The question you are trying to delete does not exist.');
    }
    
}
