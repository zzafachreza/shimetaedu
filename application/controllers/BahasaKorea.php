<?php

class BahasaKorea extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->model('Levelkorea_model'); // Load model di constructor
        $this->load->model('Lessonkorea_model'); // Load model Lesson_model
	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		}else{
			$data['title']='SHIMETA EDU | Bahasa Korea';
			$this->load->view('header',$data);
			$this->load->view('bahasakorea/index');
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


    function level($id = null) {
        if (!isset($_SESSION['username'])) {
            redirect('login/splash');
        } else {
            // Mengambil data level dari database
            $level_data = $this->Levelkorea_model->get_level_by_id($id);
            $lessonskorea = $this->Lessonkorea_model->get_lessons_by_level($id); // Ambil data pelajaran

            if ($level_data) {
                $data['title'] = 'SHIMETA EDU | Bahasa Korea Level ' . $level_data->name;
                $data['level'] = $level_data; // Kirim data level ke view
                $data['lessons'] = $lessonskorea; // Kirim data pelajaran ke view
                $this->load->view('header', $data);
                $this->load->view('bahasakorea/level', $data);
                $this->load->view('footer');
            } else {
                show_404(); // Menampilkan halaman 404 jika level tidak ditemukan
            }
        }
    }
}