<?php

defined('BASEPATH') or exit('No direct script access allowed');

class register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
    }


    public function index()
    {
        $this->load->view('register/add');
    }

    public function add_action()
    {
        $this->register_m->insert();
        redirect('auth/login');
    }
}

/* End of file register.php */
