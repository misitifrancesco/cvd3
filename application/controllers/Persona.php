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
        $crud->display_as('id_gruppo','Gruppo');
        //$crud->set_subject('Persona');
        $crud->set_relation('id_gruppo','t_gruppo','descrizione');
        
        
        $output = $crud->render();
        
        
        $output->mio_parametro = 'Footer della pagina Persona'   ;
        
        
        $this->load->view('generic/admin', $output);
        //die();
    }

}
