<?php

defined('BASEPATH') or exit('No direct script access allowed');

class nilairapor_m extends CI_Model
{
    public $namaTable = 'nilai_pengetahuan';
    public $pk = 'idNilaiPengetahuan';

    public function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
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

    function getDataById($Value)
    {

        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getDataByKet($Value)
    {

        $this->db->where('idNilaiKeterampilan', $Value);
        return $this->db->get('nilai_keterampilan')->row();
    }
}

/* End of file */
