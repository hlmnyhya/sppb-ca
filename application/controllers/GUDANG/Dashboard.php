<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = "Dashboard | SPPB";
		$data['total_permohonan'] = $this->M_count->total_permohonan();
		$data['total_permohonan_maintenance'] = $this->M_count->total_permohonan_maintenance();
		$data['total_permohonan_proses'] = $this->M_count->total_permohonan_proses();
		$data['total_permohonan_lab'] = $this->M_count->total_permohonan_lab();
		$data['total_permohonan_kantor'] = $this->M_count->total_permohonan_kantor();
		$data['total_user'] = $this->M_count->total_user();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_gudang');
		$this->load->view('gudang/dashboard',$data);
		$this->load->view('template/footer');
	}
}