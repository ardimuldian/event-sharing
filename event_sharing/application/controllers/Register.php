<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mregister');
		$this->load->model('Mpengaturan');
	}

	public function index()
	{
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	

		$this->load->library('form_validation');
		
		if ($this->input->post()) {
			//set form validation
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
			// $this->form_validation->set_message('callback_getResponseCaptcha', '{field} {g-recaptcha-response} harus diisi');
			$this->form_validation->set_message("is_unique", "%s Email ini sudah terdaftar!");

			if ($this->form_validation->run() == TRUE) 
			{
				$this->Mregister->register_member($this->input->post());
				// $this->session->set_flashdata('pesan', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-check-circle-o uk-margin-small-right"></i>Akun anda berhasil didaftarkan, silahkan cek email anda untuk aktivasi akun!</p></div></div></div></div></div><br>');
				// echo '<meta http-equiv="refresh" content="0; url = '.base_url("register").'">';
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		$this->load->view('pengunjung/register/register',$data);
	}

	public function konfirmasi_akun($token)
	{
		$user = $this->Mregister->cek_akun($token);
		
		if ($token == $user['token']) 
		{
			$this->Mregister->konfirmasi_akun($token);
			$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-check-circle-o uk-margin-small-right"></i>Aktivasi akun berhasil: silahkan login!</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';
		}
		elseif ($token !== $user['token']) {
			$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-close uk-margin-small-right"></i>Aktivasi akun gagal: kesalahan token!</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';
		}
		else{
			$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-close uk-margin-small-right"></i>Aktivasi akun gagal: kesalahan email!</p></div></div></div></div></div><br>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';
		}
	}

}