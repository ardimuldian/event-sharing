<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mpengaturan');

		// Agar login user tidak jebol
		if (!$this->session->userdata('admin')) {
			echo "<script>alert('Anda harus login terlebih dahulu');location='".base_url("admin")."'</script>";
		}

	}

	public function index()
	{
		$session = $this->session->userdata('admin');

		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "";
		$data['menu'] = $menu;

		$menu1 = "profil";
		$data['menu1'] = $menu1;

		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			//set form validation
			$this->form_validation->set_rules('nama', 'Nama', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			if ($this->form_validation->run() == TRUE) 
			{
				$this->Mprofil->ubah_profil_admin($this->input->post(), $level);
				$this->session->set_flashdata('alert', '<div class="alert alert-success">Data berhasil diubah</div>');
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/profil").'">';	
			}
			else
			{
				$data["error"] = validation_errors();
			}
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/profil/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Profil.php */
/* Location: ./application/controllers/admin/Profil.php */ 
?>