<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presenze extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('presenze_model');
        $this->load->model('attivita_model');
        $this->load->library('session');
        $this->load->library('form_validation');


        //$this->load->library('grocery_CRUD');
    }

    public function index($id_attivita = '', $error_log = '')
    {
        //Preparare dati dal model
        $session = $this->session->userdata('cvd_logged_in');

        //print_r($session);


        if ($session['livello'] == '100') {
            $array_gruppi = $this->presenze_model->retrieve_gruppi('-100');
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta('-100');
        } else if ($session['livello'] == '50') {
            $array_gruppi = $this->presenze_model->retrieve_gruppi($session['id_gruppo']);
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta('-100');
        } else {
            $array_gruppi = $this->presenze_model->retrieve_gruppi($session['id_gruppo']);
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta($session['id_fascia']);
        }


        $array_attivita = $this->presenze_model->retrieve_attivita($session['id_fascia'], $session['id_gruppo']);

        $array_persone = $this->presenze_model->retrieve_persone($session['id_fascia'], $session['id_gruppo'], $session['livello']);


        if ($id_attivita <> '') {
            $array_presenze = $this->presenze_model->get_lista_presenze($id_attivita);
            $data['array_presenze'] = $array_presenze;
        } else {
            $array_presenze = array();
            $data['array_presenze'] = $array_presenze;
        }


        $data['array_gruppi'] = $array_gruppi;
        $data['array_fasciaeta'] = $array_fasciaeta;

        $data['array_attivita'] = $array_attivita;
        $data['array_persone'] = $array_persone;
        $data['id_attivita'] = $id_attivita;
        $data['error_log'] = $error_log;
        $data['titolo_pagina'] = 'Gestione Presenze';
        $data['descrizione_attivita'] = $this->attivita_model->retrieve_nome_attivita($id_attivita);

        //Caricare view
        $this->load->view('templates/header_bs');
        $this->load->view('presenze/index', $data);
        $this->load->view('templates/footer_bs');
    }

    public function insert()
    {
        $id_attivita = $this->input->post('select_attivita');
        $array_persone = $this->input->post('select_persone');
        $result = true;
        $error_log = '';
        foreach ($array_persone as $key => $id_persona) {
            if ($this->presenze_model->get_presenza_gia_inserita($id_persona, $id_attivita)) {
                $error_log .= 'Errore inserimento persona ID: ' . $id_persona . '<br>';
            } else {
                $result = $result && $this->presenze_model->insert_attivita_persona($id_attivita, $id_persona);
            }
        }
        if (strlen($error_log) == 0)
            $error_log = 'Inserimento effettuato con successo';


        $this->index($id_attivita, $error_log);
    }

    public function visualizza($id_attivita)
    {
        $array_presenze = $this->presenze_model->get_lista_presenze($id_attivita);

        $data['array_presenze'] = $array_presenze;
        //echo json_encode($array_presenze, true);

        $this->load->view('templates/header_bs');
        $this->load->view('presenze/lista_presenze', $data);
        $this->load->view('templates/footer_bs');
    }

    public function lista_presenze_json($id_attivita)
    {
        $array_presenze = $this->presenze_model->get_dati_anag_presenze($id_attivita);

        //$data['array_presenze'] = $array_presenze;
        echo json_encode($array_presenze, true);
    }

    public function visualizza_tabella_presenze($id_attivita)
    {
        $array_presenze = $this->presenze_model->get_lista_presenze($id_attivita);

        $data['array_presenze'] = $array_presenze;
        //echo json_encode($array_presenze, true);

        $this->load->view('presenze/lista_presenze', $data);
    }
    public function get_info_attivita($id_attivita)
    {
        $array_info_attivita = $this->attivita_model->retrieve_nome_attivita($id_attivita);

        $data['descrizione'] = $array_info_attivita[0]['descrizione'];
        $data['data_att'] = $array_info_attivita[0]['data_att'];
        echo json_encode($data, true);
    }

    public function get_select_attivita($id_gruppo, $id_fasciaeta)
    {
        $array_feta = $this->presenze_model->retrieve_attivita($id_fasciaeta, $id_gruppo);

        $str = '<select class="custom-select" name="select_attivita" id="select_attivita">';
        foreach ($array_feta as $key => $attivita) {
            $str .= '<option value="' . $attivita->id_attivita . '" >' . $attivita->descrizione . '</option>';
        }
        $str .= '</select>';
        echo $str;
    }
}
