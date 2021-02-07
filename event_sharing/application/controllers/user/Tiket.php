<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {

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

		$id_user = $data['member']['id_user'];
		$data['tiket'] = $this->Mevent->tampil_tiket($id_user);

		$menu = "tiket";
		$data['menu'] = $menu;

		$this->load->view('user/header', $data);
		$this->load->view('user/sidebar', $data);
		$this->load->view('user/navbar', $data);
		$this->load->view('user/tiket/tampil', $data);
		$this->load->view('user/footer', $data);
	}

	function cetak_tiket($email)
	{
		$this->load->library('pdf');
		
		$data['invoice'] = $this->Mevent->tampil_invoice($email);

		$nama_tiket = $data['invoice']['nama_tiket'];
		$banner = base_url('assets/img/member/banner/'.$data['invoice']['banner']);
		$url = base_url('');
		$no_tiket = $data['invoice']['no_tiket'];
		$nama_kategori = $data['invoice']['nama_kategori'];
		$jml_tiket = $data['invoice']['jml_tiket'];
		$tgl_mulai_acara = $data['invoice']['tgl_mulai_acara'];
		$tgl_berakhir_acara = $data['invoice']['tgl_berakhir_acara'];
		$waktu_mulai_acara = substr($data['invoice']['waktu_mulai_acara'], 0,5);
		$waktu_berakhir_acara = substr($data['invoice']['waktu_berakhir_acara'], 0,5);
		$lokasi_acara = $data['invoice']['lokasi_acara'];
		$nama = $data['invoice']['nama'];

		$isi = '<style type="text/css">*,*:before,*:after {-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;}html {font-family: Arial, sans-serif;-ms-text-size-adjust: 100%;-webkit-text-size-adjust: 100%;}body {margin: 0;}article,aside,details,figcaption,figure,footer,header,hgroup,main,menu,nav, section,summary {display: block;}audio,canvas,progress,video {display: inline-block;vertical-align: baseline;}audio:not([controls]) {display: none;height: 0;}[hidden],template {display: none;}a {background-color: transparent;}a:active,a:hover {outline: 0;}abbr[title] {border-bottom: 1px dotted;}b,strong {font-weight: bold;}dfn {font-style: italic;}h1 {font-size: 2em;margin: 0.67em 0;}mark {background: #ff0;color: #000;}small {font-size: 80%;}sub,sup {font-size: 75%;line-height: 0;position: relative;vertical-align: baseline;}sup {top: -0.5em;}sub {bottom: -0.25em;}img {border: 0;}svg:not(:root) {overflow: hidden;}figure {margin: 1em 40px;}hr {-moz-box-sizing: content-box;box-sizing: content-box;height: 0;}pre { overflow: auto;}code,kbd,pre,samp {font-family: monospace, monospace;font-size: 1em;}button,input,optgroup,select,textarea {color: inherit;font: inherit;margin: 0;}button {overflow: visible;}button,select {text-transform: none;}button,html input[type="button"],input[type="reset"],input[type="submit"] {-webkit-appearance: button;cursor: pointer;}button[disabled],html input[disabled] {cursor: default;}button::-moz-focus-inner,input::-moz-focus-inner {border: 0;padding: 0;}input {  line-height: normal;}input[type="checkbox"],input[type="radio"] {box-sizing: border-box;padding: 0;}input[type="number"]::-webkit-inner-spin-button,input[type="number"]::-webkit-outer-spin-button {height: auto;}input[type="search"] {-webkit-appearance: textfield;-moz-box-sizing: content-box;-webkit-box-sizing: content-box;box-sizing: content-box;}input[type="search"]::-webkit-search-cancel-button,input[type="search"]::-webkit-search-decoration {-webkit-appearance: none;}fieldset {border: 1px solid #c0c0c0;margin: 0 2px;padding: 0.35em 0.625em 0.75em;}legend {border: 0;padding: 0;}textarea {overflow: auto;}optgroup {font-weight: bold;}table {border-collapse: collapse;border-spacing: 0;}td,th {padding: 0;}body {font-size: 8pt;line-height: 1.5;padding-top: 48px;background: #eee;}img {max-width: 100%;}table {width: 100%;}body {
			font-size: 16px;}.site-header {height: 48px;position: fixed;top: 0;right: 0;left: 0;background: rgba(255, 255, 255, 0.88);
				box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1), 0 1px 1px rgba(0, 0, 0, 0.1);overflow: hidden;padding: 0 16px;z-index: 99;}.site-header__logo {float: left;}.site-header__logo em {display: block;font-size: 20px;font-weight: 400;text-transform: uppercase; font-style: normal;line-height: 48px;color: #d9531e;}.site-header__action {float: right;padding: 8px 0;}.site-header__action .btn {display: block;vertical-align: middle;line-height: 22px;padding: 4px 12px;border: solid 1px rgba(0, 0, 0, 0.1);background: #fff;border-radius: 3px;font: inherit;font-size: 14px;outline: 0 !important;float: left;margin: 0 0 0 8px;background-color: #01A4EF;color: #fff !important;background-image: linear-gradient(#2fbdfe, #01A4EF);text-shadow: -0.1px -0.1px rgba(0, 0, 0, 0.12);box-shadow: 0 0.1px 0.1px rgba(255, 255, 255, 0.4) inset;}.site-header__action .btn svg {display: block;width: 22px;height: 22px;fill: #fff;float: left;margin: 0 6px 0 -4px;
				}.site-header__action .btn:focus {box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);}.evoucher-wrapper {max-width: 746px;margin: 24px auto;background: #fff;padding: 8px;border: solid 1px #e5e5e5;box-shadow: 0 1px 1px rgba(0, 0, 0, 0.04);}.evoucher {border: solid 4px #eee;}.evoucher > table {border-collapse: separate;}.evoucher > table td {
					padding: 12px;border: solid 4px #eee;}.evoucher > table td img {max-width: 1000px;}td svg {vertical-align: middle;}table.toc td {border: 0;vertical-align: top;}.evoucher td ul,.evoucher td ol {margin: 0 0 0 16px;
						padding: 0;font-size: 13px;}.file-btn {position: absolute;top: 0px;right: 10px;overflow: hidden;height: 24px;
							line-height: 24px;padding: 0 6px;border-radius: 3px;border: solid 1px #ccc;font-size: 9px;cursor: pointer;
							font-family: Arial, sans-serif;text-transform: uppercase;font-weight: 700;background: rgba(255, 255, 255, .4);
						}.file-btn input {position: absolute;opacity: 0;line-height: 4rem;width: 8rem;top: 0;left: 0;right: 0;bottom: 0;cursor: pointer;}.editable {border: dashed 1px #e5e5e5;outline: 0;}.editable:focus {background: #ffffce;}.break {margin: 24px 0;}@media print {body {padding-top: 0;background: transparent;}.eticket {padding: 0;border: 0;box-shadow: none;}.site-header {display: none;}.break {page-break-after: always;height: 0;background: transparent;margin: 0;}.editable {border: 0;background: transparent;}.inline-editor {display: none;}}</style><div class="content_template"><div class="evoucher-wrapper"><div class="evoucher"><table><tbody><tr><td style="width:75%;text-transform:uppercase;font-weight:700;padding:6px 12px;font-size:14px;"><div class="editable__">Nama Tiket : <span style="color:#FF3A2D;">'.$nama_tiket.'</span> (Gratis Lurr)</div></td></tr></tbody></table><table><tbody><tr><td rowspan="0"><div style="position:relative;"><img src="'.$banner.'" class="image_banner" alt="'.$nama_tiket.'" style="display:block;max-width:460px;height:240px;margin:0px;padding:0px 55px;"></div></td><td style="text-align:center;vertical-align:middle;padding:0px;"><div style="position:relative;height:100px;"><img src="'.$banner.'" class="image_logo" alt="" style="width: 100px;height: 100px;"><span style="display:block;margin:0;line-height:1.2;font-size:12px;"><br><b>'.$no_tiket.'</b></span></div></td></tr><tr><td style="text-align:center;padding:0px 10px"><small style="display:block;margin:0;line-height:1.2;"><b>'.$nama_kategori.'</b></small><span style="display:block;margin:0;line-height:1.2;font-size:12px;"><br><b>TICKET '.$jml_tiket.'</b></span></td></tr><tr><td style="text-align:center;text-transform:uppercase;font-weight:700;font-size:13px;whitespace:nowrap;padding:6px 12px;"><div class="editable__">'.$nama_tiket.'<br>'.$tgl_mulai_acara.' – '.$tgl_berakhir_acara.' '.$waktu_mulai_acara.' - '.$waktu_berakhir_acara.' WIB<br>'.$lokasi_acara.'</div></td><td style="text-align:center;line-height:1.2;padding:8px 12px;font-size:13px;"><div class="editable__"><b><br>'.$nama.'</b><br>Ref: Online<br></div></td></tr><tr><td colspan="2"><table><tbody><tr><td colspan="3" style="text-align:center;white-space:nowrap;font-size:12px;font-weight:700;width:33.33333%;"> Powered by <a href="'.$url.'">eventsharing.com</a></td></tr></tbody></table></div></div></div>';

						$this->pdf->load_html($isi);
						$this->pdf->set_option('isRemoteEnabled', TRUE);
						$this->pdf->set_paper("A4", "landscape");
						$this->pdf->render();

						$this->pdf->stream("Tiket.".$nama_tiket." - Yth. ".$nama.".pdf", array("Attachment"=> 1));
					}

				}