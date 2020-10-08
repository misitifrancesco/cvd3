<?php

//header('Cache-Control: no cache'); //no cache
//session_cache_limiter('private_no_expire'); // works
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Organigramma extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('presenze_model');
        $this->load->model('organigramma_model');
        //$this->load->model('attivita_model');
        $this->load->library('session');
    }

    public function index()
    {
        $session = $this->session->userdata('cvd_logged_in');
        $livello = $session['livello'];
        $str_res = '';
        //print_r($session);

        if ($livello == '100') {
            $array_gruppi = $this->presenze_model->retrieve_gruppi('-100');
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta('-100');
        } else if ($livello == '50') {
            $array_gruppi = $this->presenze_model->retrieve_gruppi($session['id_gruppo']);
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta('-100');
        } else {
            $array_gruppi = $this->presenze_model->retrieve_gruppi($session['id_gruppo']);
            $array_fasciaeta = $this->presenze_model->retrieve_fasciaeta($session['id_fascia']);
        }


        $str_res .= '<table id="table_organigramma">';

        foreach ($array_gruppi as $gruppo) {
            //stampo nome gruppo
            $str_res .= '<tr ><td colspan="3" ><center><h1><btn type="button" class="btn btn-danger btn_apri btn-lg" data-id_gruppo="' . $gruppo->id_gruppo . '" style="width:200px">' . strtoupper($gruppo->descrizione) . '</btn></h1></center></td></tr>';
            //trovo i capigruppo
            $capi_gruppo = $this->organigramma_model->retrieve_capi_gruppi($gruppo->id_gruppo);

            foreach ($capi_gruppo as $capo_gruppo) {
                $str_res .= '<tr class="tr_nascosto tr_gruppo_' . $gruppo->id_gruppo . '"><td colspan="3"><center><h4>' . $capo_gruppo->nome . ' ' . $capo_gruppo->cognome . '</h4></center></td></tr>';
            }

            foreach ($array_fasciaeta as $fasciaeta) {
                //Stampo la fascia
                $str_res .= '<tr class="tr_nascosto tr_gruppo_' . $gruppo->id_gruppo . '">';
                $str_res .= '<td>';
                $str_res .= '<img src="' . base_url() . '/img/unita_' . $fasciaeta->id_fascia . '.png" width="50px";><span style="font-size:20px">' . $fasciaeta->fascia . '</span>';
                $str_res .= '</td>';
                $str_res .= '</tr>';

                //trovo i capiunita
                $capi_unita = $this->organigramma_model->retrieve_capi_unita($gruppo->id_gruppo, $fasciaeta->id_fascia);
                //print_r($capi_unita);
                foreach ($capi_unita as $capo_unita) {
                    $str_res .= '<tr class="tr_nascosto tr_gruppo_' . $gruppo->id_gruppo . '">';
                    $str_res .= '<td></td>';
                    $str_res .= '<td><h5>' . $capo_unita->nome . ' ' . $capo_unita->cognome . '</h5></td>';
                    $str_res .= '<tr>';
                }
                //trovo gli scout
                $scouts = $this->organigramma_model->retrieve_scouts($gruppo->id_gruppo, $fasciaeta->id_fascia);
                foreach ($scouts as $scout) {
                    $str_res .= '<tr class="tr_nascosto tr_gruppo_' . $gruppo->id_gruppo . ' ">';
                    $str_res .= '<td></td>';
                    $str_res .= '<td></td>';
                    $str_res .= '<td>' . $scout->nome . ' ' . $scout->cognome . '</td>';
                    $str_res .= '</tr>';
                }
            }
        }

        $str_res .= '<table>';


        $data['output'] = $str_res;

        $data['titolo_pagina'] = 'Gestione Organigramma';
        //Caricare view
        $this->load->view('templates/header_bs');
        $this->load->view('organigramma/index', $data);
        $this->load->view('templates/footer_bs');
    }
}
