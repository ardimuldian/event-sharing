<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buat_event extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
		$this->load->model('Mprofil');

		if (!$this->session->userdata('member')) 
		{
			echo "<script>alert('Anda harus login terlebih dahulu sebelum membuat event!');location='".base_url("login")."'</script>";
		}
	}

	public function index()
	{
		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['kategori'] = $this->Mevent->tampil_kategori();

		$this->load->library("form_validation");

		if ($this->input->post('simpan_event')) 
		{
			// event
			if (empty($_FILES['banner']['name']))
			{
				$this->form_validation->set_rules('banner', 'Gambar/Poster/Banner', 'required');
			}
			$this->form_validation->set_rules('nama_event', 'Nama Event', 'required');
			$this->form_validation->set_rules('id_kategori', 'Kategori Event', 'required');
			$this->form_validation->set_rules('tgl_mulai_acara', 'Tanggal Mulai Acara', 'required');
			$this->form_validation->set_rules('tgl_berakhir_acara', 'Tanggal Berakhir Acara', 'required');
			$this->form_validation->set_rules('waktu_mulai_acara', 'Waktu Mulai Acara', 'required');
			$this->form_validation->set_rules('waktu_berakhir_acara', 'Waktu Bearkhir Acara', 'required');
			$this->form_validation->set_rules('lokasi_acara', 'Lokasi Acara', 'required');
			$this->form_validation->set_rules('deskripsi_event', 'Deskripsi Event', 'required');

			// tiket
			$this->form_validation->set_rules('nama_tiket', 'Nama Tiket', 'required');
			$this->form_validation->set_rules('deskripsi_tiket', 'Deskripsi Tiket', 'required');
			$this->form_validation->set_rules('tgl_mulai_order', 'Tanggal Mulai Order', 'required');
			$this->form_validation->set_rules('tgl_berakhir_order', 'Tanggal Berkhir Order', 'required');
			$this->form_validation->set_rules('tiket_disediakan', 'Tiket Disediakan', 'required');
			$this->form_validation->set_rules('1_email_1_trans', 'Pengaturan Ini', 'required');
			$this->form_validation->set_rules('maks_trans', 'Pengaturan Ini', 'required');

			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();

			// event
				$inputan1['id_user'] = $input['id_user'];
				$inputan1['nama_event'] = $input['nama_event'];
				$inputan1['id_kategori'] = $input['id_kategori'];
				$inputan1['tgl_mulai_acara'] = $input['tgl_mulai_acara'];
				$inputan1['tgl_berakhir_acara'] = $input['tgl_berakhir_acara'];
				$inputan1['waktu_mulai_acara'] = $input['waktu_mulai_acara'];
				$inputan1['waktu_berakhir_acara'] = $input['waktu_berakhir_acara'];
				$inputan1['lokasi_acara'] = $input['lokasi_acara'];
				$inputan1['deskripsi_event'] = $input['deskripsi_event'];

			// tiket
				$inputan2['nama_tiket'] = $input['nama_tiket'];
				$inputan2['deskripsi_tiket'] = $input['deskripsi_tiket'];
				$inputan2['tgl_mulai_order'] = $input['tgl_mulai_order'];
				$inputan2['tgl_berakhir_order'] = $input['tgl_berakhir_order'];
				$inputan2['tiket_disediakan'] = $input['tiket_disediakan'];
				$inputan2['1_email_1_trans'] = $input['1_email_1_trans'];
				$inputan2['maks_trans'] = $input['maks_trans'];

				$this->Mevent->buat_event($inputan1, $inputan2);
				$this->session->set_flashdata('event', '<div class="uk-width-1-1 uk-margin-xlarge-bottom uk-grid-margin uk-first-column"><div uk-height-match="target: > div > a > .card-event-saya" class="uk-grid-medium uk-child-width-1-1@l uk-child-width-1-1@m uk-child-width-1-1@s uk-grid"><div class="uk-alert-success uk-margin-remove uk-alert"><div class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column" style="text-align: center;"><p class="alert-message"><i class="fa fa-exclamation-circle uk-margin-small-right"></i>Anda berhasil menambah event.</p></div></div></div></div>');
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/event-saya/#aktif-event").'">';	
			}
			else
			{
				$data["error"] = validation_errors();
			}			
		}

		$this->load->view('pengunjung/buat_event',$data);
	}

}