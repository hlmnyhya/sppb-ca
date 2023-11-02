<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Print_KTU extends CI_Controller {

    public function cetak_ktu($id_permohonan)
    {
        $where = array('id_permohonan' => $id_permohonan);
        $data['print'] = $this->db->query("SELECT ti.`id_trans_item`, ti.`id_permohonan`, ti.`id_master_item`, ti.`id_sub_item`, ti.`kode`, ti.`satuan`, ti.`stok`, ti.`fisik`, ti.`uraian`, ti.`keterangan`,
        p.`nomor_sppb`, p.`nama_pemohon`, p.`tanggal`, p.`status`,p.`ttd_ktu`, p.`ttd_pemohon`, p.`ttd_manajer`,
        mi.`nama_item`,
        si.`nama_sub_item`,
        d.`divisi`,
        u.`gambar_ttd`
        FROM `trans_item` ti
        JOIN `permohonan` p ON ti.`id_permohonan` = p.`id_permohonan`
        JOIN `master_item` mi ON ti.`id_master_item` = mi.`id_master_item`
        JOIN `sub_item` si ON ti.`id_sub_item` = si.`id_sub_item`
        JOIN `divisi` d ON p.`id_divisi` = d.`id_divisi`
        JOIN `users` u ON p.`id_users` = u.`id_users`
        WHERE p.`id_permohonan` = ?;", array($id_permohonan))->result();
        $data['ttd'] = $this->db->query("SELECT ttd_ktu, ttd_pemohon, ttd_manajer FROM permohonan WHERE id_permohonan = ?;", array($id_permohonan))->result();
        $data['title'] = "SPPB";
        $this->load->view('template/header',$data);
        $this->load->view('ktu/print_ktu', $data);
    }
}
