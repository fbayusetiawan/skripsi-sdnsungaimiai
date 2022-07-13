<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_m');
        $this->load->library('form_validation');
    }
    public $titles = 'Siswa';
    public $vn = 'Dashboard';

    public function index()
    {
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $cek = $this->db->get('siswa')->row();
        if ($cek->isActive == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['pageTitle'] = "Dashboard";
            $data['row'] = $cek;
            $data['mapel'] = $this->Dashboard_m->getMapel();
            $data['data'] = $this->Dashboard_m->getAllData();
            $this->template->load("home", "dashboard/list", $data);
        endif;
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;

        $id = $this->uri->segment(4);
        $data['row'] = $this->Dashboard_m->getDataByIdSiswa($id);
        $data['kelas'] = $this->Dashboard_m->getKelas();
        $this->template->load("home", "dashboard/edit", $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->Dashboard_m->update($id);
        redirect('Home/' . $this->vn);
    }

    function editAction1()
    {
        $id = $this->uri->segment(4);
        $this->Dashboard_m->update1($id);
        redirect('Home/' . $this->vn);
    }
}

/* End of file Dashboard.php */
