<?php
class Quiz extends CI_Controller
{
        function __construct()
        {
            parent::__construct();
            
            $this->load->library('session');

            $this->load->database();

            $this->load->library ( 'form_validation' );
            
            $this->load->library('pagination');
            
            $this->load->model('quiz_model');

            $this->load->model('question_models');

            $this->load->helper(array('url','html'));
        }
        
        public function qest()
        {          
            $total_rows = $this->quiz_model->total_questions();
            $config = $this->_pagination(base_url('index.php/quiz/qest/'),$total_rows);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $this->db->get('questions');
            $data=$this->data['result'] = $this->quiz_model->get_questions($config['per_page'],$page);
            $this->load->view ('headerUser');  
            $this->load->view('quiz', $this->data);
            $this->load->view ('footer');
        }
          public function panel(){
            $this->load->view('panel');
           
          }
          
           public function ajaxRequest()
           {
            $data['data'] = $this->db->get("reponse_saisie")->result();    
           }     

           public function envoyer()
           {     
              $data = array(
             'id_reponse' => $this->input->post('reponse'),
             'session' => $this->input->post('session'),
             'id_question' => $this->input->post('question'),
               );
              
               $this->db->insert('reponse_saisie', $data);                  
            }

            public function pres(){
              $ts=$this->db->truncate('pourcentage');
            }

            public function pourcentage()
           { 
             $this->db->select('DISTINCT(session)');   
             $query=$this->db->get('reponse_saisie'); 
             foreach ($query->result() as $row) {        
             $session=$row->session;        
              } 
              $Nsession=$query->num_rows();                     
              $don = $this->db->select('*')
                   ->from('reponse_saisie')
                   ->get();
              foreach ($don->result() as $row) {                  
                $id_reponse=$row->id_reponse;
                $id_question=$row->id_question;
               
              }                  
                   $condition=array('statut'=>1,'id_question'=>$id_question);              
                   $qet=$this->db->select('*')
                   ->from('reponse')
                   ->where($condition)
                   ->get();
                   foreach ($qet->result() as $row) {                  
                    $idrep=$row->id_reponse;
                   }              
                                  
               $conditions=array('id_reponse'=>$idrep);              
               $select=$this->db->select('*')
                   ->from('reponse_saisie')
                   ->where($conditions)
                   ->get();              
               $Njuste=$select->num_rows();

              $result=($Njuste/$Nsession)*100;
              $data=array();
               
              
               $condition=array('statut'=>0,'id_question'=>$id_question);              
                   $tam=$this->db->select('id_reponse')
                   ->from('reponse')
                   ->where($condition)
                   ->get();
                   foreach ($tam->result() as $row) {                  
                   $id0=$row->id_reponse.'<br>';                         
                                
               $conditions=array('id_reponse'=>$id0);              
               $self=$this->db->select('session')
                   ->from('reponse_saisie')
                   ->where($conditions)
                   ->get(); 
                foreach ($self->result() as $row) {
                   $st[]=$row->session.'<br>';
                   echo $numf=count($st);
                    
                }
            }
           if ($numf=='') {
            $numf=0;
             $data = array(
             'id_question' =>$this->input->post('id_question'),
             'resultat' =>round($result),
             'question' =>$this->input->post('question'),
             'participant' =>$Nsession,
             'juste' =>$Njuste,
             'faux' =>$numf,
               );

               $this->db->insert('pourcentage', $data);
           }else{
            
              $data = array(
             'id_question' =>$this->input->post('id_question'),
             'resultat' =>round($result),
             'question' =>$this->input->post('question'),
             'participant' =>$Nsession,
             'juste' =>$Njuste,
             'faux' =>$numf,
               );

               $this->db->insert('pourcentage', $data); 
            }                 
           }              
              
            public function presentation(){
              $total_row = $this->quiz_model->pres_questions();
              $conf = $this->pres_page(base_url('index.php/quiz/presentation/'),$total_row);
              $pag = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
              $data=$this->data['qet'] = $this->quiz_model->get_qest($conf['per_page'],$pag);
              
                  $p=$this->db->select('resultat')
                   ->from('pourcentage')               
                   ->get();
                   foreach ($p->result() as $row) {                  
                     $resultat=$row->resultat;
                   }
                   if (isset($resultat)) {
                      $data=array('resultat'=>$resultat);
                   }
                                         
                $this->load->view ('header', $data);
                $this->load->view('presentation', $this->data); 
                $this->load->view ('footer');
            }


            public function resultat(){ 
               $get=$this->db->select('*')
                             ->from('pourcentage')
                             ->get();

              $this->load->view ('header');
              $this->load->view('resultat',$get); 
              $this->load->view ('footer');
            }          


            public function terminer(){
              $session=session_id();
                $qt=$this->db->select('DISTINCT(id_question)')
                        ->from('reponse_saisie')
                        ->get();
              $Tqest=$qt->num_rows();       
               $conditions=array('session'=>$session);     
               $get=$this->db->select('*')
                   ->from('reponse_saisie')
                   ->where($conditions)
                   ->get();
                foreach ($get->result() as $row) {
                $repid1 =$row->id_reponse;
              
                 $condition=array('statut'=>1,'id_reponse'=>$repid1);
              $sem=$this->db->select('statut')
                        ->from('reponse')
                        ->where($condition)
                        ->get();                     
              foreach ($sem->result() as $row) {
               $a[] =$row->statut;
               $vrai= count($a);          
              } 
                }       
              $res= ($vrai/$Tqest)*100;
              $data=array();
              $data['resultat'] = round($res);
             
              $this->load->view ('headerUser');
              $this->load->view('terminer', $data); 
              $this->load->view ('footer');
            }


           private function pres_page($url,$total_row,$per_page = 1,$uri_segment = FALSE)   
        {
                    $conf ['base_url'] = $url;
                    $conf ['total_rows'] = $total_row;
                    $conf ['per_page'] = $per_page;
                    $conf ['next_link'] = "<button style='border-radius: 30px;width: 150px;' class='button btn btn-success'>suivant</button>";
                    $conf ['next_tag_open'] = '<div>';
                    $conf ['next_tag_close'] = '</div>';
                    $conf ['last_link'] = FALSE;
                    $conf ['first_link'] = FALSE;
                    $conf [ 'display_pages' ]  = FALSE;
                    $conf ['prev_link'] = FALSE;
                    if($uri_segment)
                    {
                      $conf['uri_segment'] = $uri_segment;
                    }
                    $this->pagination->initialize($conf);
                    return $conf;
        }   


        private function _pagination($url,$total_rows,$per_page = 4,$uri_segment = FALSE)   
        {
                    $config ['base_url'] = $url;
                    $config ['total_rows'] = $total_rows;
                    $config ['per_page'] = $per_page;
                    $config ['next_link'] = "<button style='border-radius: 30px;width: 150px;' class='button btn btn-success'>suivant</button>";
                    $config ['next_tag_open'] = '<div>';
                    $config ['next_tag_close'] = '</div>';
                    $config ['last_link'] = FALSE;
                    $config ['first_link'] = FALSE;
                    $config [ 'display_pages' ]  = FALSE;
                    $config ['prev_link'] = FALSE;
                    if($uri_segment)
                    {
                      $config['uri_segment'] = $uri_segment;
                    }
                    $this->pagination->initialize($config);
                    return $config;
        }    
}





