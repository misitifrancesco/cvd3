<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Presenze extends CI_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('presenze_model');

        //$this->load->library('grocery_CRUD');
    }

    public function index() {
        $this->load->view('presenze/index');
    }

}
