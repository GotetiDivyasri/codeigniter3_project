<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Services extends CI_Controller
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
        $data['services'] = $this->Admin_model->get_data('services');
        $this->load->view('admin/services', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_services");
            } else {
                $data = [
                    'name' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'icon' => $this->input->post('icon')
                ];
                $this->Admin_model->add_data($data, 'services');
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('services'));
            }
        } else {
            $this->load->view('admin/add_edit_services');
        }
    }

    public function edit($id)
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_services");
            } else {
                $data = [
                    'name' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'icon' => $this->input->post('icon')
                ];
                $this->Admin_model->edit_data($data, 'services', $id);
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('services'));
            }
        } else {
            if (isset($id)) {
                $data['services'] = $this->Admin_model->get_data_by_id($id, 'services');
                $this->load->view('admin/add_edit_services', $data);
            } else {
                $this->load->view('admin/add_edit_services');
            }
        }
    }

    public function delete($id)
    {
        $deleted = $this->Admin_model->delete($id, 'services');
        if ($deleted) {
            $this->session->set_flashdata("type", "success");
            $this->session->set_flashdata("msg", "Deleted Successfully");
        } else {
            $this->session->set_flashdata("type", "failed");
            $this->session->set_flashdata("msg", "Not Deleted Successfully");
        }
        redirect(base_url('services'));
    }
}
