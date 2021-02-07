<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['event'] = $this->Mevent->tampil_event();

		$menu = "event";
		$data['menu'] = $menu;

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/event/tampil', $data);
		$this->load->view('user/footer', $data);
	}

	public function detail($url_event)
	{

		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['event'] = $this->Mevent->ambil_event1($url_event);

		$id_tiket = $data['event']['id_tiket'];

		$data['pengunjung'] = $this->Mevent->ambil_pengunjung($id_tiket);

		$menu = $data['event']['nama_event'];
		$data['menu'] = $menu;

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/event/detail', $data);
		$this->load->view('user/footer', $data);
	}

	public function edit($url_event)
	{

		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['event'] = $this->Mevent->ambil_event($url_event);

		$data['kategori'] = $this->Mevent->tampil_kategori();
		$data['maks_trans'] = array('1','2','3','4','5');

		$menu = $data['event']['nama_event'];
		$data['menu'] = $menu;

		if ($this->input->post('ubah_event')) 
		{
			$input = $this->input->post();

			// event
			$inputan1['id_event'] = $input['id_event'];
			$inputan1['url_event'] = $input['url_event'];
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

			$this->Mevent->ubah_event($inputan1, $inputan2);
			$this->session->set_flashdata('event', '<div class="uk-grid uk-grid-medium uk-grid-stack"><div class="uk-width-5-5@m uk-width-1-1@s uk-grid-margin uk-first-column"><div class="uk-grid uk-grid-medium uk-grid-stack"><div class="uk-width-1-1@m uk-first-column"><div class="uk-alert-success uk-margin-remove uk-alert"><div class="uk-grid uk-grid-small uk-flex-middle uk-grid-stack"><div class="uk-width-expand uk-first-column" style="text-align: center;"><p class="alert-message"><i class="fa fa-exclamation-circle uk-margin-small-right"></i>Anda berhasil mengubah event.</p></div></div></div></div></div></div>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/event-saya/".$url_event).'">';			
		}

		$this->load->view('user/event/edit', $data);
	}

	public function data_pemesan($url_event)
	{
		$session = $this->session->userdata('member');
		$data['member'] = $this->Mprofil->ambil_member($session['id_user']);
		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "Data Pemesan";
		$data['menu'] = $menu;

		$data['event'] = $this->Mevent->ambil_event($url_event);
		$data['pengunjung'] = $this->Mevent->ambil_pengunjung($data['event']['id_tiket']);

		if ($this->input->post('cetak_data_pemesan')) 
		{
			$this->load->library('pdf');

			$favicon = base_url('assets/img/favicon/'.$data['pengaturan']['favicon']);
			$nama_event = $data['event']['nama_event'];
			$nama = $data['member']['nama'];

			$isi = "<html><link rel='icon' href='".$favicon."'><title>Laporan Data Pemesan ".$nama_event."</title><style>@media print{.col-md-3{width: 30%;float: left;}.col-md-9{width: 70%;float: left;}}</style><style type='text/css'>.body-blue {border: 1px solid #3c8dbc;}</style><style type='text/css'>.body-black {border: 1px solid black;}</style><body><section class='content'>

			<div class='row'>
				<div class='col-xs-12'>
					<div class='box body-blue'>
						<div class='box-body' style='padding-top: 25px;'>
							<div class='form-group'>
								<div class='col-md-12'>
									<div>
										<h3 style='padding-left: 30px;'><i><b>".strtoupper($nama)."</b></i></h3>
										<h3 align='center'><u><b>LAPORAN DATA PEMESAN - ".strtoupper($nama_event)."</b></u></h3>
									</div>
									<br><br>

									<div class='col-xs-12' style='padding-left: 110px; padding-bottom: 20px;'><br>
										<table>

											<tr align='center'>
												<th class='body-black' width='100' style='padding-top: 10px; font-size:12px;'><b>No.Tiket</b></th>
												<th class='body-black' width='30' style='padding-top: 10px; font-size:12px;'><b>Nama Pemesan</b></th>
												<th class='body-black' width='150' style='padding-top: 10px; font-size:12px;'><b>Email</b></th>
												<th class='body-black' width='100' style='padding-top: 10px; font-size:12px;'><b>Kuantitas</b></th>
												<th class='body-black' width='190' style='font-size: 12px;'><b>Status</b></th>
											</tr>";

											foreach ($data['pengunjung'] as $key => $value) {
												$no_tiket = $value['no_tiket'];
												$nama = $value['nama'];
												$email = $value['email'];
												$jml_tiket = $value['jml_tiket'];
												if ($value['status_cek_in']==0) {
													$status = "Belum Check-In";
												}
												elseif ($value['status_cek_in']==1)
												{
													$status = "Check-In";
												}

												$isi .= "<tr>
												<td class='body-black' align='center' style='font-size: 12px;'>".$no_tiket."</td>
												<td class='body-black' align='center' style='font-size: 12px;'>".$nama."</td>
												<td class='body-black' align='center' style='font-size: 12px;'>".$email."</td>
												<td class='body-black' align='center' style='font-size: 12px;'>".$jml_tiket."</td>
												<td class='body-black' align='center' style='font-size: 12px;'>".$status."</td>
											</tr>";

										}

										$isi .= "</table>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section></body></html>";

		$this->pdf->load_html($isi);
		$this->pdf->set_option('isRemoteEnabled', TRUE);
		$this->pdf->set_paper("A4", "landscape");
		$this->pdf->render();

		$this->pdf->stream("Laporan Data Pemesan ".$nama_event.".pdf", array("Attachment"=> 1));
	}

	$this->load->view('user/header', $data);
	$this->load->view('user/sidebar', $data);
	$this->load->view('user/navbar', $data);
	$this->load->view('user/event/data_pemesan', $data);
	$this->load->view('user/footer', $data);
}

public function check_in($url_event)
{
	$session = $this->session->userdata('member');
	$data['member'] = $this->Mprofil->ambil_member($session['id_user']);
	$id_config = 1;
	$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

	$menu = "Check In";
	$data['menu'] = $menu;

	$data['event'] = $this->Mevent->ambil_event($url_event);

	$id_tiket = $data['event']['id_tiket'];

	$data['pengunjung'] = $this->Mevent->ambil_pengunjung($id_tiket);

	unset($data['pengunjung']);
	$data['pengunjung'] = array();

	if ($this->input->post('cari')) 
	{
		$data['pengunjung'] = $this->Mevent->cari_no_tiket($this->input->post());
	}

	if ($this->input->post('checkin')) 
	{
		$input = $this->input->post();
		$nama = $input['nama'];
		$no_tiket = $input['no_tiket'];

		$this->Mevent->cekin_pengunjung($no_tiket);
		echo "<script>alert('Anda berhasil check-in ".$nama."');location='".base_url("member/event-saya/check-in/".$url_event)."'</script>";
	}

	$this->load->view('user/header', $data);
	$this->load->view('user/sidebar', $data);
	$this->load->view('user/navbar', $data);
	$this->load->view('user/event/check_in', $data);
	$this->load->view('user/footer', $data);
}

public function unpublish($url_event)
{

	$session = $this->session->userdata('admin');
	$level = "admin";
	$data['admin'] = $this->Mprofil->ambil_admin($level);

	$this->Mevent->unpublish_event($url_event);
	echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/event-saya/".$url_event).'">';


}

public function publish($url_event)
{

	$session = $this->session->userdata('admin');
	$level = "admin";
	$data['admin'] = $this->Mprofil->ambil_admin($level);

	$this->Mevent->publish_event($url_event);
	echo '<meta http-equiv="refresh" content="0; url = '.base_url("member/event-saya/".$url_event).'">';


}

}