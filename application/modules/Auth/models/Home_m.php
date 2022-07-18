<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home_m extends CI_Model
{

    public $namaTable = "berita";
    public $pk = "idBerita";


    function getAllBerita()
    {
        $this->db->where('isActive', '1');
        return $this->db->get('berita')->result();
    }

    function getBeritaById($Value)
    {
        $this->db->where('idBerita', $Value);
        return $this->db->get('berita')->row();
    }
}

/* End of file Home_m.php */
