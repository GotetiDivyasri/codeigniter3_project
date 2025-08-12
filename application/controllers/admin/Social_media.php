<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Social_media extends CI_Controller
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
        $data['social_media'] = $this->Admin_model->get_data('social_media');
        $this->load->view('admin/social_media', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('link', 'Link', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_social_media");
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'link' => $this->input->post('link'),
                    'icon' => $this->input->post('icon')
                ];
                $this->Admin_model->add_data($data, 'social_media');
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('social_media'));
            }
        } else {
            $this->load->view('admin/add_edit_social_media');
        }
    }

    public function edit($id)
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('link', 'Link', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_social_media");
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'link' => $this->input->post('link'),
                    'icon' => $this->input->post('icon')
                ];
                $this->Admin_model->edit_data($data, 'social_media', $id);
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('social_media'));
            }
        } else {
            if (isset($id)) {
                $data['social_media'] = $this->Admin_model->get_data_by_id($id, 'social_media');
                $this->load->view('admin/add_edit_social_media', $data);
            } else {
                $this->load->view('admin/add_edit_social_media');
            }
        }
    }

    public function delete($id)
    {
        $deleted = $this->Admin_model->delete($id, 'social_media');
        if ($deleted) {
            $this->session->set_flashdata("type", "success");
            $this->session->set_flashdata("msg", "Deleted Successfully");
        } else {
            $this->session->set_flashdata("type", "failed");
            $this->session->set_flashdata("msg", "Not Deleted Successfully");
        }
        redirect(base_url('social_media'));
    }
}
