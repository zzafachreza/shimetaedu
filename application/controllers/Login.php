<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('Login_model');
    }

    function index(){
        
        $sql = "SELECT * FROM data_company limit 1";
         $dataCom = $this->db->query($sql);
         $data['company'] = $dataCom->result_array();

        $data['title'] = 'FM | Login';
        // $this->load->view('header',$data);
        $this->load->view('login');
        
     
    }
    
      function splash(){
        
        $sql = "SELECT * FROM data_company limit 1";
         $dataCom = $this->db->query($sql);
         $data['company'] = $dataCom->result_array();

        $this->load->view('header',$data);
        $this->load->view('splash');
        
     
    }

    function validasi() {

    
        // Mengambil nilai input dari form
        $login = $this->input->post('login');
        $password = sha1($this->input->post('password'));

        echo $sql="SELECT * FROM data_pengguna WHERE status='Aktif' AND password='$password' AND (username ='$login' OR email='$login')";

         $cek = $this->db->query($sql);
    
      
    
        if ($cek->num_rows() > 0) {

            $r = $cek->row_array();
            $_SESSION = $r;
            redirect('./');
                
            
          
        } else {
            $this->session->set_flashdata('error', 'Username/Email atau Password salah atau Akunmu belum aktif !');
            redirect('login');
        }
    }
    

    function logout(){

        unset($_SESSION['username']);
        unset($_SESSION['level']);
        session_destroy(); 

         redirect('login');


    }
}