<?php

defined('BASEPATH') or exit('No direct script access allowed');

class dash_m extends CI_Model
{


    function getDana($Value)
    {
        $this->db->select_sum('jumlah', 'dana');
        $this->db->where('jenis', $Value);
        $result = $this->db->get('danamasuk')->row();
        return $result->dana;
    }

    function honorarium($jenis, $table)
    {
        $ta = $this->session->userdata('idta');
        $this->db->select_sum('honor', 'honor');
        $this->db->where('jenisDana', $jenis);
        $this->db->where('idTahunAjaran', $ta);
        $this->db->join('honorarium',  'honorarium.idHonorarium = ' . $table . '.idHonorarium', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }

    function qdinamis($jenis, $table, $sum, $join, $pk)
    {
        $this->db->select_sum($sum, 'honor');
        $this->db->where('jenisDana', $jenis);
        $this->db->join($join,  $join . '.' . $pk . ' = ' . $table . '.' . $pk . '', 'left');
        $result = $this->db->get($table)->row();
        return $result->honor;
    }
}

/* End of file dash_m.php */
