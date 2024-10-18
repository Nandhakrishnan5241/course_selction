<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function insert_bio_data($data) {
        $this->db->insert('students', $data);
        return $this->db->insert_id();
    }

    public function get_available_courses() {
        $specialization = $this->session->userdata('specialization');
        $this->db->where('specialization', $specialization);
        $query = $this->db->get('courses');
        return $query->result(); 
    }

    public function insert_application_data($data) {
        $this->db->insert('applications', $data);
        return $this->db->insert_id();
    }

    public function get_student_name_by_id($user_id) {
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row_array();
    }
}
