<?php
header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire'); // works

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documenti extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->library('grocery_CRUD');
        

    }

    public function admin()
    {

        $crud = new grocery_CRUD();
        $session = $this->session->userdata('cvd_logged_in');
        //print_r($session);


        $crud->set_theme('datatables');
        $crud->set_table('t_documento');

        /*
        if ($session['id_fascia'] == '2') {
            $crud->unset_delete();
        }
        */

        //$crud->where(" id_fascia = '".$session['id_fascia']."'");

        $crud->set_relation('id_tipodoc', 't_tipodoc', 'descrizione');
        $crud->set_relation('id_doc_livello', 't_doc_livello', 'descrizione');
        $crud->display_as('id_tipodoc', 'Tipo documento');
        $crud->display_as('id_doc_livello', 'Livello Documento');

        $crud->required_fields('tipo');
        $crud->required_fields('descrizione');
        $crud->required_fields('nome_file');
        

        $crud->set_field_upload('nome_file', 'assets/uploads/files');

        $crud->field_type('id_fascia', 'hidden', $session['id_fascia']);
        $crud->field_type('id_gruppo', 'hidden', $session['id_gruppo']);
        $crud->field_type('id_utente', 'hidden', $session['id_utente']);

        $crud->columns(['descrizione', 'nome_file', 'id_tipodoc', 'data_doc', 'id_doc_livello']);


        $crud->callback_before_delete(array($this, 'log_user_before_delete'));

        $output = $crud->render();





        $output->titolo_pagina = 'Gestione documenti';
        $output->mio_parametro = 'Footer della pagina documenti';


        $data['title'] = '';

        $this->load->view('templates/header', $data);
        $this->load->view('generic/admin', $output);
        $this->load->view('templates/footer');
    }

    public function log_user_before_delete($primary_key)
    {
        $session = $this->session->userdata('cvd_logged_in');
        
            
        $this->db->where('id_documento',$primary_key);
        $documento = $this->db->get('t_documento')->row();

        $this->db->insert('user_logs',array(
            'user_id' => $primary_key,
            'testo' => 'eliminazione documento con id:' . $documento->id_fascia
        ));

        
        
        if($documento->id_fascia == '2'){

        }
        else{
            exit();
        }
        
        
        


    }
}
