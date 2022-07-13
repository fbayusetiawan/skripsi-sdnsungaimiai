<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jadwalpelajaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('jadwalpelajaran_m');
        $this->load->library('form_validation');
    }

    public $titles = 'Jadwal Mata Pelajaran';
    public $vn = 'jadwalpelajaran';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['mapel'] = $this->jadwalpelajaran_m->getMapel();
        $data['data'] = $this->jadwalpelajaran_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }

    function jadwal()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['mapel'] = $this->jadwalpelajaran_m->getMapel();
        $data['data'] = $this->jadwalpelajaran_m->getViia();
        $this->template->load('template', $this->vn . '/jadwal', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;

        $data['tahun'] = $this->jadwalpelajaran_m->getTahun();
        $data['mapel'] = $this->jadwalpelajaran_m->getMapel();
        $data['kelas'] = $this->jadwalpelajaran_m->getKelas();
        // $data['hari'] = $this->jadwalpelajaran_m->getHari();


        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->jadwalpelajaran_m->getDataById($id);
        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {
        $this->jadwalpelajaran_m->save();
        redirect('akademik/' . $this->vn);
    }



    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['tahun'] = $this->jadwalpelajaran_m->getTahun();
        $data['mapel'] = $this->jadwalpelajaran_m->getMapel();
        $data['kelas'] = $this->jadwalpelajaran_m->getKelas();
        // $data['hari'] = $this->jadwalpelajaran_m->getHari();
        $data['row'] = $this->jadwalpelajaran_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->jadwalpelajaran_m->update($id);
        redirect('akademik/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->jadwalpelajaran_m->delete($id);
        redirect('akademik/' . $this->vn);
    }

    function getJadwalPerhari()
    {
        $tahunajaran = $_GET['tahunajaran'];
        $kelas = $_GET['kelas'];
        $this->db->where('jadwal_pelajaran.kodeTahun', $tahunajaran);
        $this->db->where('jadwal_pelajaran.kodeKelas', $kelas);
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = jadwal_pelajaran.kodeTahun', 'left');
        $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        $data = $this->db->get('jadwal_pelajaran')->result();
        if (empty($kelas)) :
            echo '<h3 class="text-center"> Silahkan Pilih Hari Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap">';
            echo '<thead>
        <tr>
        <th>No</th>
        <th>Hari</th>
        <th>Kelas</th>
        <th>Jam Mulai / Selesai</th>
        <th>Nama Pelajaran</th>
        <th>Nama Guru</th>
        <th>Aksi</th>

        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->namaHari . ' </td>
            <td> ' . $row->namaKelas . ' </td>
            <td> ' . $row->jamMulai . '  /  ' . $row->jamSelesai . ' </td>
            <td> ' . $row->namaMapel . ' </td>
            <td> ' . $row->namaGuru . ' </td>
            <td>
                <div class="btn-group mb-0">
                <a href=" jadwalpelajaran/edit/' . $row->kodeJadwal . '" class="btn btn-info btn-sm" data-toggle="tooltip" title="Klik Untuk Edit Jadwal"><i class="uil uil-edit"></i></a>
                <a href=" jadwalpelajaran/delete/' . $row->kodeJadwal . '" class="delete-data btn btn-info btn-sm" id="' . $row->namaMapel . '" data-toggle="tooltip" title="Klik Untuk Hapus Jadwal"><i class="uil uil-trash-alt"></i></a>
                    
                </div>
            </td>

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }
}

/* End of file */
