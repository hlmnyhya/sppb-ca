<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_permohonan extends CI_Model
{
    public function show_data()
    {
    return  $this->db->query("SELECT p.id_permohonan, p.nomor_sppb, p.id_divisi, p.nama_pemohon, p.tanggal, p.status, d.divisi
FROM permohonan p
INNER JOIN divisi d ON p.id_divisi = d.id_divisi;")->result();
    }

    public function tampil_item()
    {
        return  $this->db->query("SELECT * FROM master_item")->result();
    }
    public function tampil_subitem()
    {
        return  $this->db->query("SELECT * FROM sub_item")->result();
    }
    public function insert_data($data, $table)
    {
       return $this->db->insert($table, $data);
    }
    public function insert_data_item($data, $table, $where)
    {
       return $this->db->insert($table, $data, $where);
    }

    public function get_permohonan_by_id($id_permohonan) 
    {
    $this->db->select('permohonan.*, divisi.divisi');
    $this->db->from('permohonan');
    $this->db->join('divisi', 'permohonan.id_divisi = divisi.id_divisi', 'left');
    $this->db->where('permohonan.id_permohonan', $id_permohonan);
    $query = $this->db->get();
    $result = $query->row();
    return $result;
    }

    // public function view()
    // {
    // return $this->db->get('master_item')->result(); // Tampilkan semua data yang ada di tabel provinsi
    // }

    // public function tampil_subitem($id_master_item) 
    // {
    //     $this->db->where('id_master_item', $id_master_item);
    //     $result = $this->db->get('sub_item')->result(); 
    //     return $result; 
    // }
    
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