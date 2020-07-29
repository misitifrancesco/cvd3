<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persona extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function admin() {


        //print_r($this->db->list_tables());

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('t_persona');
        //$crud->where("livello<")
        $crud->columns('nome', 'cognome', 'responsabile');

        $crud->display_as('id_gruppo', 'Gruppo');
        $crud->display_as('id_fascia', 'Fascia');
        //$crud->set_subject('Persona');
        $crud->set_relation('id_gruppo', 't_gruppo', 'descrizione');
        $crud->set_relation('id_fascia', 't_fasciaeta', 'descrizione');

        $crud->callback_add_field('responsabile', function () {
            return retrieveSelectResponsabili();
        });
        $crud->callback_edit_field('responsabile', function () {
            return retrieveSelectResponsabili();
        });

        $crud->field_type('username', 'hidden');
        $crud->field_type('password', 'hidden');
        $crud->field_type('livello', 'hidden');

        $output = $crud->render();

        $output->mio_parametro = 'Footer della pagina Persona';
        $data['title'] = '';
        $this->load->view('templates/header', $data);
        $this->load->view('generic/admin', $output);
        $this->load->view('templates/footer');
        //die();
    }

}

function retrieveSelectResponsabili() {
    $str_res = '<select class="chosen-select" name="responsabile">';
    $str_res .= '<option value="N">NO</option>';
    $str_res .= '<option value="S">SI</option>';
    $str_res .= '</select>';
    return $str_res;
}
