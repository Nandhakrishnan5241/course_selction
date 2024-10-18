<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('courses', $data);
    }


    public function get_courses() {
        $query = $this->db->get('courses');
        return $query->result_array();
    }

    public function get_course_by_name($course_name) {
        $this->db->where('course_name', $course_name);
        $query = $this->db->get('courses');
        return $query->row_array();
    }
}
