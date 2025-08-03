<?php

class Logout extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    function index()
    {
        $this->session->unset_userdata("admin_control");
        if ($this->login_model->do_logout()) {
            $this->session->set_flashdata("type", "lout");
        }
        redirect("admin/login");
    }
}
