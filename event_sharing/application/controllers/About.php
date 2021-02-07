<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
	}

	public function index()
	{	
		$session = $this->session->userdata('member');
		
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	
		$data['kategori'] = $this->Mevent->tampil_kategori();

		$this->load->view('pengunjung/landing/header', $data);
		$this->load->view('pengunjung/tentang/about', $data);
		$this->load->view('pengunjung/landing/footer', $data);
	}
}
?>