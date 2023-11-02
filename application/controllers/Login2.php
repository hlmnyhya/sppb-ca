<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('M_user');
    }
	
	public function index()
	{
		$data['title'] = "SPPB | CANDI ARTHA";
		$this->load->view('login', $data);
	}
    public function auth()
    {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() == FALSE) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Username dan Password wajib diisi!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>');
        redirect('login');
    } else {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
    
        $cek = $this->M_akun->cek_login($username, $password);
    
        if (!$cek) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Username atau Password salah!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('login');
        } else {
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('id_role', $cek->id_role);
            $this->session->set_userdata('username', $cek->username);
            $this->session->set_userdata('id_user', $cek->id_user);
    
            switch ($cek->id_role) {
                case 1: 
                    redirect('index');
                    break;
                case 2:
                    redirect('pegawai');
                    break;
                
                default:
                    // If id_role is not valid, clear session and redirect to login page
                    $this->session->unset_userdata('logged_in');
                    $this->session->unset_userdata('id_role');
                    $this->session->unset_userdata('username');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda tidak memiliki akses ke halaman ini!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                    redirect('login');
                    break;
            }
        }
    }
}

public function logout()
{
    $this->session->unset_userdata('logged_in');
    $this->session->unset_userdata('id_role');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('id_user');
    $this->session->sess_destroy();
    redirect('login');
}


}