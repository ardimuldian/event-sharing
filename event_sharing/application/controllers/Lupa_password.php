<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mlogin');
		$this->load->model('Mpengaturan');
	}

	public function index()
	{
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	

		$this->load->library("form_validation");

		$this->form_validation->set_rules("email", "Email", "required");

		$this->form_validation->set_message("required", "%s tidak boleh kosong");

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$email = $input['email'];

			$user = $this->Mlogin->cek_email($email);

			if ($email == $user['email']) {
				$this->Mlogin->kirim_tautan($email);
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("lupa-password/tautan-perubahan").'">';				
			}

		}
		
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('pengunjung/login/lupa_password',$data);
	}

	public function tautan_perubahan()
	{
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	

		$this->load->view('pengunjung/login/tautan_perubahan',$data);
	}

	public function perbaharui_password($token)
	{
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		
		$this->load->library("form_validation");

		$this->form_validation->set_rules("password", "Password", "required|min_length[5]|matches[password1]");

		$this->form_validation->set_rules("password1", "Password", "required|matches[password]");

		$this->form_validation->set_message("matches", "%s Kolom password dengan konfirmasi password tidak cocok!");

		if ($this->form_validation->run() == TRUE) 
		{
			$input = $this->input->post();
			$password = $input['password'];

			$user = $this->Mlogin->cek_akun($token);

			if ($token == $user['token']) {
				$this->Mlogin->ubah_password($password, $token);
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("lupa-password/berhasil-diubah").'">';				
			}

		}
		
		else
		{
			$data["error"] = validation_errors();
		}

		$this->load->view('pengunjung/login/perbaharui_password', $data);
	}

	public function berhasil_diubah()
	{
		$this->load->view('pengunjung/login/berhasil_diubah');
	}

}