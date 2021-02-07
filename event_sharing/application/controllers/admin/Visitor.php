<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mvisitor');
		$this->load->model('Mpengaturan');

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

		$data['visitor'] = $this->Mvisitor->tampil_visitor();

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "visitor";
		$data['menu'] = $menu;
		
		if ($this->input->post('save')) 
		{
			$input = $this->input->post();
			$id_visitor = $input['id_visitor'];
			$inputan['pesan_admin'] = $input['pesan_admin'];
			$email = $input['email'];

			$this->Mvisitor->ubah_pesan_admin($inputan, $id_visitor, $email);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Anda berhasil membalas ke alamat email '.$email.'</div>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/visitor").'">';	
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/visitor/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail($id_visitor)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$data['visitor'] = $this->Mvisitor->ambil_visitor($id_visitor);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "visitor";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/visitor/detail',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Visitor.php */
/* Location: ./application/controllers/admin/visitor.php */ 
?>