<?php

defined('BASEPATH') or exit('No direct script access allowed');

class cetakrapor extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cetakrapor_m');
        $this->load->library('form_validation');
    }

    public $titles = 'Cetak Rapor Siswa';
    public $vn = 'cetakrapor';

    public function index()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Data " . $this->titles;
        $data['data'] = $this->cetakrapor_m->getAllData();

        $this->template->load('template', $this->vn . '/list', $data);
    }


    function add()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Tambah Data " . $this->titles;
        $data['kelas'] = $this->cetakrapor_m->getKelas();
        $this->template->load('template', $this->vn . '/add', $data);
    }

    function detail()
    {
        $data['title'] = 'Cetak Rapor Siswa';
        $kodeKelas = $this->input->post('kodeKelas');
        $tahun_akademik = $this->input->post('kodeTahun');

        $array = array(
            'kodeKelas' => $kodeKelas
        );

        $this->session->set_userdata($array);

        $this->db->where('kodeKelas', $kodeKelas);


        $data['tahun'] = $tahun_akademik;
        $data['data'] = $this->db->get('siswa')->result();

        $this->template->load('template', $this->vn . '/detail', $data);
    }

    function cover()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->cetakrapor_m->getDataById($id);

        $this->load->library('Mypdf');
        $this->mypdf->generateraporcover($this->vn . '/cover', $data);
    }

    function hal1()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();
        // $data['capaian'] = $this->cetakrapor_m->getCapaianBelajar($id);
        $this->db->where('nisn', $id);
        $this->db->where('nilai_capaianbelajar.kodeTahun', $tahun);

        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_capaianbelajar.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_capaianbelajar')->row();

        $this->load->library('Mypdf');
        $this->mypdf->generatehal1($this->vn . '/hal1', $data);
    }

    function hal2()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();
        $data['guru'] = $this->cetakrapor_m->getKepsek();
        $this->db->where('nisn', $id);
        $this->db->where('nilai_capaianbelajar.kodeTahun', $tahun);

        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_capaianbelajar.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_capaianbelajar')->row();

        $this->load->library('Mypdf');
        $this->mypdf->generatehal2($this->vn . '/hal2', $data);
    }

    function hal3()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();

        $this->db->where('nisn', $id);
        $this->db->where('nilai_capaianbelajar.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_capaianbelajar.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_capaianbelajar')->row();
        // var_dump($data['c']);
        // die;

        $this->load->library('Mypdf');
        $this->mypdf->generatehal3($this->vn . '/hal3', $data);
    }

    function hal4()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();

        $this->db->where('nisn', $id);
        $this->db->where('nilai_pengetahuan.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_pengetahuan.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_pengetahuan')->row();


        $this->db->where('nisn', $id);
        $this->db->where('nilai_pengetahuan.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_pengetahuan.kodeTahun', 'left');


        $this->db->join('jadwal_pelajaran', 'jadwal_pelajaran.kodeJadwal = nilai_pengetahuan.kodeJadwal ', 'LEFT');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'LEFT');

        $data['penge'] = $this->db->get('nilai_pengetahuan')->result();
        // var_dump($data['c']);
        // die;
        $data['k'] = $this->db->get('kelompok_mapel')->result();

        $this->load->library('Mypdf');
        $this->mypdf->generatehal4($this->vn . '/hal4', $data);
    }

    function hal5()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();

        $this->db->where('nisn', $id);
        $this->db->where('nilai_keterampilan.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_keterampilan.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_keterampilan')->row();
        $this->db->where('nisn', $id);
        $this->db->where('nilai_keterampilan.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_keterampilan.kodeTahun', 'left');


        $this->db->join('jadwal_pelajaran', 'jadwal_pelajaran.kodeJadwal = nilai_keterampilan.kodeJadwal ', 'LEFT');
        $this->db->join('mata_pelajaran', 'mata_pelajaran.kodeMapel = jadwal_pelajaran.kodeMapel', 'LEFT');

        $data['keter'] = $this->db->get('nilai_keterampilan')->result();
        $data['k'] = $this->db->get('kelompok_mapel')->result();

        $this->load->library('Mypdf');
        $this->mypdf->generatehal5($this->vn . '/hal5', $data);
    }

    function hal6()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);

        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();
        $data['guru'] = $this->cetakrapor_m->getKepsek();

        $this->db->where('nisn', $id);
        $this->db->where('nilai_ekstrakulikuler.kodeTahun', $tahun);
        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_ekstrakulikuler.kodeTahun', 'left');
        $data['c'] = $this->db->get('nilai_ekstrakulikuler')->row();
        $this->db->where(
            'kodeKelas',
            $this->session->userdata('kodeKelas')
        );
        $this->db->join('guru', 'guru.nip = kelas.nip', 'left');
        $data['walikelas'] = $this->db->get('kelas')->row();


        $this->load->library('Mypdf');
        $this->mypdf->generatehal6($this->vn . '/hal6', $data);
        // $this->load->view($this->vn . '/hal6', $data);
    }

    function allrapor()
    {
        $data['title'] = $this->titles;
        $data['pageTitle'] = "Detail Data " . $this->titles;
        $id = $this->uri->segment(4);
        $data['row'] = $this->cetakrapor_m->getDataById($id);

        $this->load->library('Mypdf');
        $this->mypdf->generateraporcover($this->vn . '/cover', $data);
        //hal 1
        $id = $this->uri->segment(4);
        $tahun = $this->uri->segment(5);
        $data['row'] = $this->cetakrapor_m->getDataById($id);
        $data['data'] = $this->db->get('identitas_sekolah')->row();
        $data['guru'] = $this->cetakrapor_m->getKepsek();
        $this->db->where('nisn', $id);
        $this->db->where('nilai_capaianbelajar.kodeTahun', $tahun);

        $this->db->join('tahun_akademik', 'tahun_akademik.kodeTahun = nilai_capaianbelajar.kodeTahun', 'left');

        $data['c'] = $this->db->get('nilai_capaianbelajar')->row();

        $this->load->library('Mypdf');
        $this->mypdf->generatehal2($this->vn . '/hal2', $data);
    }

    function addAction()
    {
        $this->cetakrapor_m->save();
        redirect('penilaian/' . $this->vn);
    }


    function getJadwalPerhari()
    {
        $tahun_akademik = $_GET['tahun_akademik'];

        $data = $this->db->get('kelas')->result();
        if (empty($tahun_akademik)) :
            echo '<h3 class="text-center"> Silahkan Pilih Tahun Akademik Terlebih Dahulu </h3>';
        else :
            echo '<table id="basic-datatable" class="table  nowrap">';
            echo '<thead>
        <tr>
            <th>No</th>
            <th>Nama Kelas</th>
           
            <th><center>Aksi</center></th>
        </tr>
    </thead>';
            echo '<tbody>';
            $no = '1';
            foreach ($data as $row) :
                echo '<tr>
            <td> ' . $no++ . ' </td>
            <td> ' . $row->namaKelas . ' </td>
            
            <td>
            <div class="btn-group mb-0 text-center">
            <center> <a href=" cetakrapor/detail/' . $row->kodeKelas . '" class="btn btn-info btn-sm" data-toggle="tooltip" title="Klik Untuk Melihat Rapor Siswa"><i class="uil uil-clipboard">Klik Untuk Melihat Rapor Siswa</i></a></center>
                
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
