<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function Index()
    {

        $this->session->unset_userdata('nis');
        $this->session->unset_userdata('namaLengkap');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Telah Logout!</div>');
        redirect(base_url());
    }
}

/* End of file Logout.php */
