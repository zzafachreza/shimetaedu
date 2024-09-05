<?php

class BahasaJepang extends CI_Controller{

	function __construct(){
		parent::__construct();
        $this->load->model('Level_model'); // Load model di constructor
        $this->load->model('Lesson_model'); // Load model Lesson_model
	}

	function index(){

		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		}else{
			$data['title']='SHIMETA EDU | Bahasa Jepang';
			$this->load->view('header',$data);
			$this->load->view('bahasajepang/index');
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

	public function level($id = null, $lesson_id = null) {
		if (!isset($_SESSION['username'])) {
			redirect('login/splash');
		} else {
			// Mengambil data level dari database
			$level_data = $this->Level_model->get_level_by_id($id);
			$lessons = $this->Lesson_model->get_lessons_by_level($id); // Ambil data pelajaran berdasarkan level_id
	
			if ($level_data) {
				$data['title'] = 'SHIMETA EDU | Bahasa Jepang Level ' . $level_data->name;
				$data['level'] = $level_data;
				$data['lessons'] = $lessons; // Kirim data pelajaran ke view
	
				// Jika tidak ada lesson_id, ambil pelajaran pertama sebagai default
				if (!$lesson_id && !empty($lessons)) {
					$lesson_id = $lessons[0]->id; // Set lesson_id ke ID pelajaran pertama
				}
	
				$data['currentLessonId'] = $lesson_id; // Tambahkan currentLessonId ke view
				
				// Muat header, view utama, dan footer
				$this->load->view('header', $data);
				$this->load->view('bahasajepang/level', $data); // Kirim data ke view
				$this->load->view('footer');
			} else {
				show_404(); // Menampilkan halaman 404 jika level tidak ditemukan
			}
		}
	}
	
	

}