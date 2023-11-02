<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sub_item extends CI_Model
{
    public function show_data()
    {
    return  $this->db->query(" SELECT sub_item.id_sub_item, sub_item.id_master_item, sub_item.nama_sub_item, master_item.nama_item
FROM sub_item
INNER JOIN master_item ON sub_item.id_master_item = master_item.id_master_item;")->result();
    }
    public function insert_data($data, $table)
    {
       return $this->db->insert($table, $data);
    }

    public function update_data($table, $data, $where)
    {
        return $this->db->update($table, $data, $where);
    }

    public function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

   

}