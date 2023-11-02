<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Divisi extends CI_Controller {

	public function index()
	{
		$data['title'] = "Data Divisi | SPPB";
		$data['divisi'] = $this->M_divisi->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/divisi/divisi',$data);
		$this->load->view('template/footer');
	}

	public function _rules()
	{
		 $this->form_validation->set_rules('divisi', 'Divisi', 'required');
		
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
        $divisi = htmlspecialchars($this->input->post('divisi'));

        $data = array(
            'divisi' => $divisi,
        );

        $inserted = $this->M_divisi->insert_data($data, 'divisi');

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

    redirect('divisi');
}

}