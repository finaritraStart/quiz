<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Presentateur_models extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function validate(){
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
            
        $this->db->where('username', $username);
        $this->db->where('password', $password);
          
        $query = $this->db->get('presentateur');
        
        if($query->num_rows == 1)
        {
            
            $row = $query->row();
            $data = array(
                    'id' => $row->id,
                    'username' => $row->username,
                    'password' => $row->password,      
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        
        return false;
    }

public function login($data) {

    $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
    $this->db->select('*');
    $this->db->from('presentateur');
    $this->db->where($condition);
    $this->db->limit(1);
    $query = $this->db->get();

    if ($query->num_rows() == 1) {
    return true;
    } else {
    return false;
    }
}
}
?>