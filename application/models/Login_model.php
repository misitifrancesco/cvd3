<?php

class Login_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    
    public function do_login($data)
    {

        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        //print_r($this->db->last_query());   
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function read_user_information($data){
        $condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }

    }
}
