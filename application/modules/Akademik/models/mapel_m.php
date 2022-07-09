<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mapel_m extends CI_Model
{

    public $namaTable = 'mata_pelajaran';
    public $pk = 'kodeMapel';

    public function getAllData()
    {
        $this->db->select('mata_pelajaran.*, kelompok_mapel.namaKelompokMapel as namaKelompokMapel');
        $this->db->select('mata_pelajaran.*, guru.namaGuru as namaGuru');
        $this->db->join('kelompok_mapel', 'kelompok_mapel.idKelompokMapel = mata_pelajaran.idKelompokMapel', 'left');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    public function getMapel()
    {
        return $this->db->get('kelompok_mapel')->result();
    }

    public function getGuru()
    {
        return $this->db->get('guru')->result();
    }

    public function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    public function save()
    {
        $object = [

            'kodeMapel' => htmlspecialchars($this->input->post('kodeMapel', TRUE)),
            'idKelompokMapel' => htmlspecialchars($this->input->post('idKelompokMapel', TRUE)),
            'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
            'namaMapel' => htmlspecialchars($this->input->post('namaMapel', TRUE)),
            'jumlahJam' => htmlspecialchars($this->input->post('jumlahJam', TRUE)),
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE))

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [

            'kodeMapel' => htmlspecialchars($this->input->post('kodeMapel', TRUE)),
            'idKelompokMapel' => htmlspecialchars($this->input->post('idKelompokMapel', TRUE)),
            'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
            'namaMapel' => htmlspecialchars($this->input->post('namaMapel', TRUE)),
            'jumlahJam' => htmlspecialchars($this->input->post('jumlahJam', TRUE)),
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE))

        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
