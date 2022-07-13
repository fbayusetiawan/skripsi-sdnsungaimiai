<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Hibah_m extends CI_Model
{

    public $namaTable = 'hibah_pengajuanproposal';
    public $pk = 'idPengajuan';

    function hapusAnggotaNotExist()
    {
        return $this->db->query("DELETE FROM `hibah_anggota` WHERE NOT EXISTS (SELECT * FROM hibah_pengajuanproposal WHERE hibah_anggota.idPengajuan=hibah_pengajuanproposal.idPengajuan)");
    }

    public function getDataById($Value)
    {
        $this->db->join('periode', 'periode.idPeriode = hibah_pengajuanproposal.idPeriode', 'left');
        $this->db->join('pegawai', 'pegawai.nik = hibah_pengajuanproposal.nik', 'left');
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }
    function getRumpun()
    {
        return $this->db->get('datamaster_rumpun')->result();
    }
    public function getAllDataByNik()
    {
        // $this->db->join('periode', 'periode.idPeriode = hibah_pengajuanproposal.idPeriode', 'left');
        $this->db->join('hibah_skema', 'hibah_skema.idSkema = ' . $this->namaTable . '.idSkema', 'left');

        $this->db->where('nik', $this->session->userdata('nik'));
        return $this->db->get($this->namaTable)->result();
    }

    public function getByNik($Value)
    {
        $this->db->where('nik', $Value);
        return $this->db->get($this->table)->row();
    }

    public function alih($Value)
    {
        $this->db->where('jenisHibah', $Value);
        // $this->db->where('idPeriode', $this->session->userdata('idPeriode'));
        $this->db->where('nik', $this->session->userdata('nik'));
        return $this->db->get($this->namaTable)->row();
    }
    public function getAnggotaHibah()
    {
        $this->db->where('idPengajuan', $this->session->userdata('idPengajuan'));
        $this->db->join('pegawai', 'pegawai.nik = hibah_anggota.nik', 'left');
        return $this->db->get('hibah_anggota')->result();
    }
    public function getAnggotaHibah1($Value)
    {
        $this->db->where('idPengajuan', $Value);
        $this->db->join('pegawai', 'pegawai.nik = hibah_anggota.nik', 'left');
        return $this->db->get('hibah_anggota')->result();
    }

    public function insert($jenisHibah, $file)
    {
        $object = [
            'idPengajuan' => $this->session->userdata('idPengajuan'),
            'nik' => $this->input->post('nik', TRUE),
            'judulProposal' => $this->input->post('judulProposal', TRUE),
            'idSkema' => $this->input->post('idSkema', TRUE),
            // 'idPeriode' => $this->session->userdata('idPeriode'),
            'jenisHibah' => $jenisHibah,
            'file' => $file,
            'time' => time(),
            'kodeRumpun' => $this->input->post('kodeRumpun', TRUE),
            'kodeSubRumpun' => $this->input->post('kodeSubRumpun', TRUE),
            'kodeBidangIlmu' => $this->input->post('kodeBidangIlmu', TRUE),
            'jumlah' => '0',
            'tahun' => $this->input->post('tahun', TRUE),
            'statusProposal' => 'Submission',

        ];

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan Proposal Hibah Berhasil Dilakukan.</div>');
    }

    function saveAnggota()
    {
        $object = [
            'idPengajuan' => $this->session->userdata('idPengajuan'),
            'nik' => $this->input->post('nik'),
        ];
        $this->db->insert('hibah_anggota', $object);
    }

    function delete($Value)
    {
        $object = [
            'statusProposal' => 'Cancel'
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengajuan Proposal Hibah Internal Berhasil Dihapus.</div>');
    }
}

/* End of file user_m.php */
