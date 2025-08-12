<?php

class Login_model extends CI_Model
{
    function is_username_exists($username)
    {
        $data = $this->db->get_where("admins", ['email' => $username]);
        if ($data->num_rows() == 0) {
            return false;
        }
        $data = $data->row();
        return $data->id;
    }

    function login_validation($admin_id, $password)
    {
        $data = $this->get_admin_details($admin_id);
        if ($data->password == md5($password)) {
            $this->do_logout();
            $ip = $_SERVER["REMOTE_ADDR"];
            $this->session->set_userdata("admin_user_id", $admin_id);
            $this->session->set_userdata("logged", true);

            $insert_data = array(
                "address" => $ip,
                "admin_id" => $data->id,
                "created_at" => date('Y-m-d h:i s')
            );
            $this->db->insert("admin_login_logs", $insert_data);
            return true;
        } else {
            return false;
        }
    }

    function get_admin_details($admin_id = null)
    {
        if ($admin_id == NULL) {
            $admin_id = $this->get_logged_admin_id();
        }
        $user_details = $this->db->get_where("admins", ['id' => $admin_id])->row();
        return $user_details;
    }

    function get_logged_admin_id()
    {
        return $this->session->userdata("admin_user_id");
    }

    function do_logout()
    {
        $this->session->unset_userdata("admin_user_id");
        $this->session->unset_userdata("logged");
        $this->session->set_flashdata("timeout");
        delete_cookie("token");
        unset($_COOKIE["token"]);
        unset($_COOKIE["last_login"]);
        return true;
    }

    function check_for_user_logged()
    {

        $admin_id = $this->get_logged_admin_id();
        if ($this->session->userdata("logged")) {
            if ($this->get_admin_details($admin_id)->status == 0) {
                $this->session->unset_userdata("admin_user_id");
                $this->session->unset_userdata("logged");
                return false;
            }
            return true;
        } else {
            $this->session->unset_userdata("admin_user_id");
            $this->session->unset_userdata("logged");
            $this->session->set_flashdata("timeout");
            return false;
        }
    }
}
