<?php

class Auth_presentateur extends CI_Controller
{

   public function pres_logout(){
     unset($_SESSION);
    session_destroy();
    redirect("auth_presentateur/pres_login","refresh");
   }

  public function pres_login()
  {     
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if($this->form_validation->run() == TRUE){
            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $this->db->select('*');
            $this->db->from('presentateur'); 
            $this->db->where(array('username'=>$username, 'password' => $password));    
            $query = $this->db->get();
            $user = $query->row();
               
            if($user->username)
            {
                $this->session->set_flashdata("success", "you are logged in");

                $_SESSION['user_logged'] = TRUE;
                $_SESSION['username'] = $user->username;

                redirect("presentateurs/pres_profile", "refresh");
            }
            else
            {
                $this->session->set_flachdata("error", "se conte n'existe pas");
                redirect("auth_presentateur/pres_login", "refresh");
            }  
  }   

  $this->load->view('pres_login');
}

   public function pres_register()
  {

      if (isset($_POST['register'])) {

        $this->form_validation->set_rules('username', 'Username', 'required');

          $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

          $this->form_validation->set_rules('password', 'Confirm Password', 'required|min_length[5]matches');
         
        if ($this->form_validation->run() == TRUE) {
          echo 'form validated';
 
 
        $data = array(
          'username'=>$_POST['username'],
          'password'=> md5($_POST['password']),
        );


           $this->db->insert('presentateur',$data);
           
           $this->session->set_flashdata("success", "your account has registered");
        
           redirect("auth_presentateur/pres_register", "refresh");
        }
        

      }


    $this->load->view('pres_register');
  }


}




