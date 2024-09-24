<?php

class Register extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){

        
        $sql = "SELECT * FROM data_company limit 1";
   $dataCom = $this->db->query($sql);
         $data['company'] = $dataCom->result_array();

        $data['title'] = 'FM | Login';
        // $this->load->view('header',$data);
			$this->load->view('register');
			// $this->load->view('footer');
		}
	
		
	
        public function insert() {

            print_r($_POST);

            $nama_lengkap = $_POST['nama_lengkap'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $telepon = $_POST['telepon'];
            $password = sha1($_POST['password']);

            // cek
            $cek = $this->db->query("SELECT * FROM data_pengguna WHERE username like '%$username%' OR email like '%$email%'")->num_rows();

            echo $cek;

            if($cek > 0 ){

                $this->session->set_flashdata('error', 'Maaf username / email sudah terdaftar !');
                // echo 'username sudaj ada';
                redirect('register'); 
            }else{
               $sql="INSERT INTO data_pengguna(
                    nama_lengkap,
                    username,
                    email,
                    telepon,
                    password
                    ) VALUES(
                    '$nama_lengkap',
                    '$username',
                    '$email',
                    '$telepon',
                    '$password'
                )";

                if($this->db->query($sql)){
                    $this->session->set_flashdata('success', 'Akun berhasil terdaftar !');
       
                redirect('login'); 
            }else{
                }
            }
           
        }
        
	
	}

?>