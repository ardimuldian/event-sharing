<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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

		if ($this->input->post()) 
		{
			//set form validation
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			$check = $this->Mlogin->login_member($this->input->post());
			$data = $this->Mlogin->login_member_detail($this->input->post());

			if ($this->form_validation->run() == TRUE) 
			{
				if ($check=="member" AND $data['status']==1) 
				{
					$this->session->set_flashdata('pesan', '<div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-check-circle-o uk-margin-small-right"></i>Anda Berhasil Login Sebagai Member</p></div></div></div></div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("member").'">';	
				}

				if ($check=="member" AND $data['status']==0) 
				{
					$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-close uk-margin-small-right"></i>Akun anda belum aktif!</p></div></div></div></div></div><br>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';	
				}

				if ($check=="gagal_member" AND $data['status']==0)
				{
					$this->session->set_flashdata('alert', '<div><div class="standard-margin"><div uk-alert="" class="uk-alert-danger uk-margin-remove uk-alert"><a uk-close="" class="uk-alert-close uk-hidden uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column"><p class="alert-message"><i class="fa fa-sign-in uk-margin-small-right"></i><span>Periksa kembali email dan password anda!</span></p></div></div></div></div></div><br>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("login").'">';
				}

			}
		}

		$this->load->view('pengunjung/login',$data);
	}

	public function logout_member()
	{
		$this->Mlogin->logout_member();
		echo "<script>";
		echo "location='".base_url('login')."';";
		echo "</script>";
	}

	public function login_admin()
	{
		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			//set form validation
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[5]');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			$input = $this->input->post();
			$email = $input['email'];
			$password = sha1($input['password']);

			$check = $this->Mlogin->login_admin($email, $password);

			if ($this->form_validation->run() == TRUE) 
			{
				if ($check=="admin") 
				{
					$this->session->set_flashdata('welcome', '<div class="col-sm-12 col-md-12"><div class="card"><div class="card-header"><div class="cardtext-small"><p>Selamat datang di halaman dashboard admin!</p></div></div></div></div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/dashboard").'">';	
				}

				else
				{
					$data["error"] = validation_errors();
				}

			}
		}

		$this->load->view('admin/login');
	}

	public function logout_admin()
	{
		$this->Mlogin->logout_admin();
		echo "<script>";
		echo "location='".base_url('')."';";
		echo "</script>";
	}

}