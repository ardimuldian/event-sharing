<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

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
		$data['event'] = $this->Mevent->tampil_event();	
		$data['kategori'] = $this->Mevent->tampil_kategori();	

		$id_support = 1;
		$data['support'] = $this->Mpengaturan->ambil_support($id_support);

		$this->load->view('pengunjung/landing/header',$data);
		$this->load->view('pengunjung/landing/banner',$data);
		$this->load->view('pengunjung/landing/kategori_event',$data);
		$this->load->view('pengunjung/landing/event',$data);
		$this->load->view('pengunjung/landing/afiliasi',$data);
		$this->load->view('pengunjung/landing/footer',$data);
	}

}