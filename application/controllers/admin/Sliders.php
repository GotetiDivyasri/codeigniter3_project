<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sliders extends CI_Controller
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
        $data['sliders'] = $this->Admin_model->get_data('slider');
        $this->load->view('admin/sliders', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('description', 'Description', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_sliders");
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description')
                ];
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $data['image'] = $this->Admin_model->image_upload('image');
                }
                $this->Admin_model->add_data($data, 'slider');
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('sliders'));
            }
        } else {
            $this->load->view('admin/add_edit_sliders');
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
                $this->load->view("admin/add_edit_sliders");
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description')
                ];
                $data_settings = $this->Admin_model->get_data_by_id($id, 'slider');
                if (isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])) {
                    $data['image'] = $this->Admin_model->image_upload('image');
                } else if (isset($data_settings->image)) {
                    $data['image'] = $data_settings->image;
                }
                $this->Admin_model->edit_data($data, 'slider', $id);
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('sliders'));
            }
        } else {
            if (isset($id)) {
                $data['slider'] = $this->Admin_model->get_data_by_id($id, 'slider');
                $this->load->view('admin/add_edit_sliders', $data);
            } else {
                $this->load->view('admin/add_edit_sliders');
            }
        }
    }

    public function delete($id)
    {
        $deleted = $this->Admin_model->delete($id, 'slider');
        if ($deleted) {
            $this->session->set_flashdata("type", "success");
            $this->session->set_flashdata("msg", "Deleted Successfully");
        } else {
            $this->session->set_flashdata("type", "failed");
            $this->session->set_flashdata("msg", "Not Deleted Successfully");
        }
        redirect(base_url('sliders'));
    }
}
