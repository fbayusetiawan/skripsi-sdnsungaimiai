<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pegawai_m extends CI_Model
{

    public $namaTable = 'pegawai';
    public $pk = 'idPegawai';

    function getAllData()
    {

        $this->db->join('golongan', 'golongan.idGol = pegawai.idGolongan', 'left');
        $this->db->join('pangkat', 'pangkat.idPangkat = pegawai.idPangkat', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idPegawai' => uniqid(),
            'namaLengkap' => $this->input->post('namaLengkap'),
            'nip' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'email' => $this->input->post('email'),
            'noWa' => $this->input->post('noWa'),
            'status' => $this->input->post('status'),
            'idPangkat' => $this->input->post('pangkat'),
            'idGolongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),

        ];

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'namaLengkap' => $this->input->post('namaLengkap'),
            'nip' => $this->input->post('nip'),
            'jk' => $this->input->post('jk'),
            'email' => $this->input->post('email'),
            'noWa' => $this->input->post('noWa'),
            'status' => $this->input->post('status'),
            'idPangkat' => $this->input->post('pangkat'),
            'idGolongan' => $this->input->post('golongan'),
            'jabatan' => $this->input->post('jabatan'),
            'alamat' => $this->input->post('alamat'),
            'agama' => $this->input->post('agama'),

        ];

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
