<?php

class Admin_model extends CI_Model
{
    public function contact($data)
    {
        return $this->db->insert('contact_us', $data);
    }
}
