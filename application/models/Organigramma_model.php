<?php

class Organigramma_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function retrieve_capi_gruppi($id_gruppo)
    {
        $condition = " id_gruppo = '" . $id_gruppo . "' AND livello = '50' ";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
    public function retrieve_capi_unita($id_gruppo, $id_fascia)
    {
        $condition = " id_gruppo = '" . $id_gruppo . "' AND id_fascia = '" . $id_fascia . "' and livello = '50' ";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
    public function retrieve_scouts($id_gruppo, $id_fascia)
    {
        $condition = " id_gruppo = '" . $id_gruppo . "' AND id_fascia = '" . $id_fascia . "' and livello = '0' ";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
}
