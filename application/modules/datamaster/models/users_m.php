<?php

defined('BASEPATH') or exit('No direct script access allowed');

class users_m extends CI_Model
{

    public $namaTable = 'users';
    public $pk = 'idUsers';

    function getAllData()
    {
        // $this->db->join('role', 'role.roleId = users.roleId', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }


    function save($foto)
    {
        $object = [
            'idUsers' => uniqid(),
            'namaLengkap' => $this->input->post('namaLengkap'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'roleId' => '0',
            'isActive' => $this->input->post('isActive'),
            'noWa' => $this->input->post('noWa'),
            'foto' => $foto,
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        if (empty($foto)) :
            if (empty($this->input->post('password'))) :
                $object = [
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'isActive' => $this->input->post('isActive'),
                    'noWa' => $this->input->post('noWa'),
                ];
            else :
                $object = [
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'isActive' => $this->input->post('isActive'),
                    'noWa' => $this->input->post('noWa'),
                ];
            endif;
        else :
            if (empty($this->input->post('password'))) :
                $object = [
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'isActive' => $this->input->post('isActive'),
                    'noWa' => $this->input->post('noWa'),
                    'foto' => $foto,
                ];
            else :
                $object = [
                    'namaLengkap' => $this->input->post('namaLengkap'),
                    'username' => $this->input->post('username'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'isActive' => $this->input->post('isActive'),
                    'noWa' => $this->input->post('noWa'),
                    'foto' => $foto,
                ];
            endif;
        endif;
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
