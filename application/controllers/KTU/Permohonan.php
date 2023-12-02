<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function index()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_ktu');
		$this->load->view('ktu/permohonan/permohonan_maintenance',$data);
		$this->load->view('template/footer');
	}

public function update_diperiksa_proses($id_permohonan) 
{
    $where = array('id_permohonan' => $id_permohonan);
    $status = $this->db->get_where('permohonan', $where)->row()->status;

    if ($status != 'Disetujui') {
        // Ambil ttd_ktu dari session
        $ttd_ktu = $this->session->userdata('gambar_ttd');
            
        $nama_pemeriksa = $this->session->userdata('nama');

        // Data yang akan diupdate
        $update_data = array(
            'status' => 'Diperiksa',
                'ttd_ktu' => $ttd_ktu,
            'nama_pemeriksa' => $nama_pemeriksa, 
        );

        // Lakukan update data
        $this->db->where($where);
        $this->db->update('permohonan', $update_data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diperiksa!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal memperiksa data.</strong> Data sudah disetujui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan_proses');
}


public function update_diperiksa_maintenance($id_permohonan) 
{
    $where = array('id_permohonan' => $id_permohonan);
    $status = $this->db->get_where('permohonan', $where)->row()->status;

    if ($status != 'Disetujui') {
        // Ambil ttd_ktu dari session
        $ttd_ktu = $this->session->userdata('gambar_ttd');
        $nama_pemeriksa = $this->session->userdata('nama');
        // Data yang akan diupdate
        $update_data = array(
            'status' => 'Diperiksa',
            'ttd_ktu' => $ttd_ktu,
            'nama_pemeriksa' => $nama_pemeriksa, 
        );

        // Lakukan update data
        $this->db->where($where);
        $this->db->update('permohonan', $update_data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diperiksa!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal memperiksa data.</strong> Data sudah disetujui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan_maintenance');
}

public function update_diperiksa_lab($id_permohonan) 
{
      $where = array('id_permohonan' => $id_permohonan);
    $status = $this->db->get_where('permohonan', $where)->row()->status;

    if ($status != 'Disetujui') {
        // Ambil ttd_ktu dari session
        $ttd_ktu = $this->session->userdata('gambar_ttd');
        $nama_pemeriksa = $this->session->userdata('nama');
        // Data yang akan diupdate
        $update_data = array(
            'status' => 'Diperiksa',
            'ttd_ktu' => $ttd_ktu,
            'nama_pemeriksa' => $nama_pemeriksa,
        );

        // Lakukan update data
        $this->db->where($where);
        $this->db->update('permohonan', $update_data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diperiksa!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal memperiksa data.</strong> Data sudah disetujui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan_lab');
}

public function update_diperiksa_kantor($id_permohonan) 
{
     $where = array('id_permohonan' => $id_permohonan);
    $status = $this->db->get_where('permohonan', $where)->row()->status;

    if ($status != 'Disetujui') {
        // Ambil ttd_ktu dari session
        $ttd_ktu = $this->session->userdata('gambar_ttd');
        $nama_pemeriksa = $this->session->userdata('nama');
        // Data yang akan diupdate
        $update_data = array(
            'status' => 'Diperiksa',
            'ttd_ktu' => $ttd_ktu,
            'nama_pemeriksa' => $nama_pemeriksa, 
        );

        // Lakukan update data
        $this->db->where($where);
        $this->db->update('permohonan', $update_data);

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diperiksa!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal memperiksa data.</strong> Data sudah disetujui.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan_kantor');
}



	public function Detail_Permohonan($id_permohonan)
	{
		$where = array('id_permohonan' => $id_permohonan);
		$data['title'] = "Data Permohonan | SPPB";
		$data['users'] = $this->db->query("SELECT * FROM trans_item WHERE id_permohonan = '$id_permohonan'")->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_ktu');
        $this->load->view('ktu/permohonan/detail_permohonan', $data);
        $this->load->view('template/footer');
	}

	public function permohonan_proses()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_ktu');
		$this->load->view('ktu/permohonan/permohonan_proses',$data);
		$this->load->view('template/footer');
	}

	public function permohonan_lab()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_ktu');
		$this->load->view('ktu/permohonan/permohonan_lab',$data);
		$this->load->view('template/footer');
	}

	public function permohonan_kantor()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_ktu');
		$this->load->view('ktu/permohonan/permohonan_kantor',$data);
		$this->load->view('template/footer');
	}
}