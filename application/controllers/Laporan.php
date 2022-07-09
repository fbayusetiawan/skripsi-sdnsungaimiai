<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('laporan_m', 'primaryModel');
    }


    function panitiaulangan()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['bosda'] = $this->primaryModel->qdinamis(1, 'detailpanitiaulangan', 'honor', 'panitiaulangan', 'idPanitiaUlangan', $dari, $sampai);
        $data['bosnas'] = $this->primaryModel->qdinamis(2, 'detailpanitiaulangan', 'honor', 'panitiaulangan', 'idPanitiaUlangan', $dari, $sampai);
        $data['data'] = $this->primaryModel->panitiaulangan($dari, $sampai);
        $this->load->view('laporan/panitiaulangan', $data);
    }

    function soal()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['bosda'] = $this->primaryModel->qdinamis(1, 'detailpembuatansoal', 'honor', 'pembuatansoal', 'idPembuatanSoal', $dari, $sampai);
        $data['bosnas'] = $this->primaryModel->qdinamis(2, 'detailpembuatansoal', 'honor', 'pembuatansoal', 'idPembuatanSoal', $dari, $sampai);
        $data['data'] = $this->primaryModel->pembuatanSoal($dari, $sampai);
        $this->load->view('laporan/soal', $data);
    }

    function pengawas()
    {
        $dari = $this->input->post('dari');
        $sampai = $this->input->post('sampai');
        $data['bosda'] = $this->primaryModel->qdinamis(1, 'detailpengawas', 'honor', 'pengawas', 'idPengawas', $dari, $sampai);
        $data['bosnas'] = $this->primaryModel->qdinamis(2, 'detailpengawas', 'honor', 'pengawas', 'idPengawas', $dari, $sampai);
        $data['data'] = $this->primaryModel->pengawas($dari, $sampai);
        $this->load->view('laporan/pengawas', $data);
    }

    function lguru()
    {
        $data['data'] = $this->primaryModel->getGuru();
        $data['guru'] = $this->primaryModel->getKepsek();
        $this->load->view('laporan/lguru', $data);
    }

    function lsiswa()
    {
        $data['data'] = $this->primaryModel->getAllSiswa();
        $data['guru'] = $this->primaryModel->getKepsek();
        $this->load->view('laporan/lsiswa', $data);
    }

    function hpengajar()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'honorarium', 'idHonorarium');
        $data['bosda'] = $this->primaryModel->qdinamis2(1, 'h_pengajar', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis2(2, 'h_pengajar', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['data'] = $this->primaryModel->honorarium('h_pengajar', $filter);
        $this->load->view('laporan/hpengajar', $data);
    }
    function hwalikelas()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'honorarium', 'idHonorarium');
        $data['bosda'] = $this->primaryModel->qdinamis2(1, 'h_walikelas', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis2(2, 'h_walikelas', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['data'] = $this->primaryModel->honorarium('h_walikelas', $filter);
        $this->load->view('laporan/hwalikelas', $data);
    }
    function htatausaha()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'honorarium', 'idHonorarium');
        $data['bosda'] = $this->primaryModel->qdinamis2(1, 'h_tatausaha', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis2(2, 'h_tatausaha', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['data'] = $this->primaryModel->honorarium('h_tatausaha', $filter);
        $this->load->view('laporan/htatausaha', $data);
    }
    function hkpk()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'honorarium', 'idHonorarium');
        $data['bosda'] = $this->primaryModel->qdinamis2(1, 'h_kpk', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis2(2, 'h_kpk', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['data'] = $this->primaryModel->honorarium('h_kpk', $filter);
        $this->load->view('laporan/hkpk', $data);
    }
    function hkup()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'honorarium', 'idHonorarium');
        $data['bosda'] = $this->primaryModel->qdinamis2(1, 'h_kup', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis2(2, 'h_kup', 'honor', 'honorarium', 'idHonorarium', $filter);
        $data['data'] = $this->primaryModel->honorarium('h_kup', $filter);
        $this->load->view('laporan/hkup', $data);
    }
    function pjasa()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'pembayaran', 'idPembayaran');
        $data['bosda'] = $this->primaryModel->qdinamis3(1, 'p_jasa', 'biaya', 'pembayaran', 'idPembayaran', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis3(2, 'p_jasa', 'biaya', 'pembayaran', 'idPembayaran', $filter);
        $data['data'] = $this->primaryModel->pembayaran('p_jasa', $filter);
        $this->load->view('laporan/pjasa', $data);
    }
    function pbarang()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'pembayaran', 'idPembayaran');
        $data['bosda'] = $this->primaryModel->qdinamis3(1, 'p_barang', 'harga', 'pembayaran', 'idPembayaran', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis3(2, 'p_barang', 'harga', 'pembayaran', 'idPembayaran', $filter);
        $data['data'] = $this->primaryModel->pembayaran('p_barang', $filter);
        $this->load->view('laporan/pbarang', $data);
    }
    function psekolah()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'pembayaran', 'idPembayaran');
        $data['bosda'] = $this->primaryModel->qdinamis3(1, 'p_sekolah', 'biaya', 'pembayaran', 'idPembayaran', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis3(2, 'p_sekolah', 'biaya', 'pembayaran', 'idPembayaran', $filter);
        $data['data'] = $this->primaryModel->pembayaran('p_sekolah', $filter);
        $this->load->view('laporan/psekolah', $data);
    }
    function epembina()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'ekskul', 'idEkskul');
        $data['bosda'] = $this->primaryModel->qdinamis4(1, 'e_pembina', 'honor', 'ekskul', 'idEkskul', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis4(2, 'e_pembina', 'honor', 'ekskul', 'idEkskul', $filter);
        $data['data'] = $this->primaryModel->ekskul('e_pembina', $filter);
        $this->load->view('laporan/epembina', $data);
    }
    function ekegiatan()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'ekskul', 'idEkskul');
        $data['bosda'] = $this->primaryModel->qdinamis4(1, 'e_kegiatan', 'biaya', 'ekskul', 'idEkskul', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis4(2, 'e_kegiatan', 'biaya', 'ekskul', 'idEkskul', $filter);
        $data['data'] = $this->primaryModel->ekskul3('e_kegiatan', $filter);
        $this->load->view('laporan/ekegiatan', $data);
    }
    function epelatih()
    {
        $filter = $this->input->post('filter');
        $data['call_tanggal'] = $this->primaryModel->call_tanggal($filter, 'ekskul', 'idEkskul');
        $data['bosda'] = $this->primaryModel->qdinamis4(1, 'e_pelatih', 'honor', 'ekskul', 'idEkskul', $filter);
        $data['bosnas'] = $this->primaryModel->qdinamis4(2, 'e_pelatih', 'honor', 'ekskul', 'idEkskul', $filter);
        $data['data'] = $this->primaryModel->ekskul2('e_pelatih', $filter);
        $this->load->view('laporan/epelatih', $data);
    }

    function akuntansi()
    {
        $data['data'] = $this->primaryModel->akuntan(1);
        $data['debet'] = $this->primaryModel->debet(1);
        $data['kredit'] = $this->primaryModel->kredit(1);
        $this->load->view('laporan/akuntan', $data);
    }
    function akuntansi2()
    {
        $data['data'] = $this->primaryModel->akuntan(2);
        $data['debet'] = $this->primaryModel->debet(2);
        $data['kredit'] = $this->primaryModel->kredit(2);
        $this->load->view('laporan/akuntan2', $data);
    }
    function grafik()
    {

        $data['data'] = json_encode($this->db->query("SELECT keterangan, SUM(debit) as pengeluaran FROM `akuntan` WHERE debit != '0' GROUP BY fk")->result());
        $this->load->view('laporan/grafik', $data);
    }
}

/* End of file Laporan.php */
