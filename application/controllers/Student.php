<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Student_model');
        $this->load->model('Courses_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function bio_data()
    {
        if (!$this->session->userdata('user_id')) {
            redirect('auth/login');
        }
        $data['courses']      =  $this->Courses_model->get_courses();
        $this->load->view('bio_data', $data);
    }


    public function upload_certificates()
    {

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('dob', 'Date of Birth', 'required');
        $this->form_validation->set_rules('marks_10', '10th Marks', 'required|integer');
        $this->form_validation->set_rules('marks_12', '12th Marks', 'required|integer');


        $this->load->library('upload');
        $config_10 = [
            'upload_path'   => './uploads/certificates/',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size'      => 2048,
            'file_name'     => time() . '_10th_certificate'
        ];

        $config_12 = [
            'upload_path'   => './uploads/certificates/',
            'allowed_types' => 'jpg|jpeg|png|pdf',
            'max_size'      => 2048,
            'file_name'     => time() . '_12th_certificate'
        ];
        $this->upload->initialize($config_10);
        if (!$this->upload->do_upload('certificate_10')) {
            $error_10 = ['error' => $this->upload->display_errors()];
            $this->load->view('upload_certificates_form', $error_10);
        } else {
            $data_10 = $this->upload->data();
        }


        $this->upload->initialize($config_12);
        if (!$this->upload->do_upload('certificate_12')) {
            $error_12 = ['error' => $this->upload->display_errors()];
            $this->load->view('upload_certificates_form', $error_12);
        } else {
            $data_12 = $this->upload->data();
        }
        if (!isset($error_10) && !isset($error_12)) {
            $user_id = $this->session->userdata('user_id');
            $course_name = $this->input->post('specialization');
            $userData = $this->Student_model->get_student_name_by_id($user_id);
           



            $student_data = [
                'user_id'        => $user_id,
                'name'           => $userData['username'],
                'dob'            => $this->input->post('dob'),
                'marks_10'       => $this->input->post('marks_10'),
                'marks_12'       => $this->input->post('marks_12'),
                'specialization' => $this->input->post('specialization'),
                'certificate_10' => $data_10['file_name'],
                'certificate_12' => $data_12['file_name']
            ];


           
            $student_id = $this->Student_model->insert_bio_data($student_data);
            
           
            if ($student_id) {
                $courses_data       = $this->Courses_model->get_course_by_name($course_name);
                $data['student_data'] = $student_data;
                $course_name = $courses_data['course_name'];

                $course_list = json_decode($courses_data['course_list'], true);
                $data['student_id']  = $student_id;
                $data['course_name']  = $course_name;
                $data['course_list']  = $course_list;

                $this->load->view('courses', $data);
            } else {
                echo "Error in saving student data.";
            }
        } else {
            echo "failed";
            die;
        }
    }

    public function submit_application()
    {
        $user_id         = $this->session->userdata('user_id');
        $applicationData = [
            'student_id'       => $this->input->post('student_id'),
            'course'           => $this->input->post('selectedCourse'),
            'status'           => "PENDING",
        ];
        $application_id =  $this->Student_model->insert_application_data($applicationData);
        if ($application_id) {
            $data['courses']      =  $this->Courses_model->get_courses();
            
            $this->load->view('notify', $data);
        }
    }





    public function apply($course_id)
    {
        redirect('student/check_status');
    }

    public function check_status()
    {
        $data['status'] = $this->Student_model->get_admission_status($this->session->userdata('user_id'));
        $this->load->view('admission_status', $data);
    }
}
