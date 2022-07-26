<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_m', 'primaryModel');
    }

    // public function index()
    // {

    //     $this->load->view('home/list', $data);
    // }

    public $vn = 'home';

    public function index()
    {
        $data['data'] = $this->primaryModel->getAllBerita();
        $this->template->load('hometemplate', $this->vn . '/home', $data);
    }

    public function detail()
    {
        $data['row'] =  $this->primaryModel->getBeritaById($this->uri->segment(4));
        $this->template->load('hometemplate', $this->vn . '/detail', $data);
    }
}

/* End of file Login.php */
