<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jadwalsiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwalsiswa_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $cek = $this->db->get('siswa')->row();
        if ($cek->isActive == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['pageTitle'] = "Jadwal Pelajaran Siswa";
            $data['row'] = $cek;
            $data['mapel'] = $this->Jadwalsiswa_m->getMapel();
            $data['data'] = $this->Jadwalsiswa_m->getAllData();
            $this->template->load("home", "jadwalsiswa/list", $data);
        endif;
    }

    function cetak()
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


        $this->load->library('Mypdf');
        $this->mypdf->generatejadwal('cetakjadwal/index', $data);
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
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap mt-3">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Jam Mulai / Selesai</th>
            <th>Nama Pelajaran</th>
            <th>Nama Guru</th>
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->namaHari . ' </td>
            <td> ' . $row->jamMulai . '  /  ' . $row->jamSelesai . ' </td>
            <td> ' . $row->namaMapel . ' </td>
            <td> ' . $row->namaGuru . ' </td>
            
                
                    
                

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';

        endif;
    }
}

/* End of file Dashboard.php */
