<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documenti extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function admin() {

        $crud = new grocery_CRUD();

        $crud->set_theme('datatables');
        $crud->set_table('t_documento');
        //$crud->where("tipo='COCE'");

        $crud->set_relation('id_tipodoc', 't_tipodoc', 'descrizione');
        $crud->display_as('id_tipodoc', 'Tipo documento');
        //$crud->set_subject('Employee');

        $crud->required_fields('tipo');
        $crud->required_fields('descrizione');
        $crud->required_fields('nome_file');

        $crud->set_field_upload('nome_file', 'assets/uploads/files');

        $output = $crud->render();




        $output->mio_parametro = 'Footer della pagina documenti';


        $data['title'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('generic/admin', $output);
        $this->load->view('templates/footer');
    }

}
