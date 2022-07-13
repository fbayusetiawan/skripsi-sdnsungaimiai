<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilairaporsiswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Nilairaporsiswa_m');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $cek = $this->db->get('siswa')->row();
        if ($cek->isActive == '0') :
            redirect('Home/Pengaturan/setup');
        else :
            $data['pageTitle'] = "Laporan Nilai Siswa";
            $data['row'] = $cek;
            $data['mapel'] = $this->Nilairaporsiswa_m->getMapel();
            $data['data'] = $this->Nilairaporsiswa_m->getAllData();
            $this->template->load("home", "nilairaporsiswa/list", $data);
        endif;
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

    function getCapaianBelajar()
    {
        $tahun_akademik1 = $_GET['tahun_akademik1'];
        $kelas1 = $_GET['kelas1'];
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $this->db->where('nilai_capaianbelajar.kodeTahun', $tahun_akademik1);
        $this->db->where('nilai_capaianbelajar.kodeKelas', $kelas1);
        // $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = jadwal_pelajaran.kodeTahun', 'left');

        // $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        // $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        // $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        $data = $this->db->get('nilai_capaianbelajar')->result();
        if (empty($kelas1)) :
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap mt-3">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>Nilai Spiritual</th>
            <th>Deskripsi Spiritual</th>
            <th>Nilai Sosial</th>
            <th>Deskripsi Sosial</th>
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->nilaiSpiritual . ' </td>
            <td> ' . $row->deskripsiSpiritual . ' </td>
            <td> ' . $row->nilaiSosial . ' </td>
            <td> ' . $row->deskripsiSosial . ' </td>
            

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }

    function getEkstrakulikuler()
    {
        $tahun_akademik2 = $_GET['tahun_akademik2'];
        $kelas2 = $_GET['kelas2'];
        $this->db->where('nisn', $this->session->userdata('nisn'));
        $this->db->where('nilai_ekstrakulikuler.kodeTahun', $tahun_akademik2);
        $this->db->where('nilai_ekstrakulikuler.kodeKelas', $kelas2);
        // $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = jadwal_pelajaran.kodeTahun', 'left');

        // $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        // $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        // $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        $data = $this->db->get('nilai_ekstrakulikuler')->result();
        if (empty($kelas2)) :
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap mt-3">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>Nilai Kegiatan</th>
            <th>Nama Kegiatan</th>
            
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->nilaiEkstrakulikuler . ' </td>
            <td> ' . $row->kegiatan . ' </td>
            

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }
    function getNilaiRerata()
    {
        $tahun_akademik3 = $_GET['tahun_akademik3'];
        // $kelas3 = $_GET['kelas3'];
        $this->db->where('nilai_pengetahuan.nisn', $this->session->userdata('nisn'));
        $this->db->where('nilai_pengetahuan.kodeTahun', $tahun_akademik3);
        // $this->db->where('nilai_pengetahuan.kodeKelas', $kelas3);
        // $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = jadwal_pelajaran.kodeTahun', 'left');

        // $this->db->join('kelas', 'kelas.kodeKelas = jadwal_pelajaran.kodeKelas', 'left');
        // $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'left');
        // $this->db->join('guru', 'guru.nip = mata_pelajaran.nip', 'left');
        // $this->db->join('jadwal_pelajaran', 'jadwal_pelajaran.kodeJadwal = nilai_pengetahuan.kodeJadwal', 'left');

        $this->db->join('siswa', 'siswa.nisn = nilai_pengetahuan.nisn', 'left');

        // $this->db->select('*');
        // $this->db->from('nilai_pengetahuan');
        $this->db->join('jadwal_pelajaran', 'jadwal_pelajaran.kodeJadwal = nilai_pengetahuan.kodeJadwal ', 'LEFT');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'LEFT');
        // $data = $this->db->get();
        // return $data;

        $data = $this->db->get('nilai_pengetahuan')->result();
        if (empty($tahun_akademik3)) :
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table dt-responsive nowrap mt-3">';
            echo '<thead>
            <tr>
            <th>No</th>
            <th>Nama Siswa</th>
            <th>Nama Mapel</th>
            <th>Ulangan Harian</th>
            <th>Ulangan Tengah Semester</th>
            <th>Ulangan Akhir Semester</th>
            <th>Nilai Rata-Rata</th>
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->namaSiswa . ' </td>
            <td> ' . $row->namaMapel . ' </td>
            <td> ' . $row->nilaiuh . ' </td>
            <td> ' . $row->nilaiuts . ' </td>
            <td> ' . $row->nilaiuas . ' </td>
            <td> ' . $row->rerata . ' </td>
            

        </tr>';
            endforeach;
            echo '</tbody>';
            echo '</table>';
        endif;
    }
}

/* End of file Dashboard.php */
