<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hubungi_kami extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mrespon');
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
		$this->load->model('Mprofil');
	}

	public function index()
	{	
		$session = $this->session->userdata('member');
		
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	
		$data['kategori'] = $this->Mevent->tampil_kategori();

		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			//set meta validation
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|max_length[50]');
			$this->form_validation->set_rules('email', 'Email', 'required|max_length[80]');
			$this->form_validation->set_rules('pesan_visitor', 'Pesan Kamu', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');
			$this->form_validation->set_message('max_length', '{field} maksimal 50 karakter!');

			if ($this->input->post('kirim')) 
			{

				if ($this->form_validation->run() == TRUE) 
				{
					$input = $this->input->post();
					$inputan['nama_lengkap'] = $input['nama_lengkap'];
					$inputan['email'] = $input['email'];
					$inputan['pesan_visitor'] = $input['pesan_visitor'];

					$this->Mrespon->tambah_respon_visitor($inputan);
					$this->session->set_flashdata('alert', '<div class="uk-alert-success uk-alert"><a uk-close="" class="uk-alert-close uk-close uk-icon"><svg width="14" height="14" viewBox="0 0 14 14" xmlns="http://www.w3.org/2000/svg" ratio="1"></svg></a><div uk-grid="" class="uk-grid uk-grid-small uk-flex-middle"><div class="uk-width-expand"><p class="alert-message"><strong><i class="fa fa-check-circle uk-margin-small-right"></i>Yes!</strong><br>Pesan kamu telah terkirim. Admin kami akan memembalasmu segera, Terimakasih !');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("hubungi-kami").'">';	
				}
				else
				{
					$data["error"] = validation_errors();
				}

			}

		}

		$this->load->view('pengunjung/landing/header',$data);
		$this->load->view('pengunjung/hubungi/Hubungi_kami',$data);
		$this->load->view('pengunjung/landing/footer',$data);
	}
}
?>