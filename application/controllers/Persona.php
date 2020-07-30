<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Persona extends CI_Controller {

    public $dati_utente;

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');

        $this->load->library('grocery_CRUD');
    }

    public function admin() {

        $this->dati_utente = $this->session->userdata('cvd_logged_in');
        //print_r($this->db->list_tables());

        $crud = new grocery_CRUD();
        $crud->set_theme('datatables');
        $crud->set_table('t_persona');
        //$crud->where("livello<")







        if ($this->dati_utente['livello'] == '100') {
            
            $crud->display_as('id_gruppo', 'Gruppo');
            $crud->display_as('id_fascia', 'Fascia');
            $crud->set_relation('id_gruppo', 't_gruppo', 'descrizione');
            $crud->set_relation('id_fascia', 't_fasciaeta', 'descrizione');
            
            $crud->callback_add_field('responsabile', function () {
                return retrieveSelectResponsabili();
            });
            $crud->callback_edit_field('responsabile', function () {
                return retrieveSelectResponsabili();
            });
        } else {
            $crud->columns('nome', 'cognome', 'responsabile');
            $crud->add_fields('nome', 'cognome', 'data_nasc','id_gruppo','id_fascia');
            $crud->field_type('username', 'hidden');
            $crud->field_type('password', 'hidden');
            $crud->field_type('livello', 'hidden');
            $crud->field_type('responsabile', 'hidden');
            $crud->field_type('id_gruppo', 'hidden', $this->dati_utente['id_gruppo']);
            $crud->field_type('id_fascia', 'hidden', $this->dati_utente['id_fascia']);
            
            


            $crud->where("livello < '" . $this->dati_utente['livello'] . " ' and t_persona.id_gruppo = '" . $this->dati_utente['id_gruppo'] . "' and t_persona.id_fascia = '" . $this->dati_utente['id_fascia'] . "' ");

            /* $crud->callback_add_field('id_gruppo', function () {
              return '<input type="text" maxlength="50" value="'.$this->dati_utente['id_gruppo'].'" name="id_gruppo">';
              });
              $crud->callback_edit_field('id_gruppo', function () {
              return '<input type="text" maxlength="50" value="'.$this->dati_utente['id_gruppo'].'" name="id_gruppo">';
              });
              $crud->callback_add_field('id_fascia', function () {
              return '<input type="text" maxlength="50" value="'.$this->dati_utente['id_fascia'].'" name="id_fascia">';
              });
              $crud->callback_edit_field('id_fascia', function () {
              return '<input type="text" maxlength="50" value="'.$this->dati_utente['id_fascia'].'" name="id_fascia">';
              }); */
        }


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
