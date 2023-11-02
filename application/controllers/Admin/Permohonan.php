<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function index()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$data['item'] = $this->M_permohonan->tampil_item();
		$data['subitem'] = $this->M_permohonan->tampil_subitem();
		$data['divisi'] = $this->M_divisi->tampil_divisi();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/permohonan/permohonan',$data);
		$this->load->view('template/footer');
	}

	public function Tambah_Item($id_permohonan) 
	{
		$where = array('id_permohonan' => $id_permohonan);
		$data['title'] = "Data Permohonan | SPPB";
		$data['users'] = $this->db->query("SELECT * FROM permohonan WHERE id_permohonan = '$id_permohonan'")->result();
		$data['item'] = $this->M_permohonan->tampil_item();
		$data['subitem'] = $this->M_permohonan->tampil_subitem();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/permohonan/tambah_item', $data);	
        $this->load->view('template/footer');
    }


	public function Detail_Permohonan($id_permohonan)
	{
		$where = array('id_permohonan' => $id_permohonan);
		$data['title'] = "Data Permohonan | SPPB";
		$data['users'] = $this->db->query("SELECT trans_item.*, master_item.id_master_item, master_item.nama_item, sub_item.id_sub_item, sub_item.nama_sub_item
FROM trans_item
LEFT JOIN master_item ON trans_item.id_master_item = master_item.id_master_item
LEFT JOIN sub_item ON trans_item.id_sub_item = sub_item.id_sub_item
WHERE trans_item.id_permohonan = '$id_permohonan';
")->result();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/permohonan/detail_permohonan', $data);
        $this->load->view('template/footer');
	}

	public function edit_permohonan_item($id_trans_item)
	{
		$where = array('id_trans_item' => $id_trans_item);
		$data['users'] = $this->db->query("SELECT trans_item.*, master_item.id_master_item, master_item.nama_item, sub_item.id_sub_item, sub_item.nama_sub_item
FROM trans_item
LEFT JOIN master_item ON trans_item.id_master_item = master_item.id_master_item
LEFT JOIN sub_item ON trans_item.id_sub_item = sub_item.id_sub_item
WHERE trans_item.id_trans_item = '$id_trans_item';")->result();
		$data['title'] = "Data Permohonan | SPPB";
		$data['item'] = $this->M_permohonan->tampil_item();
		$data['subitem'] = $this->M_permohonan->tampil_subitem();
		$data['divisi'] = $this->M_divisi->tampil_divisi();
		$data['level'] = $this->M_level->tampil_level();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/permohonan/ubah_permohonan_item',$data);
		$this->load->view('template/footer');
	}

	public function edit_permohonan($id_permohonan)
	{
		$where = array('id_permohonan' => $id_permohonan);
		$data['users'] = $this->db->query("SELECT * FROM permohonan WHERE id_permohonan = '$id_permohonan'")->result();
		$data['title'] = "Data Permohonan | SPPB";
		$data['divisi'] = $this->M_divisi->tampil_divisi();
		$data['level'] = $this->M_level->tampil_level();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/permohonan/ubah_permohonan',$data);
		$this->load->view('template/footer');
	}


	public function tambah_data_aksi_item() 
	{
		 $data = array(
            'id_permohonan' => $this->input->post('id_permohonan'),
            'id_master_item' => $this->input->post('id_master_item'),
            'id_sub_item' => $this->input->post('id_sub_item'),
            'kode' => $this->input->post('kode'),
            'satuan' => $this->input->post('satuan'),
            'stok' => $this->input->post('stok'),
            'fisik' => $this->input->post('fisik'),
            'uraian' => $this->input->post('uraian'),
            'keterangan' => $this->input->post('keterangan'),
        );

		$inserted = $this->M_permohonan->insert_data($data, 'trans_item');

	    if ($inserted) {
	        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade sho    role="alert">
	            <strong>Data berhasil ditambahkan!</strong>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
	    } else {
	        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade sho    role="alert">
	            <strong>Gagal menambahkan data.</strong> Silakan coba lagi nanti.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
	    }

		redirect('permohonan');
	}

	public function update_data_aksi_item() 
{
    $id_trans_item = $this->input->post('id_trans_item'); // Ambil ID transaksi dari formulir
    $data = array(
        'id_permohonan' => $this->input->post('id_permohonan'),
        'id_master_item' => $this->input->post('id_master_item'),
        'id_sub_item' => $this->input->post('id_sub_item'),
        'kode' => $this->input->post('kode'),
        'satuan' => $this->input->post('satuan'),
        'stok' => $this->input->post('stok'),
        'fisik' => $this->input->post('fisik'),
        'uraian' => $this->input->post('uraian'),
        'keterangan' => $this->input->post('keterangan'),
    );

    $where = array('id_trans_item' => $id_trans_item); // Kondisi WHERE berdasarkan ID transaksi

    $updated = $this->M_permohonan->update_data($data, 'trans_item', $where); // Panggil fungsi update_data

    if ($updated) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal mengupdate data.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('permohonan');
}

	public function tambah_data_aksi() 
	{
		 $data = array(
            'nomor_sppb' => $this->input->post('nomor_sppb'),
			'id_users' => $this->session->userdata('id_users'),
            'id_divisi' => $this->input->post('id_divisi'),
            'nama_pemohon' => $this->input->post('nama_pemohon'),
            'tanggal' => $this->input->post('tanggal'),
            'status' => $this->input->post('status')
        );

		$inserted = $this->M_permohonan->insert_data($data, 'permohonan');

	    if ($inserted) {
	        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade sho    role="alert">
	            <strong>Data berhasil ditambahkan!</strong>
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
	    } else {
	        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade sho    role="alert">
	            <strong>Gagal menambahkan data.</strong> Silakan coba lagi nanti.
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                <span aria-hidden="true">&times;</span>
	            </button>
	        </div>');
	    }

		redirect('permohonan');
	}

	public function update_data_aksi() {
    $id_permohonan = $this->input->post('id_permohonan');
    $data = array(
        'nomor_sppb' => $this->input->post('nomor_sppb'),
        'id_divisi' => $this->input->post('id_divisi'),
        'nama_pemohon' => $this->input->post('nama_pemohon'),
        'tanggal' => $this->input->post('tanggal'),
        'status' => $this->input->post('status')
    );

    $where = array('id_permohonan' => $id_permohonan);

    $updated = $this->M_permohonan->update_data('permohonan', $data, $where);

    if ($updated) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil diupdate!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal mengupdate data.</strong> Silakan coba lagi nanti.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }

    redirect('permohonan');
}


	public function delete_data_aksi_permohonan($id_permohonan)
{
    $where = array('id_permohonan' => $id_permohonan);
    $deleted = $this->M_permohonan->delete_data($where, 'permohonan');

    if ($deleted) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan');
}
	public function delete_data_aksi_permohonan_item($id_trans_item)
{
    $where = array('id_trans_item' => $id_trans_item);
    $deleted = $this->M_permohonan->delete_data($where, 'trans_item');

    if ($deleted) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
         $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data berhasil dihapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    }
    redirect('permohonan');
}
}