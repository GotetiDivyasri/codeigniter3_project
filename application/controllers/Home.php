<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $this->load->model('Home_model');
        // $this->load->model('Home_model','h_model');
        // $data = $this->h_model->homeData();
        $home_model = new Home_model;
        $data = $home_model->homeData();
        // $data = $this->Home_model->homeData();
        echo $data;
        // $this->load->view('home');
    }
}
