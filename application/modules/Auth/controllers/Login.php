<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('register_m');
        $this->load->model('Login_m');
    }

    public function index()
    {
        $this->load->view('login/list');
    }

    public function logon()
    {

        $nis = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);
        // $nisn = $this->input->post('nisn', TRUE);
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
                    if ($user->roleId == 3) :
                        redirect(base_url($this->session->userdata('Home/Dashboard')));
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

    public function logonin()
    {
        $nisn = $this->input->post('nisn', TRUE);
        $nis = $this->input->post('username', TRUE);
        $password = $this->input->post('password', TRUE);

        if (!empty($this->Login_m->getByNisn($nisn))) :
            $user = $this->Login_m->getByNisn($nisn);
        else :
            $user = $this->Login_m->getByUser($nis);
        endif;
        if ($user) :
            if ($user->isActive == 1) :
                if (password_verify($password, $user->password)) :
                    if (!empty($user->nisn)) :
                        $data = [
                            'nisn' => $user->nisn,
                            'namaSiswa' => $user->nama,
                            'roleId' => $user->roleId,
                        ];
                    elseif (!empty($user->nisn)) :
                        $data = [
                            'nisn' => $user->nisn,
                            'namaSiswa' => $user->nama,
                            'roleId' => $user->roleId,
                        ];
                    elseif (!empty($user->username)) :
                        $data = [
                            'namaLengkap' => $user->namaLengkap,
                            'email' => $user->email,
                            'noWa' => $user->noWa,
                            'username' => $user->username,
                        ];
                    endif;
                    $this->session->set_userdata($data);
                    if ($user->roleId == 1) :
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat Datang, ' . $user->namaLengkap . '</div>');
                        redirect('Admin/Dashboard'); //Superadmin
                    elseif ($user->roleId == 2) :
                        redirect('Home/Dashboard'); //Guru
                    else :
                        redirect('Home/Dashboard'); //Siswa
                    endif;
                else :
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Username atau Password Salah!</div>');
                    redirect('Auth/login');
                endif;
            else :
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Akun Anda Belum Aktif!</div>');
                redirect('Auth/login');
            endif;
        else :
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Akun Tidak Ditemukan!</div>');
            redirect('Auth/login');
        endif;
    }
}

/* End of file Login.php */
