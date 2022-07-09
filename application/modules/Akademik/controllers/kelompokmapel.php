<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kelompokmapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelompokmapel_m');
        $this->load->library('form_validation');
    }

    public $titles = 'Kelompok Mata Pelajaran';
    public $vn = 'kelompokmapel';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->kelompokmapel_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->kelompokmapel_m->getDataById($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {
        $this->kelompokmapel_m->save();
        redirect('akademik/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->kelompokmapel_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->kelompokmapel_m->update($id);
        redirect('akademik/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->kelompokmapel_m->delete($id);
        redirect('akademik/' . $this->vn);
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
