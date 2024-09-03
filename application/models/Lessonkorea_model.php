<?php
class Lessonkorea_model extends CI_Model {

    public function get_lessons_by_level($level_id) {
        $this->db->where('level_id', $level_id);
        $query = $this->db->get('lessons_korea');
        return $query->result();
    }

}
