<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Detailpanitiaulangan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('detailpanitiaulangan_m', 'primaryModel');
    }
    public $titles = 'Anggota Panitia Ulangan/Ujian';
    public $vn = 'detailpanitiaulangan';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    function add()
    {
        $data['pegawai'] = $this->primaryModel->getAllDataPegawai();
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {

        $this->primaryModel->save();
        redirect('admin/' . $this->vn);
    }

    function edit()
    {
        $data['pegawai'] = $this->primaryModel->getAllDataPegawai();
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
        redirect('admin/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('admin/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('gambar');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
