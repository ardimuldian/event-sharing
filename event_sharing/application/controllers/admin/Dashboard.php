<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');
		$this->load->model('Mrespon');
		$this->load->model('Mmember');

		// Agar login user tidak jebol
		if (!$this->session->userdata('admin')) {
			$this->session->set_flashdata('alert', '<br/><small class="p-b-10" style="color: red;">Anda harus login terlebih dahulu</small>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin").'">';
		}

	}

	public function index()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);	
		$data['kategori'] = $this->Mevent->tampil_kategori();
		$data['respon'] = $this->Mrespon->tampil_respon_pengunjung();
		$data['member'] = $this->Mmember->tampil_member();

		$menu = "dashboard";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/home',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/admin/dashboard.php */ 
?>