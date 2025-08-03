<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Login_model');
        if ($this->Login_model->check_for_user_logged() == true) {
            redirect("admin/dashboard");
        }
    }

    public function index()
    {
        if (!empty($_POST)) {

            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required|trim|min_length[5]|max_length[32]',
                array(
                    'required' => 'You must provide a valid %s.',
                    'min_length' => 'Invalid Credentials',
                    'max_length' => 'Invalid Credentials'
                )
            );
            if ($this->form_validation->run() == FALSE) {
                $this->load->view("admin/login");
            } else {
                $admin_id = $this->Login_model->is_username_exists($this->input->post("email"));
                if ($admin_id == false || $admin_id == "") {
                    $this->session->set_flashdata("type", "not_exists");
                    redirect("admin/login");
                }
                if ($this->Login_model->login_validation($admin_id, $this->input->post("password"))) {
                    redirect("admin/login");
                } else {
                    $this->session->set_flashdata("type", "log");
                    redirect("admin/login");
                }
            }
        } else {
            $this->load->view("admin/login");
        }
    }
}
