<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_login_logs extends CI_Controller
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
        $data['admin_login_logs'] = $this->Admin_model->get_data('admin_login_logs');
        foreach ($data['admin_login_logs'] as $admin) {
            $admin_name = $this->Admin_model->get_data_by_id($admin->admin_id, 'admins');
            $admin->admin = $admin_name->username;
        }
        $this->load->view('admin/admin_login_logs', $data);
    }
}
