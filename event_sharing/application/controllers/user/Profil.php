<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mprofil');
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');

		if (!$this->session->userdata('member')) 
		{
			$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-exclamation-circle uk-margin-small-right"></i>Anda Harus Login Terlebih Dahulu</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';
		}
	}

	public function informasi_dasar()
	{

		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$url_event = '';
		$data['event'] = $this->Mevent->ambil_event($url_event);

		$menu = $data['event']['nama_event'];
		$data['menu'] = $menu;
		
		$id_user = $data['member']['id_user'];

		$menu = "profil informasi dasar";
		$data['menu'] = $menu;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("nama", "Nama Organizer", "required");
		$this->form_validation->set_rules("no_hp", "No Handphone", "required");

		if (empty($_FILES['logo']['name']))
		{
			$this->form_validation->set_rules('logo', 'Logo', 'required');
		}

		$this->form_validation->set_rules("tentang_kami", "Tentang Kami", "required");

		$this->form_validation->set_message("required", "%s tidak boleh kosong");

		if ($this->form_validation->run() == TRUE) 
		{
			$this->Mprofil->ubah_member($this->input->post(), $id_user);
			$this->session->set_flashdata('informasi-dasar', '<div><div class="standard-margin"><div class="uk-alert-success uk-margin-remove uk-alert"><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-exclamation-circle uk-margin-small-right"></i>Anda berhasil merubah profil.</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/profil/informasi-dasar").'">';
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/profil/informasi_dasar', $data);
		$this->load->view('user/footer', $data);
	}

	public function ubah_password()
	{
		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$id_user = $data['member']['id_user'];

		$url_event = '';
		$data['event'] = $this->Mevent->ambil_event($url_event);

		$menu = $data['event']['nama_event'];
		$data['menu'] = $menu;
		
		$menu = "profil ubah password";
		$data['menu'] = $menu;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("password", "Password", "required|min_length[5]");

		$this->form_validation->set_message("required", "%s tidak boleh kosong");
		$this->form_validation->set_message("min_length", "%s minimal 5 karakter");

		if ($this->form_validation->run() == TRUE) 
		{
			$this->Mprofil->ubah_password_member($this->input->post(), $id_user);
			$this->session->set_flashdata('ubah-password', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-success uk-margin-remove uk-alert"><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-exclamation-circle uk-margin-small-right"></i>Anda berhasil merubah password.</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/profil/ubah-password").'">';
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/profil/ubah_password', $data);
		$this->load->view('user/footer', $data);
	}

	public function informasi_legal()
	{

		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$id_user = $data['member']['id_user'];

		$url_event = '';
		$data['event'] = $this->Mevent->ambil_event($url_event);

		$menu = $data['event']['nama_event'];
		$data['menu'] = $menu;

		$menu = "profil informasi legal";
		$data['menu'] = $menu;

		$this->load->library("form_validation");
		$this->form_validation->set_rules("no_ktp", "Nomor KTP", "required");
		$this->form_validation->set_rules("nama_ktp", "Nama KTP", "required");
		$this->form_validation->set_rules("alamat_ktp", "Alamat KTP", "required");

		if (empty($_FILES['dokumen_ktp']['name']))
		{
			$this->form_validation->set_rules('dokumen_ktp', 'Dokumen KTP', 'required');
		}

		$this->form_validation->set_message("required", "%s tidak boleh kosong");

		if ($this->form_validation->run() == TRUE) 
		{
			$this->Mprofil->ubah_dokumen_member($this->input->post(), $id_user);
			$this->session->set_flashdata('informasi-legal', '<div uk-alert="" class="uk-alert-success uk-alert"><a uk-close="" class="uk-alert-close uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle"><div class="uk-width-expand"><p class="alert-message"><strong><i class="fa fa-check-circle uk-margin-small-right"></i>Yes!</strong><br>Informasi legal kamu telah terkirim. Admin kami akan melakukan validasi dokumen yang kamu kirimkan. Jika dokumen kamu belum divalidasi dalam waktu 5 hari kerja, silakan menghubungi kami dengan telepon ke <a href="tel:0895380719756" class="uk-link-reset link-dusty-orange">0895380719756</a>.</p></div></div></div>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/profil/informasi-legal").'">';
		}
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/profil/informasi_legal', $data);
		$this->load->view('user/footer', $data);
	}

}