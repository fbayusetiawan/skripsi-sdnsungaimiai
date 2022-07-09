<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('dash_m', 'primaryModel');
    }


    public function index()
    {
        $data['tdbd'] = $this->bosda();
        $data['tdbn'] = $this->bosnas();
        //Honorarium
        //wali Kelas
        $data['thwkd'] = $this->primaryModel->honorarium(1, 'h_walikelas');
        $data['thwkn'] = $this->primaryModel->honorarium(2, 'h_walikelas');
        //Pengajar
        $data['thpd'] = $this->primaryModel->honorarium(1, 'h_pengajar');
        $data['thpn'] = $this->primaryModel->honorarium(2, 'h_pengajar');
        //tata usaha
        $data['thtud'] = $this->primaryModel->honorarium(1, 'h_tatausaha');
        $data['thtun'] = $this->primaryModel->honorarium(2, 'h_tatausaha');
       
        $data['data'] = json_encode($this->db->query("SELECT keterangan, SUM(debit) as pengeluaran FROM `akuntan` WHERE debit != '0' GROUP BY fk")->result());
        $data['title'] = 'Dashboard';
        $data['pageTitle'] = 'Dashboard';
        $this->template->load('template', 'admin/dashboard/dash', $data);
    }

    function bosda()
    {
        $tdbd = $this->primaryModel->getDana(1);
        
        $a = $this->primaryModel->qdinamis(1, 'h_walikelas', 'honor', 'honorarium', 'idHonorarium');
        $b = $this->primaryModel->qdinamis(1, 'h_pengajar', 'honor', 'honorarium', 'idHonorarium');
        $c = $this->primaryModel->qdinamis(1, 'h_tatausaha', 'honor', 'honorarium', 'idHonorarium');
        $kurang = $a + $b + $c;
        return $tdbd - $kurang;
    }

    function bosnas()
    {
        $tdbn = $this->primaryModel->getDana(2);
        
        $a = $this->primaryModel->qdinamis(2, 'h_walikelas', 'honor', 'honorarium', 'idHonorarium');
        $b = $this->primaryModel->qdinamis(2, 'h_pengajar', 'honor', 'honorarium', 'idHonorarium');
        $c = $this->primaryModel->qdinamis(2, 'h_tatausaha', 'honor', 'honorarium', 'idHonorarium');
        
        $kurang = $a + $b + $c;
        return $tdbn - $kurang;
    }
}

/* End of file dashboard.php */
