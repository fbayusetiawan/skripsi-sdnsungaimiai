<?php
function cmb_dinamis($name, $table, $field, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function droplist_dinamais($name, $table, $field1, $field2, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field1 . " - " . $row->$field2 . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function droplist_filter($name, $table, $field1, $field2, $field3, $pk, $jenis, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $ci->db->where($table . '.idTahunAjaran', $ci->session->userdata('idta'));
    $ci->db->where($field3, $jenis);

    $ci->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = ' . $table . '.idTahunAjaran', 'left');
    $data = $ci->db->get($table)->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field1 . " - " . tgl_indo($row->$field2) . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function droplist_pembina($name,  $field1, $field2, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $ci->db->join('pegawai', 'pegawai.idpegawai = ekstrakulikuler.pembina', 'left');
    $data = $ci->db->get('ekstrakulikuler')->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field1 . " - " . $row->$field2 . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function droplist_pelatih($name,  $field1, $field2, $pk, $selected = null, $extra = NULL)
{
    $ci = &get_instance();
    $cmb = "<select name='$name'class='form-control'$extra>";
    $ci->db->join('ekstrakulikuler', 'ekstrakulikuler.idEks = pelatih.idEks', 'left');
    $data = $ci->db->get('pelatih')->result();
    foreach ($data as $row) {
        $cmb .= "<option value='" . $row->$pk . "'";
        $cmb .= $selected == $row->$pk ? 'selected' : '';
        $cmb .= ">" . $row->$field1 . " - " . $row->$field2 . "</option>";
    }
    $cmb .= "</select>";
    return $cmb;
}

function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}

function GetHonor($tableName, $idHonorarium, $jenisDana)
{
    $ci = &get_instance();
    $ci->db->select_sum('honor', 'honor');
    $ci->db->where('idHonorarium', $idHonorarium);
    $ci->db->where('jenisDana', $jenisDana);
    $hasil = $ci->db->get($tableName)->row();
    return $hasil->honor;
}
function GetDana($tableName, $selectsum, $idHonorarium, $jenisDana)
{
    $ci = &get_instance();
    $ci->db->select_sum($selectsum, $selectsum);
    $ci->db->where('idPembayaran', $idHonorarium);
    $ci->db->where('jenisDana', $jenisDana);
    $hasil = $ci->db->get($tableName)->row();
    return $hasil->$selectsum;
}
function GetDanaEks($tableName, $selectsum, $idHonorarium, $jenisDana)
{
    $ci = &get_instance();
    $ci->db->select_sum($selectsum, $selectsum);
    $ci->db->where('idEkskul', $idHonorarium);
    $ci->db->where('jenisDana', $jenisDana);
    $hasil = $ci->db->get($tableName)->row();
    return $hasil->$selectsum;
}

function call_ta($Value)
{
    $ci = &get_instance();
    $ci->db->where('idTahunAjaran', $Value);
    $result = $ci->db->get('tahunajaran')->row();

    return $result->tahunAjaran;
}

function ttd($idJenisPtk)
{
    $ci = &get_instance();
    $ci->db->where('idJenisPtk', $idJenisPtk);
    // $ci->db->join('jenis_ptk', 'jenis_ptk.idJenisPtk = guru.idJenisPtk', 'left');
    return $ci->db->get('guru')->row();
}

function get_ket($table, $where, $Value)
{
    $ci = &get_instance();
    $ci->db->where($where, $Value);
    $row = $ci->db->get($table)->row();
    return $row->keterangan;
}

function fd_hari($val = null)
{
    $option = [
        'Senin' => 'Senin',
        'Selasa' => 'Selasa',
        'Rabu' => 'Rabu',
        'Kamis' => 'Kamis',
        'Jumat' => 'Jumat',
        'Sabtu' => 'Sabtu',
    ];
    if (empty($val)) :
        return $option;
    else :
        return $option[$val];
    endif;
}

function getKehadiran($kodeJadwal, $nisn)
{
    $ci = &get_instance();

    $ci->db->where('nisn', $nisn);
    $ci->db->where('kodeJadwal', $kodeJadwal);
    return $ci->db->get('absensi_siswa')->num_rows();
}

function getKehadiranWhere($kodeJadwal, $nisn, $kehadiran)
{
    $ci = &get_instance();

    $ci->db->where('kehadiran', $kehadiran);
    $ci->db->where('nisn', $nisn);
    $ci->db->where('kodeJadwal', $kodeJadwal);
    return $ci->db->get('absensi_siswa')->num_rows();
}