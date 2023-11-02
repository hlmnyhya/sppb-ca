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

    public function edit_sub_item($id_sub_item)
	{
		$where = array('id_sub_item' => $id_sub_item);
		$data['title'] = "Data Subitem | SPPB";
		$data['users'] = $this->db->query("SELECT * FROM sub_item WHERE id_sub_item = '$id_sub_item'")->result();
		$data['item'] = $this->M_item->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/sub_item/ubah_sub_item',$data);
		$this->load->view('template/footer');
	}


	public function _rules()
	{
		// $this->form_validation->set_rules('nama_sub_item', 'Nama Sub Item', 'required');
        // $this->form_validation->set_rules('id_master_item', 'ID Master Item', 'required');
        // $this->form_validation->set_rules('id_sub_item', 'ID Sub Item', 'required');

		
	}

//     public function tambah_data_aksi()
//     {
//     // $this->_rules();

//     if ($this->form_validation->run() == FALSE) {
//         $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//             <strong>Validasi Form Gagal!</strong> Silakan isi formulir dengan benar.
//             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                 <span aria-hidden="true">&times;</span>
//             </button>
//         </div>');
//     } else {
//         $nama_sub_item = htmlspecialchars($this->input->post('nama_sub_item'));
//         $id_master_item = htmlspecialchars($this->input->post('id_master_item'));
//         $id_sub_item = htmlspecialchars($this->input->post('id_sub_item'));

//         $data = array(
//             'nama_sub_item' => $nama_sub_item,
//             'id_master_item' => $id_master_item,
//             'id_sub_item' => $id_sub_item,
//         );

//         $inserted = $this->M_sub_item->insert_data($data, 'sub_item');

//         var_dump($inserted);exit;

//         if ($inserted) {
//             $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
//                 <strong>Data berhasil ditambahkan !</strong>
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//             </div>');
//         } else {
//             $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//                 <strong>Gagal menambahkan data.</strong> Silakan coba lagi nanti.
//                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                     <span aria-hidden="true">&times;</span>
//                 </button>
//             </div>');
//         }
//     }

//     redirect('subitem');
// }

    public function tambah_data_aksi()
    {
    $id_master_item = $this->input->post('id_master_item');
    $nama_sub_item = htmlspecialchars($this->input->post('nama_sub_item'));

    $data = array(
        'id_master_item' => $id_master_item,
        'nama_sub_item' => $nama_sub_item,
    );

    $inserted = $this->db->insert('sub_item', $data);

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

    redirect('subitem');
    }


    public function update_data_aksi()
{
        $id_sub_item = $this->input->post('id_sub_item');
        $id_master_item = $this->input->post('id_master_item');
        $nama_sub_item = htmlspecialchars($this->input->post('nama_sub_item'));

        $data = array(
            'id_master_item' => $id_master_item,
            'nama_sub_item' => $nama_sub_item,
        );

        $where = array(
            'id_sub_item' => $id_sub_item
        );

        $updated = $this->M_sub_item->update_data('sub_item', $data, $where);

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
    

    redirect('subitem');
}


public function delete_data_aksi($id_sub_item)
{
    $where = array('id_sub_item' => $id_sub_item);
    $deleted = $this->M_sub_item->delete_data($where, 'sub_item');

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
    redirect('subitem');
}

}