<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = "Dashboard | SPPB";
		$data['total_permohonan'] = $this->M_count->total_permohonan();
		$data['total_permohonan_diperiksa'] = $this->M_count->total_permohonan_diperiksa();
		$data['total_permohonan_disetujui'] = $this->M_count->total_permohonan_disetujui();
		$data['total_user'] = $this->M_count->total_user();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_users');
		$this->load->view('users/dashboard',$data);
		$this->load->view('template/footer');
	}
}