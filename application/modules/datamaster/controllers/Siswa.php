<?php

defined('BASEPATH') or exit('No direct script access allowed');

class siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('siswa_m');
        $this->load->library('form_validation');
    }

    public $titles = 'Siswa';
    public $vn = 'siswa';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->siswa_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['kelas'] = $this->siswa_m->getKelas();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->siswa_m->getDataById($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {
        $this->siswa_m->save($this->upload_foto());
        redirect('datamaster/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->siswa_m->getDataById($id);
        $data['kelas'] = $this->siswa_m->getKelas();
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->siswa_m->update($id, $this->upload_foto());
        redirect('datamaster/' . $this->vn);
    }

    function editAction1()
    {
        $id = $this->uri->segment(4);
        $this->siswa_m->update1($id);
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->siswa_m->delete($id);
        redirect('datamaster/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 5024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }
}

/* End of file */
