<?php

class BahasaMandarin extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->model('Levelmandarin_model'); // Load model di constructor
        $this->load->model('Lessonmandarin_model'); // Load model Lesson_model
	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		}else{
			$data['title']='SHIMETA EDU | Bahasa Mandarin';
			$this->load->view('header',$data);
			$this->load->view('bahasamandarin/index');
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
            $level_data = $this->Levelmandarin_model->get_level_by_id($id);
            $lessonsmandarin = $this->Lessonmandarin_model->get_lessons_by_level($id); // Ambil data pelajaran

            if ($level_data) {
                $data['title'] = 'SHIMETA EDU | Bahasa Jepang Level ' . $level_data->name;
                $data['level'] = $level_data; // Kirim data level ke view
                $data['lessons'] = $lessonsmandarin; // Kirim data pelajaran ke view
                $this->load->view('header', $data);
                $this->load->view('bahasajepang/level', $data);
                $this->load->view('footer');
            } else {
                show_404(); // Menampilkan halaman 404 jika level tidak ditemukan
            }
        }
    }
}