<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Home_model');
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
        $data_dt = $this->Home_model->homeData();
        $this->load->view('home', $data_dt);
    }
    public function contactus()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'email', 'required');
            $this->form_validation->set_rules('subject', 'subject', 'required');
            //$this->form_validation->set_rules('service_id', 'service', 'required');
            $this->form_validation->set_rules('message', 'message', 'required');
            if ($this->form_validation->run() == TRUE) {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'subject' => $this->input->post('subject'),
                    'service_id' => $this->input->post('service_id'),
                    'message' => $this->input->post('message')
                ];
                $this->Home_model->contact($data);
                redirect(base_url('home'));
            } else {
                $this->index();
                // redirect(base_url('home'));
            }
            // $this->db->insert($data);
        }
    }
}
