<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_m extends CI_Model
{

    public $namaTable = 'jadwal_pelajaran';
    public $pk = 'kodeJadwal';

    public function getAllData()
    {

        $this->db->select('jadwal_pelajaran.*, mata_pelajaran.nip as nip, tahunajaran.tahunAjaran as tahunAjaran, kelas.namaKelas as namaKelas, mata_pelajaran.namaMapel as namaMapel');
        $this->db->select('mata_pelajaran.*, guru.namaGuru as namaGuru');

        // $this->db->join('mata_pelajaran', 'mata_pelajaran.nip = jadwal_pelajaran.nip', 'left');
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = jadwal_pelajaran.kodeJadwal', 'left');
        $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        // $this->db->join('hari', 'hari.namaHari = jadwal_pelajaran.namaHari', 'left');

        return $this->db->get($this->namaTable)->result();
    }
    public function getViia()
    {
        $sql = "SELECT * from jadwal_pelajaran where kodeKelas='VII.A'";
        return $this->db->query($sql)->result();
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

    public function getDataByIdSiswa($Value)
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');
        $this->db->where('idSiswa', $Value);
        return $this->db->get('siswa')->row();
    }

    public function getDataById($Value)
    {
        $this->db->where('idSiswa', $Value);
        return $this->db->get('siswa')->row();
    }

    function update($Value)
    {
        $object = [


            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'namaSiswa' => $this->input->post('namaSiswa'),
            'jk' => $this->input->post('jk'),
            'tempatLahir' => $this->input->post('tempatLahir'),
            'tanggalLahir' => $this->input->post('tanggalLahir'),
            'statusKeluarga' => $this->input->post('statusKeluarga'),
            'anakKe' => $this->input->post('anakKe'),
            'agama' => $this->input->post('agama'),
            'alamat' => $this->input->post('alamat'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw'),
            'kelurahan' => $this->input->post('kelurahan'),
            'kecamatan' => $this->input->post('kecamatan'),
            'kabupaten' => $this->input->post('kabupaten'),
            'noTelp' => $this->input->post('noTelp'),
            'asalSd' => $this->input->post('asalSd'),

            'angkatan' => $this->input->post('angkatan'),
            'roleId' => '3',

        ];

        $this->db->where('idSiswa', $Value);
        $this->db->update('siswa', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function update1($Value)
    {
        $object = [

            'namaAyah' => $this->input->post('namaAyah'),
            'pekerjaanAyah' => $this->input->post('pekerjaanAyah'),
            'alamatAyah' => $this->input->post('alamatAyah'),
            'noHpAyah' => $this->input->post('noHpAyah'),
            'namaIbu' => $this->input->post('namaIbu'),
            'pekerjaanIbu' => $this->input->post('pekerjaanIbu'),
            'alamatIbu' => $this->input->post('alamatIbu'),
            'noHpIbu' => $this->input->post('noHpIbu'),
            'namaWali' => $this->input->post('namaWali'),
            'alamatWali' => $this->input->post('alamatWali'),
            'noHpWali' => $this->input->post('noHpWali'),
            'dateCreated' => time()

        ];
        $this->db->where('idSiswa', $Value);
        $this->db->update('siswa', $object);
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
