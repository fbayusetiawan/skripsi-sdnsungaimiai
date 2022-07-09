<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetakrapor_m extends CI_Model
{

    public $namaTable = 'siswa';
    public $pk = 'idSiswa';

    public function getAllData()
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    public function getCapaianBelajar($Value)
    {
        $this->db->where('nisn', $Value);
        return $this->db->get('nilai_capaianbelajar')->row();
    }

    public function getSekolah()
    {
        return $this->db->get('identitas_sekolah')->result();
    }

    public function getSiswa($KodeJadwal)
    {
        $dataJadwal = $this->getDataJadwalById($KodeJadwal);
        $this->db->where('kodeKelas', $dataJadwal->kodeKelas);
        return $this->db->get('siswa')->result();
    }

    public function getMapel()
    {
        // return $this->db->get('mata_pelajaran')->result();
        return $this->db->get('jadwal_pelajaran')->result();
    }

    //untuk memanggil datat jadwal Pelajaran sesuai ID nya
    function getDataJadwalById($Value)
    {
        $this->db->where('kodeJadwal', $Value);
        $data = $this->db->get('jadwal_pelajaran')->row();

        $this->db->where('kodeKelas',  $data->kodeKelas);
        return  $this->db->get('kelas')->row();
    }

    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }

    public function getKepsek()
    {
        $this->db->where('tugasTambahan', 'Kepala Sekolah');

        return $this->db->get('guru')->row();
    }

    public function getDataById($Value)
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');
        $this->db->where('nisn', $Value);
        return $this->db->get($this->namaTable)->row();
    }
}

/* End of file */
