<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_settings extends CI_Controller
{
    public function index()
    {
        $this->load->view('admin/site_settings');
    }
}
