<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Periode_m extends CI_Model
{
    public function getDataPeriode()
    {
        return $this->db->get('periode')->result();
    }
}
