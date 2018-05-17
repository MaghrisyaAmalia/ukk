<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_model');
	}

	public function index()
	{
		
	}

	public function dashboard()
	{
		$data['main_view'] = 'dashboard';
		$this->load->view('template', $data);
	}

	public function surat_masuk()
	{
		// if($this->session->userdata('logged_in') == TRUE){
		// if($this->session->userdata('jabatan') == "Sekretaris"){
				$data['main_view'] = 'suratmasuk';
				$data['data_surat_masuk'] = $this->surat_model->get_surat_masuk();
				$this->load->view('template', $data);
		// 	} else {

		// 	}
		// } else {
		// 	redirect('login');
		// }
		
	}

	public function suratkeluar()
	{
				$data['main_view'] = 'suratkeluar';
				$data['data_surat_keluar'] = $this->surat_model->get_surat_keluar();
				$this->load->view('template', $data);
	}

	public function disposisisurat()
	{
				$data['main_view'] = 'disposisisurat';
				$data['data_disposisi_surat'] = $this->surat_model->get_disposisi_surat();
				$this->load->view('template', $data);
	}

	public function tambah_surat_masuk()
	{
		$config['upload_path']		= './uploads/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']  		= 2000;
		
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('file_surat')){
			if ($this->surat_model->tambah_surat_masuk($this->upload->data()) == TRUE){
				$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
				redirect('surat/surat_masuk');
			} else {
				$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
				redirect('surat/surat_masuk');
			}
		} else {
			$this->session->set_flashdata('notif', $this->upload->display_errors());
			redirect('surat/surat_masuk');
		}
	}

	public function get_surat_masuk_by_id($id_surat)
	{
		$data_surat_masuk_by_id = $this->surat_model->get_surat_masuk_by_id($id_surat);
		echo json_encode($data_surat_masuk_by_id);
	}

	public function ubah_surat_masuk()
	{
		// if ($this->form_validation->run() == TRUE) {
			if ($this->surat_model->ubah_surat_masuk() == TRUE){
				$this->session->set_flashdata('notif', 'Ubah Surat Berhasil');
				redirect('surat/surat_masuk');
			} else {
				$this->session->set_flashdata('notif', 'Ubah Surat Gagal');
				redirect('surat/surat_masuk');
			}
		// } else {
		// 	$this->session->set_flashdata('notif', validation_errors());
		// 	redirect('surat/surat_masuk');
		// }
	}

	public function ubah_file_surat_masuk()
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = 2000;
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('edit_file_surat')){
			if ($this->surat_model->ubah_file_surat_masuk($this->upload->data()) == TRUE){
				$this->session->set_flashdata('notif', 'Ubah Surat Berhasil');
				redirect('surat/surat_masuk');
			} else {
				$this->session->set_flashdata('notif', 'Ubah Surat Gagal');
				redirect('surat/surat_masuk');
			}
		} else {
			$this->session->set_flashdata('notif', $this->upload->display_errors());
			redirect('surat/surat_masuk');
		}
	}

	public function hapus_surat_masuk($id_surat)
	{

		if($this->surat_model->hapus_surat_masuk($id_surat) == TRUE){
			$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
				redirect('surat/surat_masuk');
		} else {
			$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
				redirect('surat/surat_masuk');
		}
	}

	public function hapus_surat_keluar($id_suratkeluar)
	{

		if($this->surat_model->hapus_surat_keluar($id_suratkeluar) == TRUE){
			$this->session->set_flashdata('notif', 'Hapus Surat Berhasil');
				redirect('surat/suratkeluar');
		} else {
			$this->session->set_flashdata('notif', 'Hapus Surat Gagal');
				redirect('surat/suratkeluar');
		}
	}

	public function tambah_surat_keluar()
	{
		$config['upload_path']		= './uploads/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']  		= 2000;
		
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('file_surat')){
			if ($this->surat_model->tambah_surat_keluar($this->upload->data()) == TRUE){
				$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
				redirect('surat/suratkeluar');
			} else {
				$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
				redirect('surat/suratkeluar');
			}
		} else {
			$this->session->set_flashdata('notif', $this->upload->display_errors());
			redirect('surat/suratkeluar');
		}
	}

	public function tambah_disposisi()
	{
		$config['upload_path']		= './uploads/';
		$config['allowed_types'] 	= 'pdf';
		$config['max_size']  		= 2000;
		
		
		$this->load->library('upload', $config);
		
		if ($this->upload->do_upload('file_surat')){
			if ($this->surat_model->tambah_disposisi($this->upload->data()) == TRUE){
				$this->session->set_flashdata('notif', 'Tambah Surat Berhasil');
				redirect('surat/disposisisurat');
			} else {
				$this->session->set_flashdata('notif', 'Tambah Surat Gagal');
				redirect('surat/disposisisurat');
			}
		} else {
			$this->session->set_flashdata('notif', $this->upload->display_errors());
			redirect('surat/disposisisurat');
		}
	}

	public function hapus_disposisi($id_disposisi)
	{

		if($this->surat_model->hapus_disposisi($id_disposisi) == TRUE){
			$this->session->set_flashdata('notif', 'Hapus Disposisi Berhasil');
				redirect('surat/disposisisurat');
		} else {
			$this->session->set_flashdata('notif', 'Hapus Disposisi Gagal');
				redirect('surat/disposisisurat');
		}
	}

}

/* End of file surat.php */
/* Location: ./application/controllers/surat.php */