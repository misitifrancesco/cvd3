<?php

class Presenze_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function retrieve_attivita($id_fascia, $id_gruppo) {
        $condition = "id_fascia = '" . $id_fascia . "' AND id_gruppo=" . "'" . $id_gruppo . "'  ";
        $this->db->select('*');
        $this->db->from('t_attivita');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function retrieve_persone($id_fascia, $id_gruppo, $livello = '100') {
        $condition = "id_fascia = '" . $id_fascia . "' AND id_gruppo=" . "'" . $id_gruppo . "' and livello <'" . $livello . "' ";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

}
