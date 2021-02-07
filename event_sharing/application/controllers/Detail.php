<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
	}

	public function detail($url_event)
	{
		$session = $this->session->userdata('member');
		
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$data['event'] = $this->Mevent->ambil_event($url_event);
		$data['jml_tiket'] = array('1','2','3','4','5');

		if ($this->input->post('beli_tiket'))
		{
			$input = $this->input->post();
			$id_event = $input['id_event'];
			$id_tiket = $input['id_tiket'];
			$jml_tiket = $input['jml_tiket'];

			if ($input['jml_tiket']>$data['event']['maks_trans']) 
			{
				$this->session->set_flashdata('pesan', '<span style="color: red;">Batas maksimal transaksi "'.$data['event']['maks_trans'].'" tiket.</span>');
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("acara/".$url_event).'">';
			}

			if ($input['jml_tiket']<=$data['event']['maks_trans']) 
			{
				$id_user = 0;

				if ($session['id_user']) {
					$id_user = $session['id_user'];
				}


				$parameter = base64_encode(json_encode(array($url_event, $id_user, $id_event, $id_tiket, $jml_tiket)));

				setcookie('data_temp', $parameter, time() + (1 * 300), "/");

				echo '<meta http-equiv="refresh" content="0; url = '.base_url("/beli-tiket").'">';
			}
		}

		$this->load->view('pengunjung/ikut_event/detail', $data);
	}

}