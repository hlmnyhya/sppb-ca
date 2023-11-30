<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_divisi extends CI_Model
{
    public function show_data()
    {
        return $this->db->get('divisi')->result();
    }

    public function insert_data($data, $table)
    {
       ($this->db->insert($table, $data));
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

    public function detail_data($id_akun)
    {
        $query = $this->db->query("SELECT * FROM user")->row();
        return $query;
    }

        public function tampil_divisi()
        {
            return  $this->db->query("SELECT * FROM divisi")->result();
        }

    public function get_divisi_by_id($user_id) {
        $this->db->select('divisi.divisi, divisi.id_divisi');
        $this->db->from('divisi');
        $this->db->join('users', 'users.id_divisi = divisi.id_divisi');
        $this->db->where('users.id_users', $user_id);
        $query = $this->db->get();

        // Mengembalikan objek hasil query
        return $query->row();
    }
}