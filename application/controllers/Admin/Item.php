<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
	$this->load->library('upload');
	}

	public function index()
	{
		$data['title'] = "Data Item | SPPB";
		$data['item'] = $this->M_item->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/item/item',$data);
		$this->load->view('template/footer');
	}

	public function edit_item($id_master_item)
	{
		$where = array('id_master_item' => $id_master_item);
		$data['title'] = "Data Item | SPPB";
		$data['users'] = $this->db->query("SELECT * FROM master_item WHERE id_master_item = '$id_master_item'")->result();
		$data['item'] = $this->M_item->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/item/ubah_item',$data);
		$this->load->view('template/footer');
	}

    public function _rules()
	{
		 $this->form_validation->set_rules('nama_item', 'item', 'required');
		
	}

    public function tambah_data_aksi()
    {
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $nama_item = htmlspecialchars($this->input->post('nama_item'));

        $data = array(
            'nama_item' => $nama_item,
        );

        $inserted = $this->M_item->insert_data($data, 'master_item');

        if ($inserted) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil ditambahkan !</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        } else {
            $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal menambahkan data.</strong> Silakan coba lagi nanti.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        }
    }

    redirect('item');
    }

    public function update_data_aksi()
{
    $this->_rules();

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $id_master_item = $this->input->post('id_master_item');
        $nama_item = htmlspecialchars($this->input->post('nama_item'));

        $data = array(
            'nama_item' => $nama_item,
        );

        $where = array(
            'id_master_item' => $id_master_item
        );

        // Menyertakan nama tabel ('master_item') sebagai parameter pertama
        $updated = $this->M_item->update_data('master_item', $data, $where);

        if ($updated) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data berhasil diupdate !</strong>
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
    }

    redirect('item');
}

public function delete_data_aksi($id_master_item)
{
    $where = array('id_master_item' => $id_master_item);
    $deleted = $this->M_item->delete_data($where, 'master_item');

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
    redirect('item');
}

}