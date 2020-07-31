<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Attivita extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function admin() {

        $this->dati_utente = $this->session->userdata('cvd_logged_in');
        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('t_attivita');
        $crud->columns('data_att', 'descrizione');
        $crud->add_fields('data_att', 'descrizione', 'id_gruppo', 'id_fascia');
        $crud->display_as('data_att', 'Data attività');
        //$crud->where('id_gruppo="5"');

        $crud->field_type('id_gruppo', 'hidden', $this->dati_utente['id_gruppo']);
        $crud->field_type('id_fascia', 'hidden', $this->dati_utente['id_fascia']);

        $output = $crud->render();


        $output->mio_parametro = 'Footer della pagina Attivita';


        $data['title'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('generic/admin', $output);
        $this->load->view('templates/footer');
    }

}
