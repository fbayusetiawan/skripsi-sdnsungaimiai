<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan_m extends CI_Model
{

    function getDataAll()
    {
        $this->db->where('nisn', $this->session->userdata('nisn'));
        return $this->db->get('siswa')->row();
    }

    function setup()
    {
        $object = [
            'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
            'nidn' => htmlspecialchars($this->input->post('nidn', TRUE)),
            'homebase' => htmlspecialchars($this->input->post('homebase', TRUE)),
            'penempatan' => htmlspecialchars($this->input->post('penempatan', TRUE)),
            'noWa' => htmlspecialchars(str_replace('-', '', $this->input->post('noWa', TRUE))),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'kodeRumpun' => htmlspecialchars($this->input->post('kodeRumpun', TRUE)),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'kodeSubRumpun' => htmlspecialchars($this->input->post('kodeSubRumpun', TRUE)),
            'kodeBidangIlmu' => htmlspecialchars($this->input->post('kodeBidangIlmu', TRUE)),
            'validate' => '1'
        ];
        $this->db->where('nik', $this->session->userdata('nik'));
        $this->db->update('pegawai', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> <center>Selamat Akun Anda Siap digunakan. <br> buka laman <a target="_blank" href="https://lppm.unism.ac.id">lppm.unism.ac.id</a> untuk mendapatkan informasi terupdate LPPM <br> Jangan lupa Follow juga Instagram LPPM di <a target="_blank" href="https://www.instagram.com/lppmunism/">@lppmunism</a></center></div>');
    }
}

/* End of file Pengaturan_m.php */
