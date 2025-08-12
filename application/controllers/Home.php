<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->helper('form'); // Load the form helper
    }

    public function index()
    {
        //to check db connection
        /* error_reporting(E_ALL);
         ini_set('display_errors', 1);
         $this->load->database();
        */

        //we can load model with rename
        /*
         $this->load->model('Home_model','h_model');
         $data = $this->h_model->homeData();
        */
        $data = [
            'services' => $this->Admin_model->get_data('services'),
            'slider' => $this->Admin_model->get_data_row('slider'),
            'why_choose_us' => $this->Admin_model->get_data('why_choose_us'),
            'about_us' => $this->Admin_model->get_data_row('about_us'),
            'our_clients' => $this->Admin_model->get_data('our_clients'),
            'social_media' => $this->Admin_model->get_data('social_media'),
            'site_settings' => $this->Admin_model->get_data_row('site_settings'),
        ];
        $this->load->view('home', $data);
    }
    public function contactus()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');
            //$this->form_validation->set_rules('service_id', 'service', 'required');
            $this->form_validation->set_rules('message', 'message', 'required');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                redirect(base_url('home'));
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                    'service_id' => $this->input->post('service_id'),
                ];
                $this->Admin_model->add_data($data, 'contact_us');
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('home'));
            }
        }
    }
}
