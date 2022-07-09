<?php

defined('BASEPATH') or exit('No direct script access allowed');

class error404 extends CI_Controller
{

    public function index()
    {
        $this->load->view('error404');
    }
}

/* End of file error404.php */
