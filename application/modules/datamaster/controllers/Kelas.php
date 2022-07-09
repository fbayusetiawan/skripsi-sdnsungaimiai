<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kelas_m');
    }
    public $titles = 'Kelas';
    public $vn = 'kelas';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->kelas_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    function detail()
    {
        $data['title'] = 'Nama Siswa';
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $idKelas = $this->uri->segment(4);
        $data['data'] = $this->kelas_m->getSiswaKelas($idKelas);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function addAction()
    {
        $this->kelas_m->save();
        redirect('datamaster/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->kelas_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->kelas_m->update($id);
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->kelas_m->delete($id);
        redirect('datamaster/' . $this->vn);
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
