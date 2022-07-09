<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ekstrakulikuler extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ekstrakulikuler_m');


        $this->load->library('form_validation');
    }

    public $titles = 'Kegiatan Ekstrakulikuler';
    public $vn = 'ekstrakulikuler';

    public function index()
    {

        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->ekstrakulikuler_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['mapel'] = $this->ekstrakulikuler_m->getMapel();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = 'Input Kegiatan Ekstrakulikuler Siswa';
        // $data['pageTitle'] = "Detail Data " . $this->titles;
        // $id = $this->uri->segment(4);
        // // $id2 = $this->uri->segment(5);
        // $data['data'] = $this->capaianbelajar_m->getSiswa($id);

        // $this->template->load('template', $this->vn . '/detail', $data);

        // $tahun_akademik = $this->input->post('tahun_akademik');
        $kodeKelas = $this->input->post('kodeKelas');
        $this->db->where('siswa.kodeKelas', $kodeKelas);
        // $this->db->where('tahun_akademik.kodeTahun', $tahun_akademik);
        $this->db->join('kelas', 'kelas.kodeKelas = siswa.kodeKelas', 'left');

        $data['data'] = $this->db->get('siswa')->result();

        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {

        $this->ekstrakulikuler_m->ok();
        redirect('penilaian/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->ekstrakulikuler_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->ekstrakulikuler_m->update($id);
        redirect('penilaian/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->ekstrakulikuler_m->delete($id);
        redirect('penilaian/' . $this->vn);
    }

    function upload_foto()
    {
        $config['upload_path']          = './upload/';
        $config['allowed_types']        = 'jpg|png';
        $config['max_size']             = 1024; // imb
        $this->load->library('upload', $config);
        // proses upload
        $this->upload->do_upload('foto');
        $upload = $this->upload->data();
        return $upload['file_name'];
    }

    function getJadwalPerhari()
    {
        $tahun_akademik = $_GET['tahun_akademik'];
        $kelas = $_GET['kelas'];
        $this->db->where('jadwal_pelajaran.kodeTahun', $tahun_akademik);
        $this->db->where('jadwal_pelajaran.kodeKelas', $kelas);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = jadwal_pelajaran.kodeTahun', 'left');

        $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        $data = $this->db->get('siswa')->result();
        if (empty($kelas)) :
            echo '<h3 class="text-center"> Silahkan Pilih Hari Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>NISN</th>
            <th>Nama Siswa</th>
            <th>Nilai</th>
            <th>Kegiatan Ekstrakulikuler</th>

        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->nisn . ' </td>
            <td> ' . $row->namaSiswa . ' </td>
            
            <td> <div class="form-row align-items">
            <div class="">
                <input type="text" class="form-control" style="width: 80px;" PLACEHOLDER="Predikat" id="inlineFormInput" >
            </div>
            <div class="col-auto">
                <div class="input-group">  
                <textarea class="form-control" rows="2" id="example-textarea" PLACEHOLDER="Deskripsi"></textarea>
                </div>
            </div>
            
        </div></td>
           
            
            
            

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }

    function getNilaiEkstrakulikuler()
    {
        $tahun_akademik = $_GET['tahun_akademik'];
        $nilaiEkstrakulikuler = $_GET['nilaiEkstrakulikuler'];
        $nisn = $_GET['nisn'];
        $kodeKelas = $_GET['kodeKelas'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeKelas', $kodeKelas);
        $this->db->where('kodeTahun', $tahun_akademik);

        $cek = $this->db->get('nilai_ekstrakulikuler')->num_rows();

        $object = [
            'idNilaiEkstrakulikuler' => uniqid(),
            'kodeTahun' => $tahun_akademik,
            'kodeKelas' => $kodeKelas,
            'nisn' => $nisn,
            'nilaiEkstrakulikuler' => $nilaiEkstrakulikuler,
        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_ekstrakulikuler', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeKelas', $kodeKelas);
            $this->db->where('kodeTahun', $tahun_akademik);

            $this->db->update('nilai_ekstrakulikuler', $object);
        endif;
    }

    function getKegiatan()
    {
        $tahun_akademik = $_GET['tahun_akademik'];
        $kegiatan = $_GET['kegiatan'];
        $nisn = $_GET['nisn'];
        $kodeKelas = $_GET['kodeKelas'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeKelas', $kodeKelas);
        $this->db->where('kodeTahun', $tahun_akademik);

        $cek = $this->db->get('nilai_ekstrakulikuler')->num_rows();

        $object = [

            'kegiatan' => $kegiatan,
        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_ekstrakulikuler', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeKelas', $kodeKelas);
            $this->db->where('kodeTahun', $tahun_akademik);

            $this->db->update('nilai_ekstrakulikuler', $object);
        endif;
    }
}

/* End of file */
