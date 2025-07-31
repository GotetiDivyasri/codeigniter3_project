<?php

class Home_model extends CI_Model
{
    public function homeData()
    {
        $data = [
            'name' => 'divya',
            'number' => '9848032919'
        ];
        return $data;
    }

    public function contact($data)
    {
        return $this->db->insert('contact_us', $data);
    }
}
