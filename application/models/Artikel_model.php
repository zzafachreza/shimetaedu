<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Mengambil artikel berdasarkan ID
     *
     * @param int $id ID artikel
     * @return object|null Objek artikel atau null jika tidak ditemukan
     */
    public function get_artikel_by_id($id) {
        return $this->db->get_where('artikel', array('id' => $id))->row();
    }

    /**
     * Mengambil semua artikel kecuali artikel dengan ID tertentu
     *
     * @param int $id ID artikel yang harus dikecualikan
     * @return array Daftar objek artikel
     */
	public function get_other_artikel($id) {
		$this->db->where('id !=', $id); // Mengambil semua artikel yang ID-nya tidak sama dengan $id
		return $this->db->get('artikel')->result(); // Mengembalikan hasil sebagai array objek
		log_message('debug', 'Query executed: ' . $this->db->last_query());
		return $query->result();
	}
	

    /**
     * Mengambil semua artikel
     *
     * @return array Daftar objek artikel
     */
    public function get_all_artikel() {
        return $this->db->get('artikel')->result();
    }
}