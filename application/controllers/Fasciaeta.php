<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Fasciaeta extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function admin() {

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('t_fasciaeta');
        //$crud->order_by('fascia', 'desc');
        $output = $crud->render();


        $output->mio_parametro = 'Footer della pagina Fasciaeta';
        $output->titolo_pagina = 'Gestione Fasce Età';

        $data['title'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('generic/admin', $output);
        $this->load->view('templates/footer');
    }

}
