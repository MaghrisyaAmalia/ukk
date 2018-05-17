<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function get_surat_masuk()
	{
		return $this->db->get('surat_masuk')
						->result();
	}

	public function tambah_surat_masuk($file_surat)
	{
		$data = array( 
				'nomor_surat' 	=> $this->input->post('no_surat'),
				'tgl_kirim' 	=> $this->input->post('tgl_kirim'),
				'tgl_terima' 	=> $this->input->post('tgl_terima'),
				'pengirim' 		=> $this->input->post('pengirim'),
				'penerima' 		=> $this->input->post('penerima'),
				'perihal' 		=> $this->input->post('perihal'),
				'file_surat' 	=> $file_surat['file_name']
	);
		$this->db->insert('surat_masuk', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_surat_masuk_by_id($id_surat)
	{
		return $this->db->where('id_surat', $id_surat)
						->get('surat_masuk')
						->row();
	}

	public function ubah_surat_masuk()
	{
		$data = array(
				'nomor_surat' 	=> $this->input->post('edit_no_surat'),
				'tgl_kirim' 	=> $this->input->post('edit_tgl_kirim'),
				'tgl_terima' 	=> $this->input->post('edit_tgl_terima'),
				'pengirim' 		=> $this->input->post('edit_pengirim'),
				'penerima' 		=> $this->input->post('edit_penerima'),
				'perihal' 		=> $this->input->post('edit_perihal')
		);
		$this->db->where('id_surat', $this->input->post('edit_id_surat'))
				 ->update('surat_masuk', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function ubah_file_surat_masuk($file_surat)
	{
		$data = array(
			'file_surat' => $file_surat['file_name'] );

		$this->db->where('id_surat', $this->input->post('edit_file_surat'))
				 ->update('surat_masuk', $data);

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}

	}

	public function hapus_surat_masuk($id_surat)
	{
		$this->db->where('id_surat', $id_surat)
				 ->delete('surat_masuk');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_surat_keluar()
	{
		return $this->db->get('surat_keluar')
						->result();
	}

	public function hapus_surat_keluar($id_suratkeluar)
	{
		$this->db->where('id_suratkeluar', $id_suratkeluar)
				 ->delete('surat_keluar');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function tambah_surat_keluar($file_surat)
	{
		$data = array( 
				'nomor_surat' 	=> $this->input->post('no_surat'),
				'tgl_kirim' 	=> $this->input->post('tgl_kirim'),
				'penerima' 		=> $this->input->post('penerima'),
				'perihal' 		=> $this->input->post('perihal'),
				'file_surat' 	=> $file_surat['file_name']
	);
		$this->db->insert('surat_keluar', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function get_disposisi_surat()
	{
		return $this->db->get('disposisi')
						->result();
	}

	public function tambah_disposisi($file_surat)
	{
		$data = array( 
				'id_surat' 				=> $this->input->post('id_surat'),
				'id_pegawai_pengirim' 	=> $this->input->post('id_pegawai_pengirim'),
				'id_pegawai_penerima' 	=> $this->input->post('id_pegawai_penerima'),
				'tgl_disposisi' 		=> $this->input->post('tgl_disposisi'),
				'keterangan' 			=> $this->input->post('keterangan'),
				'file_surat' 			=> $file_surat['file_name']
	);
		$this->db->insert('disposisi', $data);
		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}

	
	public function hapus_disposisi($id_disposisi)
	{
		$this->db->where('id_disposisi', $id_disposisi)
				 ->delete('disposisi');

		if($this->db->affected_rows() > 0){
			return TRUE;
		} else {
			return FALSE;
		}
	}


}

/* End of file surat_model.php */
/* Location: ./application/models/surat_model.php */