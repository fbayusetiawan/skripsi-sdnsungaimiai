<?php

class Mcrud extends CI_Model
{
    public function update($table, $data, $where)
    {
        $this->db->where($where)
            ->insert($table, $data);
        return TRUE;
    }
}
