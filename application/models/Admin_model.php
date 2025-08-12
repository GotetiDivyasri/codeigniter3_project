<?php

class Admin_model extends CI_Model
{
    public function contact($data)
    {
        return $this->db->insert('contact_us', $data);
    }

    public function image_upload($image)
    {
        /* to check our path is there or not
        $upload_path = './uploads/'; // Assuming uploads is in the root directory
        if (!is_dir($upload_path)) {
            echo 'Upload directory does not exist.';
            die;
        }
        */

        /* for check file error
        if ($_FILES['logo']['error'] !== UPLOAD_ERR_OK) {
            echo 'Upload error: ' . $_FILES['logo']['error'];
            die;
        }
        */

        /* Confirm the file is uploaded
        if (is_uploaded_file($_FILES['logo']['tmp_name'])) {
            echo 'File uploaded successfully.';
        } else {
            echo 'File upload failed.';
            die;
        }
        */

        $original_filename = $_FILES[$image]['name'];
        $filename = time() . "_" . str_replace(' ', '-', $original_filename);
        $config = [
            'upload_path'   => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'file_name'     => $filename
        ];
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload($image)) {
            $error = $this->upload->display_errors();
        } else {
            $uploaded_data = $this->upload->data();
            $uploaded_image_name = $uploaded_data['file_name'];
            return $uploaded_image_name;
        }
    }

    public function delete($id, $table)
    {
        return $this->db->where('id', $id)->delete($table);
    }

    public function get_data_by_id($id, $table)
    {
        return $this->db->where('id', $id)->get($table)->row();
    }

    public function add_data($data, $table)
    {
        return $this->db->insert($table, $data);
    }

    public function add_edit_data($data, $table, $uid = '')
    {
        if ($uid != '') {
            return $this->db->where('id', $uid)->update($table, $data);
        } else {
            return $this->db->insert($table, $data);
        }
    }

    public function edit_data($data, $table, $uid = '')
    {
        if ($uid != '') {
            return $this->db->where('id', $uid)->update($table, $data);
        }
    }

    public function get_data($table)
    {
        return $this->db->get($table)->result();
    }

    public function get_data_row($table)
    {
        return $this->db->get($table)->row();
    }
}
