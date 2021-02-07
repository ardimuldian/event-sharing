<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beli_tiket extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
		$this->load->model('Mprofil');
	}

	public function index()
	{
		
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$parameter = 'kosong';
		$url_event = '';

		$data['nama_user'] = '';
		$data['email_user'] = '';

		if ($_COOKIE['data_temp']) {
			$parameter = $_COOKIE['data_temp'];
			$parameter = json_decode(base64_decode($parameter), true);
			
			$url_event = $parameter[0];
			$id_user = $parameter[1];
			$id_event = $parameter[2];
			$id_tiket = $parameter[3];
			$jml_tiket = $parameter[4];

			if ($url_event!='') 
			{
				$this->load->library('form_validation');

				if ($this->input->post()) 
				{
					$this->form_validation->set_rules('email', 'Email', 'required|is_unique[pengunjung.email]');

					$this->form_validation->set_message("required", "%s tidak boleh kosong!");
					$this->form_validation->set_message("is_unique", "%s '".$this->input->post('email')."' sudah pernah melakukan transaksi pada event ini.");

					if ($this->input->post('input_tiket')) 
					{
						if ($this->form_validation->run() == TRUE) 
						{
							$input = $this->input->post();
							$email_user = $input['email'];

							$this->Mevent->input_pengunjung($this->input->post(), $jml_tiket);

							echo '<meta http-equiv="refresh" content="0; url = '.base_url("invoice/$email_user").'">';
						}
						else
						{
							$data["error"] = validation_errors();
						}

					}

				}

				$data['event'] = $this->Mevent->ambil_event($url_event);

				if ($id_user>0) {
					$data['member'] = $this->Mprofil->ambil_member($id_user);

					$data['nama_user'] = $data['member']['nama'];
					$data['email_user'] = $data['member']['email'];
				}
				
				$this->load->view('pengunjung/ikut_event/beli_tiket',$data);
			}
		}
		else {
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("acara/$url_event").'">';
		}
	}

}