<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subitem extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
	$this->load->library('upload');
	}

	public function index()
	{
		$data['title'] = "Data Subitem | SPPB";
		$data['subitem'] = $this->M_sub_item->show_data();
		$data['item'] = $this->M_permohonan->tampil_item();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/sub_item/sub_item',$data);
		$this->load->view('template/footer');
	}

	public function _rules()
	{
		 $this->form_validation->set_rules('nama_sub_item', 'sub_item', 'required');
		
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
        $nama_sub_item = htmlspecialchars($this->input->post('nama_sub_item'));
        $id_master_item = htmlspecialchars($this->input->post('id_master_item'));

        $data = array(
            'nama_sub_item' => $nama_sub_item,
            'id_master_item' => $id_master_item,
        );

        $inserted = $this->M_sub_item->insert_data($data, 'sub_item');

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

    redirect('subitem');
    }

}