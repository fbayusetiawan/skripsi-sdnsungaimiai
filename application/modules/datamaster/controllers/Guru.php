<?php

defined('BASEPATH') or exit('No direct script access allowed');

class guru extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('guru_m');
        $this->load->library('form_validation');
    }

    public $titles = 'Guru';
    public $vn = 'guru';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->guru_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['ptk'] = $this->guru_m->getPtk();
        $data['jnsptk'] = $this->guru_m->getAllPtk();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->guru_m->getDataById($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {
        $this->guru_m->save($this->upload_foto());
        redirect('datamaster/' . $this->vn);
    }
    function addActionPtk()
    {
        $this->guru_m->savePtk();
        redirect('datamaster/' . $this->vn . '/add');
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->guru_m->getDataById($id);
        $data['ptk'] = $this->guru_m->getPtk();

        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->guru_m->update($id);
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->guru_m->delete($id);
        redirect('datamaster/' . $this->vn);
    }

    function deletePtk()
    {
        $id = $this->uri->segment(4);
        $this->guru_m->deletePtk($id);
        redirect('datamaster/' . $this->vn . '/add');
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
