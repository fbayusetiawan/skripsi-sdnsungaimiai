<?php

defined('BASEPATH') or exit('No direct script access allowed');

class detailpanitiaulangan_m extends CI_Model
{

    public $namaTable = 'detailpanitiaulangan';
    public $pk = 'idDetailPanitiaUlangan';

    function getAllData()
    {
        $this->db->where('idPanitiaUlangan', $this->session->userdata('idPanitiaUlangan'));
        $this->db->join('pegawai', 'pegawai.idPegawai = detailpanitiaulangan.idPegawai', 'left');
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
            'idPanitiaUlangan' => $this->session->userdata('idPanitiaUlangan'),
            'idPegawai' => $this->input->post('idPegawai'),
            'sebagai' => $this->input->post('sebagai'),
            'honor' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->session->userdata('jenisDana'),
            'tanggal' => date('Y-m-d'),
        ];
        $object2 = [
            'idTahunAjaran' => $this->session->userdata('idta'),
            'fk' => $this->session->userdata('idPanitiaUlangan'),
            'idPegawai' => $this->input->post('idPegawai'),
            'keterangan' => get_ket('panitiaulangan', 'idPanitiaUlangan', $this->session->userdata('idPanitiaUlangan')),
            'debit' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->session->userdata('jenisDana'),
        ];

        $this->db->insert($this->namaTable, $object);
        $this->db->insert('akuntan', $object2);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'idPegawai' => $this->input->post('idPegawai'),
            'sebagai' => $this->input->post('sebagai'),
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
