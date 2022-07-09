<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ekstrakulikuler_m extends CI_Model
{
    public $namaTable = 'nilai_uts';
    public $pk = 'idNilaiUts';

    public function getAllData()
    {
        return $this->db->get('siswa')->result();
    }

    public function getSiswa($KodeJadwal)
    {
        $dataJadwal = $this->getDataSiswaById($KodeJadwal);
        $this->db->where('idKelas', $dataJadwal->idKelas);
        return $this->db->get('siswa')->result();
    }

    public function getMapel()
    {
        // return $this->db->get('mata_pelajaran')->result();
        return $this->db->get('jadwal_pelajaran')->result();
    }

    //untuk memanggil datat jadwal Pelajaran sesuai ID nya
    function getDataSiswaById($Value)
    {
        $this->db->where('idKelas', $Value);
        $data = $this->db->get('siswa')->row();

        $this->db->where('kodeKelas',  $data->kodeKelas);
        return  $this->db->get('kelas')->row();
    }

    function getDataById($Value)
    {

        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function ok($id)
    {
        $object = [

            'idAbsenSiswa' => uniqid(),
            'waktu' => time()

        ];

        $a = $this->input->post('kehadiran');
        $b = $this->input->post('tanggal');


        foreach ($b as $kehadiran) {
            if (!empty($kehadiran)) {
                $where = [
                    'kodeJadwal' => $id,
                    'kehadiran' => $a
                ];
                $kd = ['kehadiran' => $kehadiran];
                $this->Mcrud->update($this->namaTable, $kd, $where, $object);
            }
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Absen Berhasil Disimpan</div>');
    }

    public function save()
    {
        $object = [

            'idAbsenSiswa' => uniqid(),

            'kehadiran' => $this->input->post('kehadiran'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => time()

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [

            'idAbsenSiswa' => uniqid(),
            'kodeJadwal' => $this->input->post('kodeJadwal'),
            'nisn' => $this->input->post('nisn'),
            'kehadiran' => $this->input->post('kehadiran'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu')

        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }
}

/* End of file */
