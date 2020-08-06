<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presenze extends CI_Controller {

    public function __construct() {
        parent::__construct();
        
        $this->load->database();
        $this->load->helper('url');
        $this->load->model('presenze_model');
        $this->load->library('session');
        $this->load->library('form_validation');


        //$this->load->library('grocery_CRUD');
    }

    public function index() {
        //Preparare dati dal model
        $session = $this->session->userdata('cvd_logged_in');

        $array_attivita = $this->presenze_model->retrieve_attivita($session['id_fascia'],$session['id_gruppo'] );
        
        $array_persone = $this->presenze_model->retrieve_persone($session['id_fascia'],$session['id_gruppo'],$session['livello']);
        
        $data['array_attivita'] = $array_attivita;
        $data['array_persone'] = $array_persone;
        
        //Caricare view
        $this->load->view('presenze/index', $data);
    }

}
