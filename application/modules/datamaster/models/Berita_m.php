<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita_m extends CI_Model
{

    public $namaTable = 'berita';
    public $pk = 'idBerita';

    function getAllData()
    {
        // $this->db->join('kategori_berita', 'kategori_berita.idKategori = berita.kategori', 'left');

        //       $this->db->join('pangkat', 'pangkat.idPangkat = pengurus.idPangkat', 'left');
        // $this->db->join('kementerian', 'kementerian.idKementerian = berita.idKementerian', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        // $this->db->join('pangkat', 'pangkat.idPangkat = pengurus.idPangkat', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save($foto)
    {
        $object = [
            'idBerita' => uniqid(),
            'judulBerita' => htmlspecialchars($this->input->post('judulBerita', TRUE)),
            'isiBerita' => htmlspecialchars($this->input->post('isiBerita', TRUE)),
            'tanggal' => htmlspecialchars($this->input->post('tanggal', TRUE)),
            'kategori' => htmlspecialchars($this->input->post('kategori', TRUE)),
            'foto' => $foto,
            'isActive' => '1',
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value, $foto)
    {
        $object = [
            'judulBerita' => htmlspecialchars($this->input->post('judulBerita', TRUE)),
            'isiBerita' => htmlspecialchars($this->input->post('isiBerita', TRUE)),
            'tanggal' => htmlspecialchars($this->input->post('tanggal', TRUE)),
            'kategori' => htmlspecialchars($this->input->post('kategori', TRUE)),
            'foto' => $foto,
            'isActive' => htmlspecialchars($this->input->post('isActive', TRUE)),
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
