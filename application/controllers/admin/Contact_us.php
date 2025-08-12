<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_us extends CI_Controller
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
        $data['contact_us'] = $this->Admin_model->get_data('contact_us');
        foreach ($data['contact_us'] as $contact) {
            $service = $this->Admin_model->get_data_by_id($contact->service_id, 'services');
            $contact->service = $service->name;
        }
        $this->load->view('admin/contact_us', $data);
    }

    public function add()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
            $this->form_validation->set_rules('message', 'Message', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_contact_us");
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
                redirect(base_url('contact_us'));
            }
        } else {
            $data['services'] = $this->Admin_model->get_data('services');
            $this->load->view('admin/add_edit_contact_us', $data);
        }
    }

    public function edit($id)
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'required|trim');
            $this->form_validation->set_rules('subject', 'Subject', 'required|trim');
            $this->form_validation->set_rules('message', 'Message', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_contact_us");
            } else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                    'service_id' => $this->input->post('service_id'),
                ];
                $this->Admin_model->edit_data($data, 'contact_us', $id);
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('contact_us'));
            }
        } else {
            if (isset($id)) {
                $data['contact_us'] = $this->Admin_model->get_data_by_id($id, 'contact_us');
                $data['services'] = $this->Admin_model->get_data('services');
                $this->load->view('admin/add_edit_contact_us', $data);
            } else {
                $data['services'] = $this->Admin_model->get_data('services');
                $this->load->view('admin/add_edit_contact_us');
            }
        }
    }

    public function delete($id)
    {
        $deleted = $this->Admin_model->delete($id, 'contact_us');
        if ($deleted) {
            $this->session->set_flashdata("type", "success");
            $this->session->set_flashdata("msg", "Deleted Successfully");
        } else {
            $this->session->set_flashdata("type", "failed");
            $this->session->set_flashdata("msg", "Not Deleted Successfully");
        }
        redirect(base_url('contact_us'));
    }
}
