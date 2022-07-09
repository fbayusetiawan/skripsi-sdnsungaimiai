<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pelatih extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelatih_m', 'primaryModel');
    }
    public $titles = 'Pelatih EkstraKulikuler';
    public $vn = 'pelatih';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {
        $this->primaryModel->save();
        redirect('datamaster/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataById($id);

        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {

        $id = $this->uri->segment(4);
        $this->primaryModel->update($id);
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('datamaster/' . $this->vn);
    }
}

/* End of file */
