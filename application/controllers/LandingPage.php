<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LandingPage extends CI_Controller {
	public function index()
	{
		$data['title'] = "SPPB | CANDI ARTHA";
		$this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('landing');
        $this->load->view('partials/footer');
	}
}