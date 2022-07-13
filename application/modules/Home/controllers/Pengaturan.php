<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pengaturan_m', 'primaryModel');
    }

    public function index()
    {
    }

    public function umum()
    {
        $data['title'] = "Pengaturan Umum";
        $data['pageTitle'] = "Pengaturan Umum";
        $data['row'] = $this->primaryModel->getDataAll();
        // $data['rumpun'] = $this->primaryModel->getRumpun();
        $this->template->load('home', 'pengaturan/edit', $data);
    }

    public function setup()
    {
        $data['title'] = "Setup Account";
        $data['pageTitle'] = "Setup Account";
        $data['row'] = $this->primaryModel->getDataAll();
        // $data['rumpun'] = $this->primaryModel->getRumpun();
        $this->template->load('home', 'pengaturan/setup', $data);
    }

    public function setup_action()
    {
        $this->primaryModel->setup();
        redirect('Home/Dashboard');
    }
}

/* End of file Pengaturan.php */
