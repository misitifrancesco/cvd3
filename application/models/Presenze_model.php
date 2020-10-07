<?php

class Presenze_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function retrieve_attivita($id_fascia, $id_gruppo)
    {
        $condition = "id_fascia = '" . $id_fascia . "' AND id_gruppo=" . "'" . $id_gruppo . "'  ";
        $this->db->select('*');
        $this->db->from('t_attivita');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function retrieve_persone($id_fascia, $id_gruppo, $livello = '100')
    {
        $condition = "id_fascia = '" . $id_fascia . "' AND id_gruppo=" . "'" . $id_gruppo . "' and livello <'" . $livello . "' ";
        $this->db->select('*');
        $this->db->from('t_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function retrieve_gruppi($id_gruppo)
    {

        $condition = " id_gruppo = '" . $id_gruppo . "' ";
        $this->db->select('*');
        $this->db->from('t_gruppo');
        if ($id_gruppo <> '-100')
            $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function retrieve_fasciaeta($id_fasciaeta)
    {

        $condition = " id_fascia = '" . $id_fasciaeta . "' ";
        $this->db->select('*');
        $this->db->from('t_fasciaeta');
        if ($id_fasciaeta <> '-100')
            $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_attivita_persona($id_attivita, $id_persona)
    {
        $data = array(
            'id_attivita' => $id_attivita,
            'id_persona' => $id_persona
        );
        return $this->db->insert('t_presenze', $data);
    }

    public function get_lista_presenze($id_attivita)
    {
        $condition = "id_attivita = '" . $id_attivita . "' ";
        $this->db->select('pres.*, pers.*');
        $this->db->from('t_presenze pres');
        $this->db->join('t_persona pers', 'pres.id_persona = pers.id_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_dati_anag_presenze($id_attivita)
    {

        $this->load->library('utils');

        $condition = "id_attivita = '" . $id_attivita . "' ";
        $this->db->select('pers.nome, pers.cognome, pers.data_nasc');
        $this->db->from('t_presenze pres');
        $this->db->join('t_persona pers', 'pres.id_persona = pers.id_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        $res = $query->result();
        $array_res = array();
        foreach ($res as $key => $dati) {
            $array_res[$key]['nome'] = $dati->nome;
            $array_res[$key]['cognome'] = $dati->cognome;
            $array_res[$key]['data_nasc'] = $this->utils->dataEn2It($dati->data_nasc);
        }
        return $array_res;
        //return $query->result();
    }

    public function get_presenza_gia_inserita($id_persona, $id_attivita)
    {

        $condition = "id_attivita = '" . $id_attivita . "' and pers.id_persona = '" . $id_persona . "' ";
        $this->db->select('pres.*, pers.*');
        $this->db->from('t_presenze pres');
        $this->db->join('t_persona pers', 'pres.id_persona = pers.id_persona');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() > 0)
            return true;
        else
            return false;
        //print_r($this->db->last_query());
        //print_r($query);
    }
}
