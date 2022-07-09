<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pjasa_m extends CI_Model
{

    public $namaTable = 'p_jasa';
    public $pk = 'idJasa';

    function getAllData($Value)
    {
        $this->db->where('jenisPembayaran', $Value);
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = pembayaran.idTahunAjaran', 'left');
        return $this->db->get('pembayaran')->result();
    }

    function getAllDatas()
    {
        $this->db->where('idPembayaran', $this->session->userdata('idPembayaran'));
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    function getDataById($Value)
    {
        $this->db->where('idPembayaran', $Value);
        return $this->db->get('pembayaran')->row();
    }

    function getDataByIds($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idPembayaran' => $this->input->post('uniq'),
            'idTahunAjaran' => $this->session->userdata('idta'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jenisPembayaran' => $this->input->post('jenisPembayaran'),
        ];

        $array = array(
            'idPembayaran' => $this->input->post('uniq'),
        );

        $this->session->set_userdata($array);
        $this->db->insert('pembayaran', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('idPembayaran', $Value);
        $this->db->update('pembayaran', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where('idPembayaran', $Value);
        $this->db->delete('pembayaran');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function d_save()
    {
        $object = [
            'idPembayaran' => $this->session->userdata('idPembayaran'),
            'namaJasa' => $this->input->post('namaJasa'),
            'biaya' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $object2 = [
            'idTahunAjaran' => $this->session->userdata('idta'),
            'fk' => $this->session->userdata('idPembayaran'),
            'keterangan' => $this->input->post('namaJasa'),
            'debit' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $this->db->insert('akuntan', $object2);
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function d_update($Value)
    {
        $object = [
            'namaJasa' => $this->input->post('namaJasa'),
            'biaya' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
    }

    function d_delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
