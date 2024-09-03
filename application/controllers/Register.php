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
            // Mengambil data dari POST
            $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
            $username = $this->input->post('username', TRUE);
            $email = $this->input->post('email', TRUE);
            $nomor_telepon = $this->input->post('nomor_telepon', TRUE);
            $password = $this->input->post('password', TRUE);
        
            // Memastikan password tidak kosong
            if (empty($password)) {
                die('Password tidak boleh kosong');
            }
        
            // Hash password
            $password_hashed = password_hash($password, PASSWORD_DEFAULT);
            if ($password_hashed === false) {
                die('Gagal meng-hash password');
            }
        
            // Data array untuk insert
            $data = array(
                'nama_lengkap' => $nama_lengkap,
                'username' => $username,
                'email' => $email,
                'nomor_telepon' => $nomor_telepon,
                'password' => $password_hashed
            );
        
            // Insert data menggunakan Query Builder
            $this->db->insert('user', $data);
        
            if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('update', 'Registrasi Pengguna Baru Berhasil!');
                redirect('login');
            } else {
                echo "Mohon Masukan"; // Atau tampilkan error yang lebih deskriptif
            }
        }
        
	
	}

?>