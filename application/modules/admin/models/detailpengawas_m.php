<?php

defined('BASEPATH') or exit('No direct script access allowed');

class detailpengawas_m extends CI_Model
{

    public $namaTable = 'detailPengawas';
    public $pk = 'idDetailPengawas';

    function getAllData()
    {
        $this->db->where('idPengawas', $this->session->userdata('idPengawas'));
        $this->db->join('pegawai', 'pegawai.idPegawai = detailpengawas.idPegawai', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idPengawas' => $this->session->userdata('idPengawas'),
            'idPegawai' => $this->input->post('idPegawai'),
            'honor' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->session->userdata('jenisDana'),
            'tanggal' => date('Y-m-d'),
        ];
        $object2 = [
            'idTahunAjaran' => $this->session->userdata('idta'),
            'fk' => $this->session->userdata('idPengawas'),
            'idPegawai' => $this->input->post('idPegawai'),
            'keterangan' => get_ket('pengawas', 'idPengawas', $this->session->userdata('idPengawas')),
            'debit' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->session->userdata('jenisDana'),
        ];

        $this->db->insert('akuntan', $object2);
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'idPegawai' => $this->input->post('idPegawai'),
            'honor' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->input->post('jenisDana'),
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
