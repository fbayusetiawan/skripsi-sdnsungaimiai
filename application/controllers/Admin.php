<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('User_model', 'user');
    }


    public function index()
    {
        // $email = $this->session->userdata('email');
        // $data['user'] = $this->user->getByEmail($email)->row_array();
        $data['title'] = "My Profile";
        $data['pageTitle'] = "Dashboard";

        $this->template->load('template', 'admin/dashboard/list', $data);
    }
}

/* End of file Admin.php */
/* Hak Cipta Muhammad Nazmi Ramdhan */
/* Tidak Untuk Di Perjual Belikan */
/* Aplikasi Ini di Buat Untuk Memenuhi Syarat Kelulusan Sarjana TI Uniska */
