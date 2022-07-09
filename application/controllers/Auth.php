<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->user->getByEmail($email)->row_array();
        if ($user) {
            if ($user['isActive'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'roleId' => $user['roleId'],
                        'id' => $user['id'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['roleId'] == 1) {
                        redirect('admin/transaksicetak');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email anda belum di aktivasi!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Login!, Email atau Password Salah!</div>');
            redirect('Auth');
        }
    }

    public function register()
    {
        // $this->form_validation->set_rules('npm', 'NPM', 'trim|required|is_unique[user.id]|min_length[8]|max_length[8]|is_unique[mahasiswa.npm]');
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Re-password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/register');
        } else {

            $this->user->save();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan, Silahkan Login!</div>');
            redirect('Auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('roleId');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Beerhasil Logout!</div>');
        redirect('Auth');
    }
}

/* End of file Auth.php */
