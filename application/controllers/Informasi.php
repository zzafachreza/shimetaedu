<?php

class Informasi extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->database(); // Pastikan database di-load
		$this->load->model('Artikel_model'); // Pastikan model artikel dimuat jika Anda memiliki model
	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		}else{
			$data['title']='SHIMETA EDU | Informasi';
			$this->load->view('header',$data);
			$this->load->view('informasi/index');
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


	public function readmore($id) {
		$this->load->model('Artikel_model');
	
		// Ambil artikel yang dipilih
		$article = $this->Artikel_model->get_artikel_by_id($id);
		if (!$article) {
			show_404();
		}
	
		// Ambil artikel lainnya
		$other_articles = $this->Artikel_model->get_other_artikel($id);
	
		// Set judul halaman dengan judul artikel yang dipilih
		$data['title'] = $article->title . ' | Shimeta Edu';
	
		$data['article'] = $article;
		$data['other_articles'] = $other_articles;
	
		$this->load->view('header', $data);
		$this->load->view('informasi/readmore', $data);
		$this->load->view('footer');
	}
	
}