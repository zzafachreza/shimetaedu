<?php

class Program extends CI_Controller{

	function __construct(){
		parent::__construct();
	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		}else{
			$data['title']='SHIMETA EDU';
			$this->load->view('header',$data);
			$this->load->view('program/data');
			$this->load->view('footer');
		}
	}
	function download(){

		if (!isset($_SESSION['username'])) {
			redirect('login');
		}else{
			$data['title']='Fachreza Maulana | Download';
			$this->load->view('download');
		}
	}
	
    


	function map(){

	
			$this->load->view('map');
		
	}

	public function level() {
		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		} else {
			// Muat header, view utama, dan footer
			$data['title']='SHIMETA EDU';
				$this->load->view('header', $data);
				$this->load->view('program/level', $data); // Kirim data ke view
				$this->load->view('footer');
		}
	}
	
	

}