<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_count extends CI_Model
{
// ADMIN
public function total_permohonan() {
    return $this->db->count_all('permohonan');
}
public function total_permohonan_diperiksa() {
    $this->db->where('status', 'diperiksa');
    return $this->db->count_all_results('permohonan');
}
public function total_permohonan_disetujui() {
    $this->db->where('status', 'disetujui');
    return $this->db->count_all_results('permohonan');
}
public function total_user() {
    return $this->db->count_all('users');
}

// KTU
public function total_permohonan_maintenance() {
    $this->db->where('id_divisi', '2');
    return $this->db->count_all_results('permohonan');
}
public function total_permohonan_proses() {
    $this->db->where('id_divisi', '3');
    return $this->db->count_all_results('permohonan');
}
public function total_permohonan_lab() {
    $this->db->where('id_divisi', '4');
    return $this->db->count_all_results('permohonan');
}
public function total_permohonan_kantor() {
    $this->db->where('id_divisi', '5');
    return $this->db->count_all_results('permohonan');
}
}
