<?php

defined('BASEPATH') or exit('No direct script access allowed');

class register_m extends CI_Model
{

    public $table = "anggota";
    public $pk = "idRegister";

    public function getByNik($Value)
    {
        $this->db->where('nis', $Value);
        return $this->db->get($this->table)->row();
    }

    function getById($Value)
    {
        $this->db->where('username', $Value);
        return $this->db->get('users')->row();
    }


    public function insert()
    {
        $object = [
            'idRegister' => uniqid(),
            'nis' => $this->input->post('nis', TRUE),
            'noWa' => $this->input->post('noWa', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'time' => time(),
            'roleId' => '2',
            'isActive' => '0',
            'namaLengkap' => $this->input->post('namaLengkap', TRUE),
            'idJurusan' => $this->input->post('idJurusan', TRUE),
            'jk' => $this->input->post('jk', TRUE),
            // 'alamat' => $this->input->post('alamat', TRUE),
        ];

        $array = array(
            'nis' => $this->input->post('nis', TRUE),
        );

        $this->session->set_userdata($array);

        $this->db->insert($this->table, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Register Berhasil, Silakan Login!</div>');
    }
}

/* End of file user_m.php */
