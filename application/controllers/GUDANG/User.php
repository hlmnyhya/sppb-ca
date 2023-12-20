<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
	$this->load->library('upload');
	}

	public function index()
	{
		$data['title'] = "Data User | SPPB";
		$data['divisi'] = $this->M_divisi->tampil_divisi();
		$data['level'] = $this->M_level->tampil_level();
		$data['users'] = $this->M_users->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/user/user',$data);
		$this->load->view('template/footer');
	}

	public function Profil()
	{
		$data['title'] = "Data User | SPPB";
		$this->load->view('template/header', $data);
        $this->load->view('template/sidebar_gudang');
        $this->load->view('gudang/profil', $data);
        $this->load->view('template/footer');
	}

	public function Detail_User($user_id) 
	{
        $data['users'] = $this->M_users->get_user_by_id($user_id);
        $data['title'] = "Detail User | SPPB";

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_admin');
        $this->load->view('admin/user/detail_user', $data);
        $this->load->view('template/footer');
    }

	public function Tambah_User()
	{
		$data['title'] = "Data User | SPPB";
		$data['divisi'] = $this->M_divisi->tampil_divisi();
		$data['users'] = $this->M_users->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_admin');
		$this->load->view('admin/user/tambah_user',$data);
		$this->load->view('template/footer');
	}

	public function tambah_data_aksi() 
	{
	    $nama = htmlspecialchars($this->input->post('nama'));
	    $nip = htmlspecialchars($this->input->post('nip'));
	    $id_divisi = htmlspecialchars($this->input->post('id_divisi'));
	    $id_level = htmlspecialchars($this->input->post('id_level'));
	    $username = htmlspecialchars($this->input->post('username'));
	    $password = md5($this->input->post('password')); 

	    // Konfigurasi upload gambar profil
	    $config_profil['upload_path'] = './uploads/profil/'; 
	    $config_profil['allowed_types'] = 'gif|jpg|jpeg|png';
	    $config_profil['max_size'] = 4096;

	    // Inisialisasi library upload untuk gambar profil
	    $this->load->library('upload', $config_profil);
		$this->upload->initialize($config_profil);

	    // Memeriksa apakah upload gambar profil berhasil atau tidak
	    if (!$this->upload->do_upload('gambar')) {
	        // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
	        $error = $this->upload->display_errors();
	        $this->session->set_flashdata('error', $error);
	    } else {
	        // Jika upload gambar profil berhasil, dapatkan nama file gambar
	        $data_gambar = $this->upload->data();
	        $gambar = $data_gambar['file_name'];

	        // Konfigurasi upload gambar tanda tangan
	        $config_ttd['upload_path'] = './uploads/ttd/'; 
	        $config_ttd['allowed_types'] = 'gif|jpg|jpeg|png';
	        $config_ttd['max_size'] = 4096;

	        // Inisialisasi library upload untuk gambar tanda tangan
	        $this->upload->initialize($config_ttd);

	        // Memeriksa apakah upload gambar tanda tangan berhasil atau tidak
	        if (!$this->upload->do_upload('gambar_ttd')) {
	            // Jika upload gagal, atur pesan validasi dan kembali ke halaman sebelumnya
	            $error_ttd = $this->upload->display_errors();
	            $this->session->set_flashdata('error', $error_ttd);
	        } else {
	            // Jika upload gambar tanda tangan berhasil, dapatkan nama file gambar tanda tangan
	            $data_ttd = $this->upload->data();
	            $gambar_ttd = $data_ttd['file_name'];

	            // Menyimpan data ke database
	            $data = array(
	                'nama' => $nama,
	                'nip' => $nip,
	                'id_divisi' => $id_divisi,
	                'id_level' => $id_level,
	                'username' => $username,
	                'password' => $password,
	                'gambar' => $gambar,
	                'gambar_ttd' => $gambar_ttd,
	            );

	            $inserted = $this->M_users->insert_data($data, 'users');

	            if ($inserted) {
	                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
	                    <strong>Data berhasil ditambahkan!</strong>
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
	    }

	    redirect('user'); // Redirect ke halaman users setelah penambahan data
	}

}
