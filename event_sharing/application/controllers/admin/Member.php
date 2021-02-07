<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mmember');
		$this->load->model('Mpengaturan');
		$this->load->model('Mevent');

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
		$data['member'] = $this->Mmember->tampil_member();

		$menu = "manajemen_member";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/member/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function tambah_kategori_event()
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$menu = "kategori_event";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			//set meta validation
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
			if (empty($_FILES['cover']['name']))
			{
				$this->form_validation->set_rules('cover', 'Cover', 'required');
			}
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kategori', 'required');

			//set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['nama_kategori'] = $input['nama_kategori'];
				$inputan['deskripsi'] = $input['deskripsi'];

				$this->Mevent->tambah_kategori_event($inputan);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-info">Data berhasil ditambah</div>');
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/kategori-event").'">';	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/kategori/tambah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ubah_kategori_event($id_kategori)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);
		$data['kategori'] = $this->Mevent->ambil_kategori($id_kategori);

		$menu = "kategori_event";
		$data['menu'] = $menu;

		$this->load->library("form_validation");

		if ($this->input->post()) 
		{
			// set meta validation
			$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
			$this->form_validation->set_rules('deskripsi', 'Deskripsi Kategori', 'required');

			// set message form validation
			$this->form_validation->set_message('required', '{field} tidak boleh kosong!');

			if ($this->form_validation->run() == TRUE) 
			{
				$input = $this->input->post();
				$inputan['nama_kategori'] = $input['nama_kategori'];
				$inputan['deskripsi'] = $input['deskripsi'];

				$this->Mevent->ubah_kategori_event($inputan, $id_kategori);
				$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Data berhasil diubah</div>');
				echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/kategori-event").'">';	
			}
			else
			{
				$data["error"] = validation_errors();
			}

		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/event/kategori/ubah',$data);
		$this->load->view('admin/footer',$data);
	}

	public function hapus_kategori_event($id_kategori)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$this->Mevent->hapus_kategori_event($id_kategori);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Data berhasil dihapus</div>');
		echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/kategori-event").'">';	

	}

	public function validasi($id_user)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['member'] = $this->Mmember->tampil_member();

		$menu = "manajemen_member";
		$data['menu'] = $menu;

		$this->Mmember->validasi($id_user);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Dokumen berhasil divalidasi</div>');
		echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/manajemen-member").'">';

	}

	public function aktif_akun($id_user)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['member'] = $this->Mmember->tampil_member();

		$menu = "manajemen_member";
		$data['menu'] = $menu;

		$this->Mmember->aktif_akun($id_user);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Akun berhasil diaktifkan</div>');
		echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/manajemen-member").'">';

	}

	public function nonaktif_akun($id_user)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['member'] = $this->Mmember->tampil_member();

		$menu = "manajemen_member";
		$data['menu'] = $menu;

		$this->Mmember->nonaktif_akun($id_user);
		$this->session->set_flashdata('alert', '<br/><div class="alert alert-danger">Akun berhasil dinonaktifkan</div>');
		echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/manajemen-member").'">';

	}

	public function dokumen_member($id_user)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['member'] = $this->Mprofil->ambil_member($id_user);
		$data['id_user'] = $id_user;

		$menu = "dokumen_member";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/member/dokumen',$data);
		$this->load->view('admin/footer',$data);
	}

	public function event_member($id_user)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);
		$data['member'] = $this->Mprofil->ambil_member($id_user);
		$data['id_user'] = $id_user;

		$data['event'] = $this->Mevent->ambil_event_user($id_user);

		$menu = "event_member";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/member/event',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file Member.php */
/* Location: ./application/controllers/admin/member.php */ 
?>