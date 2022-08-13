<?php

defined('BASEPATH') or exit('No direct script access allowed');

class siswa_m extends CI_Model
{

    public $namaTable = 'siswa';
    public $pk = 'idSiswa';

    public function getAllData()
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    public function getKelas()
    {
        return $this->db->get('kelas')->result();
    }

    public function getDataById($Value)
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    public function save($foto)
    {
        $object = [
            'idSiswa' => uniqid(),
            'nisn' => $this->input->post('nisn'),
            'nis' => $this->input->post('nis'),
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
            'asalTk' => $this->input->post('asalTk'),
            'foto' => $foto,
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
            'angkatan' => $this->input->post('angkatan'),
            'isActive' => $this->input->post('isActive'),
            'roleId' => '3',
            'kodeKelas' => $this->input->post('kodeKelas'),
            'dateCreated' => time()

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        if (empty($foto)) {
            $object = [
                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'namaSiswa' => $this->input->post('namaSiswa'),
                'jk' => $this->input->post('jk'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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
                'asalTk' => $this->input->post('asalTk'),
                'angkatan' => $this->input->post('angkatan'),
                'isActive' => $this->input->post('isActive'),
                'kodeKelas' => $this->input->post('kodeKelas'),
            ];
        } else {
            $object = [

                'nisn' => $this->input->post('nisn'),
                'nis' => $this->input->post('nis'),
                'namaSiswa' => $this->input->post('namaSiswa'),
                'jk' => $this->input->post('jk'),
                'tempatLahir' => $this->input->post('tempatLahir'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
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
                'asalTk' => $this->input->post('asalTk'),
                'angkatan' => $this->input->post('angkatan'),
                'isActive' => $this->input->post('isActive'),
                'kodeKelas' => $this->input->post('kodeKelas'),
                'foto' => $foto,

            ];
        }
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    // function update($Value)
    // {
    //     $object = [

    //         'nisn' => $this->input->post('nisn'),
    //         'nis' => $this->input->post('nis'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
    //         'namaSiswa' => $this->input->post('namaSiswa'),
    //         'jk' => $this->input->post('jk'),
    //         'tempatLahir' => $this->input->post('tempatLahir'),
    //         'tanggalLahir' => $this->input->post('tanggalLahir'),
    //         'statusKeluarga' => $this->input->post('statusKeluarga'),
    //         'anakKe' => $this->input->post('anakKe'),
    //         'agama' => $this->input->post('agama'),
    //         'alamat' => $this->input->post('alamat'),
    //         'rt' => $this->input->post('rt'),
    //         'rw' => $this->input->post('rw'),
    //         'kelurahan' => $this->input->post('kelurahan'),
    //         'kecamatan' => $this->input->post('kecamatan'),
    //         'kabupaten' => $this->input->post('kabupaten'),
    //         'noTelp' => $this->input->post('noTelp'),
    //         'foto' => $this->input->post('foto'),
    //         'asalTk' => $this->input->post('asalTk'),
    //         'angkatan' => $this->input->post('angkatan'),
    //         'isActive' => $this->input->post('isActive'),
    //         'kodeKelas' => $this->input->post('kodeKelas'),


    //     ];

    //     $this->db->where($this->pk, $Value);
    //     $this->db->update($this->namaTable, $object);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    // }

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
