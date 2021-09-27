<?php
class Select extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('select_model', 'select');
        $this->load->view('header');
        $this->load->view('footer');

    } 
    public function index(){
    	$data['questions'] = $this->select->get_all_questions();  
        $data['_view'] = 'select/index';
    	$this->load->view('layouts/main',$data);
    }
   
   function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'question' => $this->input->post('question'),
            );
            
            $question_id = $this->select->add_question($params);
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
        
        $data['question'] = $this->select->get_question($id_question);
        
        if(isset($data['question']['id_question']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'question' => $this->input->post('question'),
                );

                $this->select->update_question($id_question,$params);            
                redirect('select/index');
            }
            else
            {
                $data['_view'] = 'select/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The question you are trying to edit does not exist.');
    } 

    
    function remove($id_question)
    {
        $question = $this->select->get_question($id_question);

        
        if(isset($question['id_question']))
        {
            $this->select->delete_question($id_question);
            redirect('select/index');
        }
        else
            show_error('The question you are trying to delete does not exist.');
    }
    
}



















