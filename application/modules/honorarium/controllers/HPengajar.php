<?php

defined('BASEPATH') or exit('No direct script access allowed');

class HPengajar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('hpengajar_m', 'primaryModel');
    }
    public $titles = 'Honor Pengajar';
    public $vn = 'hpengajar';

    public function index()
    {
        $id = $this->uri->segment(2);
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllData($id);

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
        redirect('honorarium/' . $this->vn . '/detail');
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
        redirect('honorarium/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->delete($id);
        redirect('honorarium/' . $this->vn);
    }

    function goDetail()
    {

        $array = array(
            'idHonorarium' => $this->uri->segment(4)
        );

        $this->session->set_userdata($array);

        redirect('honorarium/' . $this->vn . '/detail');
    }

    function detail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->primaryModel->getAllDatas();

        $this->template->load('template', $this->vn . '/Dlist', $data);
    }

    function d_add()
    {
        $data['pegawai'] = $this->primaryModel->getAllDataGuru();
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $this->template->load('template', $this->vn . '/Dadd', $data);
    }

    function d_addAction()
    {

        $this->primaryModel->d_save();
        redirect('honorarium/' . $this->vn . '/detail');
    }

    function d_edit()
    {
        $data['pegawai'] = $this->primaryModel->getAllDataPegawai();
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->primaryModel->getDataByIds($id);
        $this->template->load('template', $this->vn . '/Dedit', $data);
    }

    function d_editAction()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->d_update($id);
        redirect('honorarium/' . $this->vn . '/detail');
    }

    function d_delete()
    {
        $id = $this->uri->segment(4);
        $this->primaryModel->d_delete($id);
        redirect('honorarium/' . $this->vn . '/detail');
    }
}

/* End of file */
