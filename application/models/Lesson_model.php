<?php
class Lesson_model extends CI_Model {

    public function get_lessons_by_level($level_id) {
        $this->db->where('level_id', $level_id);
        $query = $this->db->get('lessons');
        return $query->result();
    }

}
