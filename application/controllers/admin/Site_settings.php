<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site_settings extends CI_Controller
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
        $data['site_settings'] = $this->Admin_model->get_data('site_settings');
        $this->load->view('admin/site_settings', $data);
    }
    public function add()
    {
        if (!empty($_POST)) {
            $this->form_validation->set_rules('site_title', 'Site Title', 'required|trim');
            $this->form_validation->set_rules('footer_description', 'Footer Description', 'required|trim');
            $this->form_validation->set_rules('site_email', 'Site Email', 'required|trim');
            $this->form_validation->set_rules('phone_number', 'Phone Number', 'required|trim');
            $this->form_validation->set_rules('why_choose_title', 'Why Choose Title', 'required|trim');
            $this->form_validation->set_rules('why_choose_desc', 'Why Choose Description', 'required|trim');
            $this->form_validation->set_rules('our_service_title', 'Our Service Title', 'required|trim');
            $this->form_validation->set_rules('our_service_desc', 'Our Service Description', 'required|trim');
            $this->form_validation->set_rules('our_client_title', 'Our Client Title', 'required|trim');
            $this->form_validation->set_rules('our_client_desc', 'Our Client Description', 'required|trim');
            $this->form_validation->set_rules('contact_title', 'Contact Title', 'required|trim');
            $this->form_validation->set_rules('contact_desc', 'Contact Description', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata("type", "failed");
                $this->session->set_flashdata("msg", "Something went wrong");
                $this->load->view("admin/add_edit_site_settings");
            } else {
                $data = [
                    'site_title' => $this->input->post('site_title'),
                    'footer_description' => $this->input->post('footer_description'),
                    'site_email' => $this->input->post('site_email'),
                    'phone_number' => $this->input->post('phone_number'),
                    'why_choose_title' => $this->input->post('why_choose_title'),
                    'why_choose_desc' => $this->input->post('why_choose_desc'),
                    'our_service_title' => $this->input->post('our_service_title'),
                    'our_service_desc' => $this->input->post('our_service_desc'),
                    'our_client_title' => $this->input->post('our_client_title'),
                    'our_client_desc' => $this->input->post('our_client_desc'),
                    'contact_title' => $this->input->post('contact_title'),
                    'contact_desc' => $this->input->post('contact_desc')
                ];
                $uid = '';
                if ($_POST['uid']) {
                    $uid =  $_POST['uid'];
                    $data_settings = $this->Admin_model->get_data_by_id($uid, 'site_settings');
                }
                if (isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])) {
                    $data['logo'] = $this->Admin_model->image_upload('logo');
                } else if (isset($data_settings->logo)) {
                    $data['logo'] = $data_settings->logo;
                }
                if (isset($_FILES['fav_icon']['name']) && !empty($_FILES['fav_icon']['name'])) {
                    $data['fav_icon'] = $this->Admin_model->image_upload('fav_icon');
                } else if ($data_settings->fav_icon) {
                    $data['fav_icon'] = $data_settings->fav_icon;
                }
                $this->Admin_model->add_edit_data($data, 'site_settings', $uid);
                $this->session->set_flashdata("type", "success");
                $this->session->set_flashdata("msg", "Data inserted successfully");
                redirect(base_url('site_settings'));
            }
        } else {
            if (isset($_GET['id'])) {
                $data['settings'] = $this->Admin_model->get_data_by_id($_GET['id'], 'site_settings');
                $this->load->view('admin/add_edit_site_settings', $data);
            } else {
                $this->load->view('admin/add_edit_site_settings');
            }
        }
    }

    public function delete()
    {
        $id = $_GET['id'];
        $deleted = $this->Admin_model->delete($id, 'site_settings');
        if ($deleted) {
            $this->session->set_flashdata("type", "success");
            $this->session->set_flashdata("msg", "Deleted Successfully");
        } else {
            $this->session->set_flashdata("type", "failed");
            $this->session->set_flashdata("msg", "Not Deleted Successfully");
        }
        redirect(base_url('site_settings'));
    }
}
