<?php
class Lessonkorea_model extends CI_Model {

   // Fungsi untuk mengambil pelajaran berdasarkan level_id
public function get_lessons_by_level($level_id) {
    // Ambil pelajaran hanya dengan level_id yang sesuai
    $this->db->where('level_id', $level_id);
    $query = $this->db->get('lessons_korea');
    return $query->result();
}
}
