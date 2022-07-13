<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{

    public $table = "register";
    public $pk = "idRegister";

    public function getByNisn($Value)
    {
        $this->db->where('nisn', $Value);
        return $this->db->get('siswa')->row();
    }

    public function getByUser($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get('users')->row();
    }

    public function insert()
    {
        $object = [
            'nik' => $this->input->post('nik', TRUE),
            'noWa' => $this->input->post('noWa', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'time' => time(),
            'roleId' => '3',
            'isActive' => '0'
        ];

        $array = array(
            'nik' => $this->input->post('nik', TRUE),
        );

        $this->session->set_userdata($array);

        $this->db->insert($this->table, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil, Silakan Login!</div>');
    }
}

/* End of file user_m.php */
