<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->database();
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->library('session');
        $this->load->library('form_validation');

        //$this->load->library('grocery_CRUD');
    }

    public function index()
    {
        $this->load->view('login/index');
    }

    public function log()
    {
        $this->load->helper('form');
        

        $data['title'] = '';

        $this->form_validation->set_rules('input_username', 'Username', 'required');
        $this->form_validation->set_rules('input_password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            /*
                Mancanza campi ritorno alla pagina login
            */

            //$this->load->view('templates/header', $data);
            $this->load->view('login/index');
            //$this->load->view('templates/footer');
        } else {
            $input_data = array(
                'username' => $this->input->post('input_username'),
                'password' => $this->input->post('input_password')
            );
            $result = $this->login_model->do_login($input_data);
            if ($result == TRUE) {
                $result = $this->login_model->read_user_information($input_data);
                $session_data = array(
                    'username' => $result[0]->username,
                    'livello' => $result[0]->livello,
                );
                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);

                $this->load->view('templates/header', $data);
                $this->load->view('pages/main_menu');
                $this->load->view('templates/footer');
            } else {
                //$this->load->view('templates/header', $data);
                $this->load->view('login/index');
                //$this->load->view('templates/footer');
            }
        }
    }

    public function logout()
    {
        // Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['title'] = 'Logout effettuato';
        $this->load->view('login/index', $data);
    }
}