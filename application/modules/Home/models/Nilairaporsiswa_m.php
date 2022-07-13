<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilairaporsiswa_m extends CI_Model
{

    public $namaTable = 'jadwal_pelajaran';
    public $pk = 'kodeJadwal';

    public function getAllData()
    {

        $this->db->select('jadwal_pelajaran.*, mata_pelajaran.nip as nip, tahun_akademik.namaTahun as namaTahun, kelas.namaKelas as namaKelas, mata_pelajaran.namaMapel as namaMapel, hari.namaHari as namaHari');
        $this->db->select('mata_pelajaran.*, guru.namaGuru as namaGuru');

        // $this->db->join('mata_pelajaran', 'mata_pelajaran.nip = jadwal_pelajaran.nip', 'left');
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = jadwal_pelajaran.kodeJadwal', 'left');
        $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        $this->db->join('hari', 'hari.namaHari = jadwal_pelajaran.namaHari', 'left');

        return $this->db->get($this->namaTable)->result();
    }
    public function getViia()
    {
        $sql = "SELECT * from jadwal_pelajaran where kodeKelas='VII.A'";
        return $this->db->query($sql)->result();
    }

    public function getNilaiById()
    {
        $this->db->select('*');
        $this->db->from('nilai_pengetahuan');
        $this->db->join('jadwal_pelajaran', 'nilai_pengetahuan.kodeJadwal = jadwal_pelajaran.kodeJadwal', 'LEFT');
        $this->db->join('mata_pelajaran', 'jadwal_pelajaran.kodeMapel =mata_pelajaran.kodeMapel', 'LEFT');
        $query = $this->db->get();
        return $query;
    }

    public function getTahun()
    {
        return $this->db->get('tahun_akademik')->result();
    }
    public function getMapel()
    {
        $this->db->select('mata_pelajaran.*, guru.namaGuru as namaGuru');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        return $this->db->get('mata_pelajaran')->result();
    }

    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }

    public function getHari()
    {
        return $this->db->get('hari')->result();
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

            'kodeJadwal' => uniqid(),
            'kodeTahun' => htmlspecialchars($this->input->post('kodeTahun', TRUE)),
            'kodeKelas' => htmlspecialchars($this->input->post('kodeKelas', TRUE)),
            'kodeMapel' => htmlspecialchars($this->input->post('kodeMapel', TRUE)),
            'namaHari' => htmlspecialchars($this->input->post('namaHari', TRUE)),
            'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
            'jamMulai' => htmlspecialchars($this->input->post('jamMulai', TRUE)),
            'jamSelesai' => htmlspecialchars($this->input->post('jamSelesai', TRUE))

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [

            'kodeJadwal' => uniqid(),
            'kodeTahun' => htmlspecialchars($this->input->post('kodeTahun', TRUE)),
            'kodeKelas' => htmlspecialchars($this->input->post('kodeKelas', TRUE)),
            'kodeMapel' => htmlspecialchars($this->input->post('kodeMapel', TRUE)),
            'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
            'jamMulai' => htmlspecialchars($this->input->post('jamMulai', TRUE)),
            'namaHari' => htmlspecialchars($this->input->post('namaHari', TRUE)),
            'jamSelesai' => htmlspecialchars($this->input->post('jamSelesai', TRUE))

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
