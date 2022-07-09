<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public $id = "email";

    public function getByEmail($email = null)
    {
        $this->db->from('user');
        // $this->db->join('karyawan', 'karyawan.idKaryawan = user.idKaryawan', 'left');

        if ($email != null) {
            $this->db->where($this->id, $email);
        }
        $query = $this->db->get();
        return $query;
    }

    function getDataAll()
    {
        // $this->db->join('karyawan', 'karyawan.idKaryawan = user.idKaryawan', 'left');
        // $this->db->join('toko', 'toko.idToko = user.idToko', 'left');
        return $this->db->get('user')->result();
    }

    function getDataById($id)
    {
        $this->db->where('id', $id);
        // $this->db->join('karyawan', 'karyawan.idKaryawan = user.idKaryawan', 'left');
        // $this->db->join('toko', 'toko.idToko = user.idToko', 'left');
        return $this->db->get('user')->row();
    }

    public function save()
    {
        $data = [
            'idKaryawan' => $this->input->post('idKaryawan', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'roleId' => $this->input->post('roleId', TRUE),
            'isActive' => $this->input->post('isActive', TRUE),
            'idToko' => $this->input->post('idToko', TRUE),
            'dateCreated' => time()
        ];
        $this->db->insert('user', $data);
    }

    public function update($Value)
    {
        $object = [
            'idKaryawan' => $this->input->post('idKaryawan', TRUE),
            'email' => $this->input->post('email', TRUE),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'image' => 'default.jpg',
            'roleId' => $this->input->post('roleId', TRUE),
            'isActive' => $this->input->post('isActive', TRUE),
            'idToko' => $this->input->post('idToko', TRUE),
            'dateCreated' => time()
        ];
        $this->db->where('id', $Value);
        $this->db->update('user', $object);
    }

    function hapus($Value)
    {
        $this->db->where('id', $Value);
        $this->db->delete('user');
    }
}

/* End of file User_model.php */
