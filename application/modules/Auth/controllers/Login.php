<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
    }

    public function index()
    {
        $this->load->view('login/list');
    }

    public function logon()
    {

        $nis = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        // $user = $this->register_m->getByNik($nis);
        $user = $this->register_m->getById($nis);
        if ($user) :
            if ($user->isActive == 1) :
                if (password_verify($password, $user->password)) :
                    $data = [
                        'namaLengkap' => $user->namaLengkap,
                        'email' => $user->email,
                        'noWa' => $user->noWa,
                        'username' => $user->username,
                    ];
                    $this->session->set_userdata($data);
                    if ($user->roleId == 2) :
                        redirect(base_url($this->session->userdata('directLink')));
                    else :
                        redirect(base_url('admin/dashboard'));
                    endif;
                else :
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
                    redirect('Auth/login');
                endif;
            else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Akun Anda Belum Aktif!</div>');
                redirect('Auth/login');
            endif;
        else :
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
            redirect('Auth/login');
        endif;
    }
}

/* End of file Login.php */
