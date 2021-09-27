<?php 
class Quiz_model extends CI_Model
{  
    private $table;
    private $reponse;

    public function __construct() 
    {
        parent::__construct();
        $this->load->database();
       
        $this->table = 'reponse';
        $this->question = 'questions';       
    }
 
    public function total_questions() 
    {
        return $this->db->count_all($this->table);
    }

    public function create()
    {
        $data = array(
            'question' => $this->_reponse,     
        );
        $this->db->insert('question', $data);
        return $this->db->insert_id();
    }

    public function pres_questions() 
    {   
        return $this->db->count_all($this->question);
               $this->db->order_by("id_question");
               
    }

    public function get_qest($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->question);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;        
            }
            return $data;        
        }
        return FALSE;
   }

    public function get_questions($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);
        if ($query->num_rows() > 0)
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;        
            }
            return $data;        
        }
        return FALSE;
   }

    public function req()
        {
            $this->db->select("id_reponse,reponse,id-question,statut ");
            $this->db->from("reponse");
            
            $query = $this->db->get();
            
            return $query->result();
            
            $num_data_returned = $query->num_rows;
            
            if ($num_data_returned < 1)
            {
              echo "There is no data in the database";
              exit();   
            }
        }

    public function insert($question, $juste, $reponse, $session)
    {
       $sql = "INSERT INTO reponse_saisie SET question='$question', juste='$juste', reponse='reponse', session='$session'";
        return $this->db->query($sql);      
 
    }
    
    }

    
