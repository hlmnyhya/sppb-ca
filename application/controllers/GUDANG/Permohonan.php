<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan extends CI_Controller {

	public function index()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_gudang');
		$this->load->view('gudang/permohonan/permohonan_maintenance',$data);
		$this->load->view('template/footer');
	}

	public function permohonan_proses()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_gudang');
		$this->load->view('gudang/permohonan/permohonan_proses',$data);
		$this->load->view('template/footer');
	}

	public function permohonan_lab()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_gudang');
		$this->load->view('gudang/permohonan/permohonan_lab',$data);
		$this->load->view('template/footer');
	}

	public function permohonan_kantor()
	{
		$data['title'] = "Data Permohonan | SPPB";
		$data['permohonan'] = $this->M_permohonan->show_data();
		$this->load->view('template/header',$data);
		$this->load->view('template/sidebar_gudang');
		$this->load->view('gudang/permohonan/permohonan_kantor',$data);
		$this->load->view('template/footer');
	}
}