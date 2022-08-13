<?php

defined('BASEPATH') or exit('No direct script access allowed');

class guru_m extends CI_Model
{

    public $namaTable = 'guru';
    public $pk = 'idGuru';

    public function getAllData()
    {
        $this->db->select('guru.*, jenis_ptk.jenisPtk as jenisPtk');
        $this->db->join('jenis_ptk', 'jenis_ptk.idJenisPtk = guru.idJenisPtk', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    public function getAllPtk()
    {
        return $this->db->get('jenis_ptk')->result();
    }

    public function getDataById($Value)
    {
        $this->db->select('guru.*, jenis_ptk.jenisPtk as jenisPtk');
        $this->db->join('jenis_ptk', 'jenis_ptk.idJenisPtk = guru.idJenisPtk', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }
    public function getPtk()
    {
        return $this->db->get('jenis_ptk')->result();
    }

    public function save($foto)
    {
        $object = [
            'idGuru' => uniqid(),
            'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
            'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
            'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
            'namaGuru' => htmlspecialchars($this->input->post('namaGuru', TRUE)),
            'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
            'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
            'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
            'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
            'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
            'rt' => htmlspecialchars($this->input->post('rt', TRUE)),
            'rw' => htmlspecialchars($this->input->post('rw', TRUE)),
            'kelurahan' => htmlspecialchars($this->input->post('kelurahan', TRUE)),
            'kecamatan' => htmlspecialchars($this->input->post('kecamatan', TRUE)),
            'kabupaten' => htmlspecialchars($this->input->post('kabupaten', TRUE)),
            'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
            'email' => htmlspecialchars($this->input->post('email', TRUE)),
            'tugasTambahan' => htmlspecialchars($this->input->post('tugasTambahan', TRUE)),
            'idJenisPtk' => htmlspecialchars($this->input->post('idJenisPtk', TRUE)),
            'foto' => $foto,
            'statusGuru' => htmlspecialchars($this->input->post('statusGuru', TRUE)),
            'dateCreated' => time()

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    public function savePtk()
    {
        $object = [

            'jenisPtk' => htmlspecialchars($this->input->post('jenisPtk', TRUE)),

        ];
        $this->db->insert('jenis_ptk', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Jabatan Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        if (empty($foto)) {
            $object = [
                'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'namaGuru' => htmlspecialchars($this->input->post('namaGuru', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'rt' => htmlspecialchars($this->input->post('rt', TRUE)),
                'rw' => htmlspecialchars($this->input->post('rw', TRUE)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', TRUE)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', TRUE)),
                'kabupaten' => htmlspecialchars($this->input->post('kabupaten', TRUE)),
                'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'tugasTambahan' => htmlspecialchars($this->input->post('tugasTambahan', TRUE)),
                'idJenisPtk' => htmlspecialchars($this->input->post('idJenisPtk', TRUE)),
                'statusGuru' => htmlspecialchars($this->input->post('statusGuru', TRUE)),
            ];
        } else {
            $object = [

                'nip' => htmlspecialchars($this->input->post('nip', TRUE)),
                'password' => password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT),
                'nik' => htmlspecialchars($this->input->post('nik', TRUE)),
                'namaGuru' => htmlspecialchars($this->input->post('namaGuru', TRUE)),
                'jk' => htmlspecialchars($this->input->post('jk', TRUE)),
                'tempatLahir' => htmlspecialchars($this->input->post('tempatLahir', TRUE)),
                'tanggalLahir' => htmlspecialchars($this->input->post('tanggalLahir', TRUE)),
                'agama' => htmlspecialchars($this->input->post('agama', TRUE)),
                'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                'rt' => htmlspecialchars($this->input->post('rt', TRUE)),
                'rw' => htmlspecialchars($this->input->post('rw', TRUE)),
                'kelurahan' => htmlspecialchars($this->input->post('kelurahan', TRUE)),
                'kecamatan' => htmlspecialchars($this->input->post('kecamatan', TRUE)),
                'kabupaten' => htmlspecialchars($this->input->post('kabupaten', TRUE)),
                'noTelp' => htmlspecialchars($this->input->post('noTelp', TRUE)),
                'email' => htmlspecialchars($this->input->post('email', TRUE)),
                'tugasTambahan' => htmlspecialchars($this->input->post('tugasTambahan', TRUE)),
                'idJenisPtk' => htmlspecialchars($this->input->post('idJenisPtk', TRUE)),
                'statusGuru' => htmlspecialchars($this->input->post('statusGuru', TRUE)),
                'foto' => $foto,

            ];
        }
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

    function deletePtk($Value)
    {
        $this->db->where('idJenisPtk', $Value);
        $this->db->delete('jenis_ptk');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
