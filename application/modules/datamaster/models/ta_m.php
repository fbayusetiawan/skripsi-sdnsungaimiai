<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ta_m extends CI_Model
{

    public $namaTable = 'tahunajaran';
    public $pk = 'idTahunAjaran';

    function getAllData()
    {
        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function getDataByStat($Value)
    {
        $this->db->where('status', $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        if ($this->input->post('status') == '1') :
            $row = $this->getDataByStat('1');
            $object1 = [
                'status' => '0',
            ];
            $this->db->where($this->pk, $row->idTahunAjaran);
            $this->db->update($this->namaTable, $object1);
        else :
        endif;
        $object = $this->input->post();

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        if ($this->input->post('status') == '1') :
            $row = $this->getDataByStat('1');
            $object1 = [
                'status' => '0',
            ];
            $this->db->where($this->pk, $row->idTahunAjaran);
            $this->db->update($this->namaTable, $object1);
        else :
        endif;
        $object = $this->input->post();

        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }
}

/* End of file */
