<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_event extends CI_Controller {

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
		$data['event'] = $this->Mevent->tampil_event();

		if ($this->input->post('cari')) 
		{
			$input = $this->input->post();
			$id_kategori55 = $input['id_kategori55'];
			$tgl_mulai_acara = $input['tgl_mulai_acara'];
			$tgl_berakhir_acara = $input['tgl_berakhir_acara'];
			$lokasi_acara = $input['lokasi_acara'];

			if (!empty($id_kategori55)) 
			{
				$data['event'] = $this->Mevent->cari_id_kategori1($id_kategori55);
			}

			if (!empty($tgl_mulai_acara)) 
			{
				$data['event'] = $this->Mevent->cari_tgl_mulai_acara($tgl_mulai_acara);
			}

			if (!empty($tgl_berakhir_acara)) 
			{
				$data['event'] = $this->Mevent->cari_tgl_berakhir_acara($tgl_berakhir_acara);
			}

			if (!empty($tgl_mulai_acara) AND !empty($tgl_berakhir_acara)) 
			{
				$data['event'] = $this->Mevent->cari_tgl_acara($tgl_mulai_acara, $tgl_berakhir_acara);
			}

			if (!empty($lokasi_acara)) 
			{
				$data['event'] = $this->Mevent->cari_lokasi_acara($lokasi_acara);
			}

		}

		$this->load->view('pengunjung/landing/header',$data);
		$this->load->view('pengunjung/landing/banner',$data);
		$this->load->view('pengunjung/ikut_event/semua_kategori_event',$data);
		$this->load->view('pengunjung/landing/footer',$data);
	}

	public function klasifikasi($nama_kategori)
	{
		$session = $this->session->userdata('member');
		
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['event'] = $this->Mevent->tampil_event();
		$data['event1'] = $this->Mevent->tampil_event_perkategori($nama_kategori);
		$data['kategori'] = $this->Mevent->tampil_kategori();
		$data['nama_kategori'] = $nama_kategori;

		if ($this->input->post('cari')) 
		{
			$input = $this->input->post();
			$id_kategori = $input['id_kategori'];
			$tgl_mulai_acara = $input['tgl_mulai_acara'];
			$tgl_berakhir_acara = $input['tgl_berakhir_acara'];
			$lokasi_acara = $input['lokasi_acara'];

			if (!empty($id_kategori)) 
			{
				$data['event1'] = $this->Mevent->cari_id_kategori($id_kategori);
			}

			if (!empty($tgl_mulai_acara)) 
			{
				$data['event1'] = $this->Mevent->cari_tgl_mulai_acara($tgl_mulai_acara);
			}

			if (!empty($tgl_berakhir_acara)) 
			{
				$data['event1'] = $this->Mevent->cari_tgl_berakhir_acara($tgl_berakhir_acara);
			}

			if (!empty($tgl_mulai_acara) AND !empty($tgl_berakhir_acara)) 
			{
				$data['event1'] = $this->Mevent->cari_tgl_acara($tgl_mulai_acara, $tgl_berakhir_acara);
			}

			if (!empty($lokasi_acara)) 
			{
				$data['event1'] = $this->Mevent->cari_lokasi_acara($lokasi_acara);
			}

		}

		$this->load->view('pengunjung/landing/header',$data);
		$this->load->view('pengunjung/landing/banner',$data);
		$this->load->view('pengunjung/ikut_event/kategori_event',$data);
		$this->load->view('pengunjung/landing/footer',$data);
	}

}