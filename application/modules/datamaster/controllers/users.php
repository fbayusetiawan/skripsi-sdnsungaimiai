<?php

defined('BASEPATH') or exit('No direct script access allowed');

class users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('users_m');
    }
    public $titles = 'Users';
    public $vn = 'users';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->users_m->getAllData();

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
        $foto = $this->upload_foto();
        $this->users_m->save($foto);
        redirect('datamaster/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->users_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $foto = $this->upload_foto();
        $id = $this->uri->segment(4);
        $this->users_m->update($id, $foto);
        redirect('datamaster/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->users_m->delete($id);
        redirect('datamaster/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/images/profiles/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 10240; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function cekUser()
    {
        $user = $_GET['user'];
        $this->db->where('username', $user);
        $a = $this->db->get('users')->row();
        if (empty($a->username)) {
            echo "<span class='text-success'>Tersedia</span>";
        } else {
            echo "<span class='text-danger'>Tidak Tersedia</span>";
        }
    }
}

/* End of file */
