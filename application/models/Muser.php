<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Muser extends CI_Model {
    
    public function get_user_by_email($email) 
    {
        return $this->db->get_where('user', ['email' => $email])->row();
    }

    public function insert_user($data) 
    {
        $this->db->insert('user', $data);
    }

     public function get_roles() 
    {
        $query = $this->db->get('roles');
        return $query->result();
    }

    public function get_levels() 
    {
        $query = $this->db->get('level');
        return $query->result();
    }
    
}
