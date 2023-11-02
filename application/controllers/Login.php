<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$data['title'] = "SPPB | CANDI ARTHA";
        $this->load->view('template/header', $data);
        $this->load->view('login');
		$this->load->view('template/footer');
	}

  public function process_login() 
{
    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));

    $user = $this->M_users->cek_login($username, $password);

    $query = $this->db->query("SELECT id_users FROM users WHERE username='$username'");
    $result = $query->row(); 
    $query2 = $this->db->query("SELECT users.id_users, users.id_level, users.nama, users.nip, users.id_divisi, users.username, users.password, users.gambar, users.gambar_ttd, users.created_at, users.updated_at, divisi.divisi
FROM users
JOIN divisi ON users.id_divisi = divisi.id_divisi

 WHERE username='$username'");
    $result2 = $query2->row(); 
   if ($user) {
        // Mengambil nama divisi dari tabel divisi berdasarkan id_divisi pengguna
        $divisi = $this->M_divisi->get_divisi_by_id($user->id_divisi);
        $divisi_nama = $divisi->nama_divisi;

        $result->id_users;
        $result2->divisi;

        // Menyimpan data ke dalam sesi
        $userdata = array(
        'id_users' => $result->id_users,
        'username' => $user->username,
        'nama' => $user->nama,
        'nip' => $user->nip,
        'id_divisi' => $user->id_divisi,
        'divisi' => $result2->divisi,
        'gambar' => $user->gambar,
        'gambar_ttd' => $user->gambar_ttd,
    );

    // var_dump($result2);exit;
        $this->session->set_userdata($userdata);
        switch ($user->id_level) {
            case 1:
                redirect('dashboard');
                break;
            case 2:
                redirect('dashboard_manajer');
                break;
            case 3:
                redirect('dashboard_ktu');
                break;
            case 4:
                redirect('dashboard_gudang');
                break;
            case 5:
                redirect('dashboard_user');
                break;
            default:
                // Redirect to login or error page for invalid id_level
                redirect('login');
                break;
        }
    } else {
        // Login failed, redirect back to login page with error message
        $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Username dan Password Salah.</strong> <br> Silakan coba lagi.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('login');
    }
}


    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('login');
    }
}