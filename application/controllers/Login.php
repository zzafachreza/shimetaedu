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
        session_start(); // Memulai session
    
        // Mengambil nilai input dari form
        $login = $this->input->post('login');
        $password = $this->input->post('password');
    
        // Query database
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('username', $login);
        $this->db->or_where('email', $login);
        $query = $this->db->get();
    
        if ($query->num_rows() == 1) {
            $user = $query->row();
    
            if (password_verify($password, $user->password)) {
                // Mengatur session
                $_SESSION['username'] = $user->username;
                $_SESSION['email'] = $user->email;
    
                // Redirect ke homepage
                redirect(base_url('home'));
                exit; // Pastikan tidak ada script yang terjalankan setelah header redirect
            } else {
                // Set flash message untuk error dan redirect ke login
                $this->session->set_flashdata('error', 'Username/Email atau Password salah!');
                redirect('login');
            }
        } else {
            $this->session->set_flashdata('error', 'Username/Email atau Password salah!');
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