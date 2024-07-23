<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mregis_user extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_roles() {
        $query = $this->db->get('roles');
        return $query->result();
    }

    public function get_levels() {
        $query = $this->db->get('level');
        return $query->result();
    }

    public function insert_user($data) {
        return $this->db->insert('user', $data);
    }
}
