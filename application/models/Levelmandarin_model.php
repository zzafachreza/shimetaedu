<?php

class Levelmandarin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Fungsi untuk mengambil data level berdasarkan ID
    public function get_level_by_id($id) {
        $query = $this->db->get_where('levels_mandarin', array('id' => $id));
        return $query->row(); // Mengembalikan satu baris data
    }

    // Fungsi untuk mengambil semua data level
    public function get_all_levels() {
        $query = $this->db->get('levels_mandarin');
        return $query->result(); // Mengembalikan semua baris data
    }
}
