<?php

defined('BASEPATH') or exit('No direct script access allowed');

class nilairapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('nilairapor_m');


        $this->load->library('form_validation');
    }

    public $titles = 'Input Nilai Raport';
    public $vn = 'nilairapor';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['mapel'] = $this->nilairapor_m->getMapel();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = 'Input Nilai Rapor - Pengetahuan';
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        // $id2 = $this->uri->segment(5);
        $data['data'] = $this->nilairapor_m->getSiswa($id);
        $data['nilai'] = $this->nilairapor_m->getDataById($id);


        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function detail1()
    {
        $data['title'] = 'Input Nilai Rapor - Keterampilan';
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        // $id2 = $this->uri->segment(5);
        $data['data'] = $this->nilairapor_m->getSiswa($id);
        $data['nilai'] = $this->nilairapor_m->getDataByKet($id);



        $this->template->load('template', $this->vn . '/detail1', $data);
    }

    function addAction()
    {

        $this->nilairapor_m->ok();
        redirect('penilaian/' . $this->vn);
    }

    function edit()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Edit Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->nilairapor_m->getDataById($id);
        $this->template->load('template', $this->vn . '/edit', $data);
    }

    function editAction()
    {
        $id = $this->uri->segment(4);
        $this->nilairapor_m->update($id);
        redirect('penilaian/' . $this->vn);
    }

    function delete()
    {
        $id = $this->uri->segment(4);
        $this->nilairapor_m->delete($id);
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
        $tahunajaran = $_GET['tahunajaran'];
        $kelas = $_GET['kelas'];
        $this->db->where('jadwal_pelajaran.kodeTahun', $tahunajaran);
        $this->db->where('jadwal_pelajaran.kodeKelas', $kelas);
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = jadwal_pelajaran.kodeTahun', 'left');

        $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        $data = $this->db->get('jadwal_pelajaran')->result();
        if (empty($tahunajaran)) :
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table  nowrap">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>Nama Mapel</th>
            <th>Kelas</th>
            <th><center>Aksi</center></th>
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->namaMapel . ' </td>
            <td> ' . $row->namaKelas . ' </td>
            
            <td><center>
            <div class="btn-group mb-0 text-center">
            <center> <a href=" nilairapor/detail/' . $row->kodeJadwal . '/' . $row->kodeKelas . '" class="btn btn-info btn-sm" data-toggle="tooltip" title="Pengetahuan"><i class="uil uil-clipboard">Pengetahuan</i></a></center>
                
            </div>
            <div class="btn-group mb-0 text-center">
            <center> <a href=" nilairapor/detail1/' . $row->kodeJadwal . '/' . $row->kodeKelas . '" class="btn btn-warning btn-sm" data-toggle="tooltip" title="Keterampilan"><i class="uil uil-clipboard">Keterampilan</i></a></center>
                
            </div>
                            </center>    </td>


        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }

    function nilaiuh()
    {
        $tahunajaran = $_GET['tahunajaran'];
        $nilai1 = $_GET['nilai1'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_pengetahuan')->num_rows();

        $object = [
            'idNilaiPengetahuan' => uniqid(),
            'kodeTahun' => $tahunajaran,
            'kodeJadwal' => $kodeJadwal,
            'nisn' => $nisn,
            'nilaiuh' => $nilai1,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_pengetahuan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_pengetahuan', $object);
        endif;
    }

    function nilaiuts()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $nilai2 = $_GET['nilai2'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_pengetahuan')->num_rows();

        $object = [

            'nilaiuts' => $nilai2,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_pengetahuan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_pengetahuan', $object);
        endif;
    }

    function nilaiuas()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $nilai3 = $_GET['nilai3'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_pengetahuan')->num_rows();

        $object = [


            'nilaiuas' => $nilai3,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_pengetahuan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_pengetahuan', $object);
        endif;
    }

    function deskripsi()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $deskripsi = $_GET['deskripsi'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_pengetahuan')->num_rows();

        $object = [

            'deskripsi' => $deskripsi,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_pengetahuan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_pengetahuan', $object);
        endif;
    }

    function gradeRerata()
    {
        $nilai1 = $_GET['nilai1'];
        $nilai2 = $_GET['nilai2'];
        $nilai3 = $_GET['nilai3'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $jumlah = $nilai1 + $nilai2 + $nilai3;
        $rerata = $jumlah / 3;

        if ($rerata >= '85') :
            $deskripsi = 'Sangat baik dan sempurna. Dapat mengingat, mengetahui, menerapkan,
menganalisis, dan mengevaluasi semua kompetensi dasar.';
        elseif ($rerata >= '70') :
            $deskripsi = 'Baik. Dapat mengingat, mengetahui, menerapkan, menganalis sebagian besar
kompetensi dasar tetapi kurang bisa mengevaluasi dua kompetensi dasar';
        elseif ($rerata >= '50') :
            $deskripsi = 'Cukup. Dapat mengingat, mengetahui sebagian kompetensi dasar,tetapi kurang
bisa menerapkan, menganalisis dan mengevaluasi beberapa kompetensi dasar';
        else :
            $deskripsi = 'Sangat kurang. Hanya dapat mengingat, mengetahui, menerapkan,
menganalisis, dan mengeveluasi satu atau dua kompetensi dasar saja.';
        endif;

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
       
        $data = [
            'rerata' => $rerata,
            'deskripsi' => $deskripsi
        ];
        echo json_encode($data);
        $cek = $this->db->get('nilai_pengetahuan')->num_rows();

        $object = [
            'rerata' => $rerata,
            'deskripsi' => $deskripsi
        ];

        if ($cek <= 0) :

        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            
            $this->db->update('nilai_pengetahuan', $object);
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

    function nilaiuhk()
    {
        $tahunajaran = $_GET['tahunajaran'];
        $nilai1 = $_GET['nilai1'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_keterampilan')->num_rows();

        $object = [
            'idNilaiKeterampilan' => uniqid(),
            'kodeTahun' => $tahunajaran,
            'kodeJadwal' => $kodeJadwal,
            'nisn' => $nisn,
            'nilaiuh' => $nilai1,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_keterampilan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_keterampilan', $object);
        endif;
    }

    function nilaiutsk()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $nilai2 = $_GET['nilai2'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_keterampilan')->num_rows();

        $object = [

            'nilaiuts' => $nilai2,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_keterampilan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_keterampilan', $object);
        endif;
    }

    function nilaiuask()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $nilai3 = $_GET['nilai3'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_keterampilan')->num_rows();

        $object = [


            'nilaiuas' => $nilai3,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_keterampilan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_keterampilan', $object);
        endif;
    }

    function deskripsik()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $deskripsi = $_GET['deskripsi'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);

        $cek = $this->db->get('nilai_keterampilan')->num_rows();

        $object = [

            'deskripsi' => $deskripsi,

        ];
        if ($cek <= 0) :
            $this->db->insert('nilai_keterampilan', $object);
        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_keterampilan', $object);
        endif;
    }

    function gradeReratak()
    {
        // $tahunajaran = $_GET['tahunajaran'];
        $nilai1 = $_GET['nilai1'];
        $nilai2 = $_GET['nilai2'];
        $nilai3 = $_GET['nilai3'];
        $nisn = $_GET['nisn'];
        $kodeJadwal = $_GET['kodeJadwal'];

        $jumlah = $nilai1 + $nilai2 + $nilai3;
        $rerata = $jumlah / 3;

        if ($rerata >= '85') :
            $deskripsi = 'Sangat baik dan sempurna. Sangat aktif bertanya, mencoba, menalar dan
kreatif dalam menyelesaikan semua soal.';
        elseif ($rerata >= '70') :
            $deskripsi = 'Baik, Aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan
sebagian besar soal cerita.';
        elseif ($rerata >= '50') :
            $deskripsi = 'Cukup. Aktif bertanya, mencoba, menalar dan kreatif dalam menyelesaikan soal
cerita.';
        else :
            $deskripsi = 'Sangat kurang, tidak aktif dalam mencoba, menalar, dan tidak kreatif dalam
menyelesaikan latihan.';
        endif;

        $this->db->where('nisn', $nisn);
        $this->db->where('kodeJadwal', $kodeJadwal);
        // $this->db->where('kodeTahun', $tahunajaran);
        $data = [
            'rerata' => $rerata,
            'deskripsi' => $deskripsi,
        ];
        echo json_encode($data);
        $cek = $this->db->get('nilai_keterampilan')->num_rows();

        $object = [

            'rerata' => $rerata,
            'deskripsi' => $deskripsi,
        ];

        if ($cek <= 0) :

        else :
            $this->db->where('nisn', $nisn);
            $this->db->where('kodeJadwal', $kodeJadwal);
            // $this->db->where('kodeTahun', $tahunajaran);

            $this->db->update('nilai_keterampilan', $object);
        endif;
    }

    // function gradeKeterampilan()
    // {
    //     $keterampilan = $_GET['keterampilan'];

    //     if ($keterampilan >= '85') :
    //         $grade = 'A';
    //     elseif ($keterampilan >= '70') :
    //         $grade = 'B';
    //     elseif ($keterampilan >= '50') :
    //         $grade = 'C';
    //     else :
    //         $grade = 'D';
    //     endif;
    //     $data = [
    //         'grade' => $grade,
    //     ];
    //     echo json_encode($data);
    // }
}

/* End of file */
