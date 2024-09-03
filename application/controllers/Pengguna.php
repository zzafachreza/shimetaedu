	<?php

class Pengguna extends CI_Controller{

	function __construct(){

		parent::__construct();
	}

	function index(){

		$data['title']='Data Pengguna';
		$this->load->view('header',$data);
		$this->load->view('pengguna/data');
		$this->load->view('footer');
	} //ok 
	

	
  

	function add(){
		$data['title']='Data Pegawai - Add';
		$this->load->view('header',$data);
		$this->load->view('pengguna/add');
		$this->load->view('footer');
	}

	function insert(){
	    

	   
		$nama_lengkap = $this->input->post('nama_lengkap');
		$username = $this->input->post('username');
		$password = sha1($this->input->post('password'));
            
            $sql="INSERT INTO data_user(
            
            nama_lengkap,
            username,
            password
           
            )VALUES(
            '$nama_lengkap',
            '$username',
            '$password'
            
                )";
		
		if($this->db->query($sql)){
		    redirect('pengguna');
		}
	}

	function delete(){
		$id = $this->uri->segment(3);
		$this->db->query("DELETE FROM data_user WHERE id='$id'");
		redirect('pengguna');
	}

	function edit(){

		$id	= $this->uri->segment(3);

		$data['title']='Data Pengguna- Edit';
		$this->load->view('header',$data);
		$this->load->view('pengguna/edit',$data);
		$this->load->view('footer');
	}

	function detail(){
		$id	= $this->uri->segment(3);
		$data['title']='Data Pengguna - Detail';


		$this->load->view('header',$data);
		$this->load->view('pengguna/view',$data);
		$this->load->view('footer');
	}



	function update(){


				$id = $this->input->post('id');
				
				$email = $_POST['email'];
                $nama_lengkap = $_POST['nama_lengkap'];
                $usia = $_POST['usia'];
                $jenis_kelamin = $_POST['jenis_kelamin'];
                $penyakit = $_POST['penyakit'];
                $berat_badang = $_POST['berat_badang'];
                $tinggi_badan = $_POST['tinggi_badan'];
                $obat = $_POST['obat'];
                $alergi = $_POST['alergi'];
                $keluhan = $_POST['keluhan'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                
                $makan_pagi = $_POST['makan_pagi'];
                $makan_siang = $_POST['makan_siang'];
                $makan_malam = $_POST['makan_malam'];
                $golongan_darah = $_POST['golongan_darah'];
	

		
		
	
		
		if(!empty($this->input->post('password'))){
		    	$password = sha1($this->input->post('password'));
		    
		    $sql="UPDATE data_user SET 
		        
		        email='$email',
                nama_lengkap='$nama_lengkap',
                usia='$usia',
                jenis_kelamin='$jenis_kelamin',
                penyakit='$penyakit',
                berat_badang='$berat_badang',
                tinggi_badan='$tinggi_badan',
                obat='$obat',
                alergi='$alergi',
                keluhan='$keluhan',
                alamat='$alamat',
                telepon='$telepon',
                makan_pagi='$makan_pagi',
                makan_siang='$makan_siang',
                makan_malam='$makan_malam',
                golongan_darah='$golongan_darah',
		      
             
               
                password='$password'
               
                
                
                WHERE id='$id'";
		    
		}else{
		    
		    
		     $sql="UPDATE data_user SET 
		    
                     
		        email='$email',
                nama_lengkap='$nama_lengkap',
                usia='$usia',
                jenis_kelamin='$jenis_kelamin',
                penyakit='$penyakit',
                berat_badang='$berat_badang',
                tinggi_badan='$tinggi_badan',
                obat='$obat',
                alergi='$alergi',
                keluhan='$keluhan',
                alamat='$alamat',
                telepon='$telepon',
                 makan_pagi='$makan_pagi',
                makan_siang='$makan_siang',
                makan_malam='$makan_malam',
                golongan_darah='$golongan_darah'
                
                WHERE id='$id'";
		}
		
	


		
		if($this->db->query($sql))
		{
		    	$hasil = $this->db->query("SELECT * FROM data_user WHERE id='$id'");
		
		  $i = $hasil->row_array();

    
             $_SESSION['username'] = $i['email'];
             $_SESSION['id'] = $i['id'];
             $_SESSION['email'] = $i['email'];
            $_SESSION['nama_lengkap'] = $i['nama_lengkap'];
            $_SESSION['usia'] = $i['usia'];
            $_SESSION['jenis_kelamin'] = $i['jenis_kelamin'];
            $_SESSION['penyakit'] = $i['penyakit'];
            $_SESSION['berat_badang'] = $i['berat_badang'];
            $_SESSION['tinggi_badan'] = $i['tinggi_badan'];
            $_SESSION['obat'] = $i['obat'];
            $_SESSION['alergi'] = $i['alergi'];
            $_SESSION['keluhan'] = $i['keluhan'];
            $_SESSION['alamat'] = $i['alamat'];
            $_SESSION['telepon'] = $i['telepon'];
            $_SESSION['makan_pagi']= $i['makan_pagi'];
            $_SESSION['makan_siang']= $i['makan_siang'];
            $_SESSION['makan_malam']= $i['makan_malam'];
            $_SESSION['golongan_darah']= $i['golongan_darah'];
          
            
            $this->session->set_flashdata('update', 'Akun berhasil diupdate !');
            
            		redirect('./');
		}

	}
}