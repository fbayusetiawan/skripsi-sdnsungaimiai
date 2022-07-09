<?php

defined('BASEPATH') or exit('No direct script access allowed');

class penilaianuts extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('penilaianuts_m');


        $this->load->library('form_validation');
    }

    public $titles = 'Input Nilai UTS';
    public $vn = 'penilaianuts';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        // $data['data'] = $this->penilaianuts_m->getAllData();
        // $data['mapel'] = $this->penilaianuts_m->getMapel();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['mapel'] = $this->penilaianuts_m->getMapel();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = 'Input Nilai UTS';
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        // $id2 = $this->uri->segment(5);
        $data['data'] = $this->penilaianuts_m->getSiswa($id);

        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function addAction()
    {

        $this->penilaianuts_m->ok();
        redirect('penilaian/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->penilaianuts_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->penilaianuts_m->update($id);
        redirect('penilaian/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->penilaianuts_m->delete($id);
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
            
            <td> ' . $row->namaMapel . ' </td>
            <td> ' . $row->namaGuru . ' </td>
            <td>
                <div class="btn-group mb-0">
                <a href=" penilaianuts/detail/' . $row->kodeJadwal . '/' . $row->kodeKelas . '" class="btn btn-info btn-sm" data-toggle="tooltip" title="Input Nilai"><i class="uil uil-clipboard"></i> Input Nilai</a>
                    
                </div>
            </td>

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }

    function nilai1()
    {
        $pengetahuan = $_GET['pengetahuan'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);

        $cek = $this->db->get('nilai_uts')->num_rows();

        $object = [
            'idNilaiUts' => uniqid(),
            'kodeJadwal' => $kodeJadwal,
            'nisn' => $nisn,
            'nilaiPengetahuan' => $pengetahuan,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_uts', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);

            $this->db->update('nilai_uts', $object);
        endif;
    }

    function insertKeterampilan()
    {
        $keterampilan = $_GET['keterampilan'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);

        $cek = $this->db->get('nilai_uts')->num_rows();

        $object = [
            'idNilaiUts' => uniqid(),
            'kodeJadwal' => $kodeJadwal,
            'nisn' => $nisn,
            'nilaiKeterampilan' => $keterampilan,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_uts', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);

            $this->db->update('nilai_uts', $object);
        endif;
    }

    function gradePengetahuan()
    {
        $pengetahuan = $_GET['pengetahuan'];

        if ($pengetahuan >= '85') :
            $grade = 'A';
        elseif ($pengetahuan >= '70') :
            $grade = 'B';
        elseif ($pengetahuan >= '50') :
            $grade = 'C';
        else :
            $grade = 'D';
        endif;
        $data = [
            'grade' => $grade,
        ];
        echo json_encode($data);
    }

    function gradeKeterampilan()
    {
        $keterampilan = $_GET['keterampilan'];

        if ($keterampilan >= '85') :
            $grade = 'A';
        elseif ($keterampilan >= '70') :
            $grade = 'B';
        elseif ($keterampilan >= '50') :
            $grade = 'C';
        else :
            $grade = 'D';
        endif;
        $data = [
            'grade' => $grade,
        ];
        echo json_encode($data);
    }
}

/* End of file */
