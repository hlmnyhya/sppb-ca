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

    public function edit_divisi($id_divisi)
	{
		$where = array('id_divisi' => $id_divisi);
		$data['title'] = "Data Divisi | SPPB";
		$data['users'] = $this->db->query("SELECT * FROM divisi WHERE id_divisi = '$id_divisi'")->result();
		$data['item'] = $this->M_item->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/divisi/ubah_divisi',$data);
		$this->load->view('template/footer');
	}

	public function tambah_data_aksi()
{
    $divisi = htmlspecialchars($this->input->post('divisi'));

    if (empty($divisi)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
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


public function update_data_aksi()
{
    $id_divisi = $this->input->post('id_divisi');
    $divisi = htmlspecialchars($this->input->post('divisi'));

    if (empty($divisi)) {
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>');
    } else {
        $data = array(
            'divisi' => $divisi,
        );

        $where = array(
            'id_divisi' => $id_divisi,
        );

        // Menyertakan nama tabel ('master_item') sebagai parameter pertama
        $updated = $this->M_divisi->update_data('divisi', $data, $where);

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

    redirect('divisi');
}


public function delete_data_aksi($id_divisi)
{
    $where = array('id_divisi' => $id_divisi);
    $deleted = $this->M_divisi->delete_data($where, 'divisi');

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
    redirect('divisi');
}

}