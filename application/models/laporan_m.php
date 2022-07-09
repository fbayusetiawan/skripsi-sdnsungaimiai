<?php

defined('BASEPATH') or exit('No direct script access allowed');

class laporan_m extends CI_Model
{

    function qdinamis($jenis, $table, $sum, $join, $pk, $dari, $sampai)
    {
        $this->db->select_sum($sum, 'honor');
        $this->db->where($table . '.tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->where('jenisDana', $jenis);
        $this->db->join($join,  $join . '.' . $pk . ' = ' . $table . '.' . $pk . '', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }
    function qdinamis2($jenis, $table, $sum, $join, $pk, $filter)
    {
        $this->db->select_sum($sum, 'honor');
        $this->db->where($join . '.idHonorarium', $filter);
        $this->db->where('jenisDana', $jenis);
        $this->db->join($join,  $join . '.' . $pk . ' = ' . $table . '.' . $pk . '', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }
    function qdinamis3($jenis, $table, $sum, $join, $pk, $filter)
    {
        $this->db->select_sum($sum, 'honor');
        $this->db->where($join . '.idPembayaran', $filter);
        $this->db->where('jenisDana', $jenis);
        $this->db->join($join,  $join . '.' . $pk . ' = ' . $table . '.' . $pk . '', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }
    function qdinamis4($jenis, $table, $sum, $join, $pk, $filter)
    {
        $this->db->select_sum($sum, 'honor');
        $this->db->where($join . '.idEkskul', $filter);
        $this->db->where('jenisDana', $jenis);
        $this->db->join($join,  $join . '.' . $pk . ' = ' . $table . '.' . $pk . '', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }
    function call_tanggal($Value, $table, $pk)
    {
        $this->db->where($pk, $Value);
        $result = $this->db->get($table)->row();
        return $result->tanggal;
    }

    public function getGuru()
    {
        $this->db->select('guru.*, jenis_ptk.jenisPtk as jenisPtk');
        $this->db->join('jenis_ptk', 'jenis_ptk.idJenisPtk = guru.idJenisPtk', 'left');
        return $this->db->get('guru')->result();
    }

    public function getAllSiswa()
    {
        $this->db->select('siswa.*, kelas.namaKelas as namaKelas');
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');
        return $this->db->get('siswa')->result();
    }

    public function getKepsek()
    {
        $this->db->where('idJenisPtk', '1');
        return $this->db->get('guru')->row();
    }

    function panitiaulangan($dari, $sampai)
    {
        $this->db->select('*,detailpanitiaulangan.tanggal as tanggal1');

        $this->db->where('detailpanitiaulangan.tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.idPegawai = detailpanitiaulangan.idPegawai', 'left');
        $this->db->join('panitiaulangan', 'panitiaulangan.idPanitiaUlangan = detailpanitiaulangan.idPanitiaUlangan', 'left');
        return $this->db->get('detailpanitiaulangan')->result();
    }

    function pembuatanSoal($dari, $sampai)
    {
        $this->db->select('*,detailpembuatansoal.tanggal as tanggal1');
        $this->db->where('detailpembuatansoal.tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.idPegawai = detailpembuatansoal.idPegawai', 'left');
        $this->db->join('pembuatansoal', 'pembuatansoal.idPembuatanSoal = detailpembuatansoal.idPembuatanSoal', 'left');
        return $this->db->get('detailpembuatansoal')->result();
    }

    function pengawas($dari, $sampai)
    {
        $this->db->select('*,detailpengawas.tanggal as tanggal1');
        $this->db->where('detailpengawas.tanggal BETWEEN "' . $dari . '" AND "' . $sampai . '"');
        $this->db->join('pegawai', 'pegawai.idPegawai = detailpengawas.idPegawai', 'left');
        $this->db->join('pengawas', 'pengawas.idPengawas = detailpengawas.idPengawas', 'left');
        return $this->db->get('detailpengawas')->result();
    }

    function honorarium($table, $Value)
    {
        $this->db->where('honorarium.idHonorarium', $Value);
        $this->db->where('idTahunAjaran', $this->session->userdata('idta'));
        $this->db->join('guru', 'guru.idGuru = ' . $table . '.idGuru', 'left');
        $this->db->join('honorarium',   'honorarium.idHonorarium = ' . $table . '.idHonorarium', 'left');
        return $this->db->get($table)->result();
    }

    function pembayaran($table, $Value)
    {
        $this->db->where('pembayaran.idPembayaran', $Value);
        $this->db->where('idTahunAjaran', $this->session->userdata('idta'));
        $this->db->join('pembayaran',   'pembayaran.idPembayaran = ' . $table . '.idPembayaran', 'left');
        return $this->db->get($table)->result();
    }

    function ekskul($table, $Value)
    {
        $this->db->where('ekskul.idEkskul', $Value);
        $this->db->where('idTahunAjaran', $this->session->userdata('idta'));
        $this->db->join('pegawai', 'pegawai.idPegawai = ' . $table . '.idPegawai', 'left');
        $this->db->join('ekskul',   'ekskul.idEkskul = ' . $table . '.idEkskul', 'left');
        return $this->db->get($table)->result();
    }
    function ekskul2($table, $Value)
    {
        $this->db->where('ekskul.idEkskul', $Value);
        $this->db->where('idTahunAjaran', $this->session->userdata('idta'));
        $this->db->join('pelatih', 'pelatih.idPelatih = ' . $table . '.idPelatih', 'left');
        $this->db->join('ekskul',   'ekskul.idEkskul = ' . $table . '.idEkskul', 'left');
        return $this->db->get($table)->result();
    }
    function ekskul3($table, $Value)
    {
        $this->db->where('ekskul.idEkskul', $Value);
        $this->db->where('idTahunAjaran', $this->session->userdata('idta'));
        $this->db->join('ekskul',   'ekskul.idEkskul = ' . $table . '.idEkskul', 'left');
        return $this->db->get($table)->result();
    }

    function akuntan($Value)
    {
        $this->db->where('jenisDana', $Value);
        return $this->db->get('akuntan')->result();
    }
    function debet($Value)
    {
        $this->db->select_sum('debit', 'debit');
        $this->db->where('jenisDana', $Value);
        $data = $this->db->get('akuntan')->row();
        return $data->debit;
    }
    function kredit($Value)
    {
        $this->db->select_sum('kredit', 'kredit');
        $this->db->where('jenisDana', $Value);
        $data = $this->db->get('akuntan')->row();
        return $data->kredit;
    }
}

/* End of file ModelName.php */
