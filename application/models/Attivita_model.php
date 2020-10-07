<?php

class Attivita_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
        $this->load->library('utils');
    }

    public function retrieve_nome_attivita($id_attivita)
    {
        $condition = "id_attivita = '" . $id_attivita . "' ";
        $this->db->select('*');
        $this->db->from('t_attivita');
        $this->db->where($condition);
        $query = $this->db->get();
        $res = $query->result();
        $array_res = array();
        foreach ($res as $key => $dati) {
            $array_res[$key]['descrizione'] = $dati->descrizione;
            $array_res[$key]['data_att'] = $this->utils->dataEn2It($dati->data_att);
        }
        return $array_res;
    }
}
