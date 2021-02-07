<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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

	public function index()
	{

		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);
		$id_user = $data['member']['id_user'];
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$data['event'] = $this->Mevent->total_event($id_user);
		
		foreach ($data['event'] as $key => $value) 
		{
			if (isset($value['id_event'])) 
			{
				$id_event = $value['id_event'];
				$data['pengunjung'] = $this->Mevent->total_pengunjung($id_event);
			}
			else
			{
				unset($data['pengunjung']);
				$data['pengunjung'] = array();
			}
		}

		$data['tiket'] = $this->Mevent->total_tiket($id_user);

		$menu = "home";
		$data['menu'] = $menu;


		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/dashboard', $data);
		$this->load->view('user/footer', $data);
	}

}