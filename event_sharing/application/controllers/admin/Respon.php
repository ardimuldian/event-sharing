<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Respon extends CI_Controller {
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mprofil');
		$this->load->model('Mrespon');
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
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "respon_pengunjung";
		$data['menu'] = $menu;

		$this->load->library('pagination');

		$config['base_url'] = base_url("admin/respon/index");
		$config['total_rows'] = $this->Mrespon->hitung_semua_respon();
		$config['per_page'] = 5;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['first_link'] = 'First';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = 'Last';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(4);
		$data['respon'] = $this->Mrespon->tampil_respon_perhalaman($config['per_page'], $data['start']);

		
		if ($this->input->post('save')) 
		{
			$input = $this->input->post();
			$id_respon = $input['id_respon'];
			$inputan['pesan_admin'] = $input['pesan_admin'];
			$email = $input['email'];

			$this->Mrespon->balas_respon_pengunjung($inputan, $id_respon, $email);
			$this->session->set_flashdata('alert', '<br/><div class="alert alert-success">Anda berhasil membalas ke alamat email '.$email.'</div>');
			echo '<meta http-equiv="refresh" content="0; url = '.base_url("admin/respon").'">';	
		}

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/respon/tampil',$data);
		$this->load->view('admin/footer',$data);
	}

	public function detail($id_respon)
	{
		$session = $this->session->userdata('admin');
		$level = "admin";
		$data['admin'] = $this->Mprofil->ambil_admin($level);

		$data['respon'] = $this->Mrespon->ambil_respon_visitor($id_respon);

		$id_config = 1;
		$data['pengaturan'] = $this->Mpengaturan->ambil_config($id_config);

		$menu = "visitor";
		$data['menu'] = $menu;

		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar_menu',$data);
		$this->load->view('admin/respon/detail',$data);
		$this->load->view('admin/footer',$data);
	}

}

/* End of file respon.php */
/* Location: ./application/controllers/admin/respon.php */ 
?>