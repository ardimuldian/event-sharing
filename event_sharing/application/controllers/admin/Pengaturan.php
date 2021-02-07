<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaturan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
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

		$id_config = 1;
		$data['meta'] = $this->Mpengaturan->ambil_config($id_config);
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$id_support = 1;
		$data['support'] = $this->Mpengaturan->ambil_support($id_support);

		$menu = "pengaturan";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			//set meta validation
			$this->form_validation->set_rules('meta_keyword', 'Meta Keyword', 'required');
			$this->form_validation->set_rules('meta_author', 'Meta Author', 'required');
			$this->form_validation->set_rules('meta_title', 'Meta Title', 'required');
			$this->form_validation->set_rules('meta_description', 'Meta Description', 'required');
			
			//set sosmed validation
			$this->form_validation->set_rules('facebook', 'Facebook', 'required');
			$this->form_validation->set_rules('instagram', 'Instagram', 'required');
			$this->form_validation->set_rules('twitter', 'Twitter', 'required');
			$this->form_validation->set_rules('youtube', 'Youtube', 'required');
			
			//set tampilan validation
			$this->form_validation->set_rules('tentang_kami', 'Tentang Kami', 'required');
			$this->form_validation->set_rules('no_wa', 'Nomor Whatsapp', 'required');
			$this->form_validation->set_rules('copyright', 'Copyright', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			if ($this->input->post('meta')) 
			{

				if ($this->form_validation->run() == TRUE) 
				{
					$input = $this->input->post();
					$inputan['meta_keyword'] = $input['meta_keyword'];
					$inputan['meta_author'] = $input['meta_author'];
					$inputan['meta_title'] = $input['meta_title'];
					$inputan['meta_description'] = $input['meta_description'];

					$this->Mpengaturan->ubah_meta($inputan, $id_config);
					$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Meta berhasil diubah</div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/pengaturan").'">';	
				}
				else
				{
					$data["error"] = validation_errors();
				}

			}

			if ($this->input->post('sosmed')) 
			{

				if ($this->form_validation->run() == TRUE) 
				{
					$input = $this->input->post();
					$inputan['facebook'] = $input['facebook'];
					$inputan['instagram'] = $input['instagram'];
					$inputan['twitter'] = $input['twitter'];
					$inputan['youtube'] = $input['youtube'];

					$this->Mpengaturan->ubah_sosmed($inputan, $id_config);
					$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Sosmed berhasil diubah</div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/pengaturan").'">';	
				}
				else
				{
					$data["error"] = validation_errors();
				}

			}

			if ($this->input->post('tampilan')) 
			{

				if ($this->form_validation->run() == TRUE) 
				{
					$input = $this->input->post();
					$inputan['tentang_kami'] = $input['tentang_kami'];
					$inputan['no_wa'] = $input['no_wa'];
					$inputan['copyright'] = $input['copyright'];

					$this->Mpengaturan->ubah_tampilan($inputan, $id_config);
					$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Sosmed berhasil diubah</div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/pengaturan").'">';	
				}
				else
				{
					$data["error"] = validation_errors();
				}

			}

			if ($this->input->post('support')) 
			{
				if ($this->form_validation->run() == TRUE) 
				{
					$this->Mpengaturan->ubah_support($id_support);
					$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Pengaturan Support berhasil diubah</div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/pengaturan").'">';
				}

				if (empty($_FILES['cover_support1']['name']) AND empty($_FILES['cover_support2']['name']) AND empty($_FILES['cover_support3']['name']) AND empty($_FILES['cover_support4']['name']) AND empty($_FILES['cover_support5']['name'])) 
				{
					$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Pengaturan Support gagal diubah karena tidak ada inputan</div>');
					echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/pengaturan").'">';
				}

				else
				{
					$data["error"] = validation_errors();
				}
			}

		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/pengaturan/umum/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Pengaturan.php */
/* Location: ./application/controllers/admin/Pengaturan.php */ 
?>