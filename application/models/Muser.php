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

    function loginMe($user, $password)
    {
        $this->db->select('u.id_user, u.password, u.nama_pengguna, u.email, u.id_role, u.id_level, r.role');
        $this->db->from('user u');
        $this->db->join('roles r','r.id_role = u.id_role');
        $this->db->where('u.email',$user);
        $this->db->where('u.deleted', 0);
        $this->db->where('status',1);
        $query = $this->db->get();
        
        $user = $query->result();
        
        if(!empty($user)){
            if(md5($password, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    public function get_user_by_id($id_user) {
        return $this->db->get_where('user', ['id_user' => $id_user])->row();
    }
    
}
