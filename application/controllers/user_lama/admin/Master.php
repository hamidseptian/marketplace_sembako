<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master extends CI_Controller {

	public function index()
	{
		// $this->session->set_userdata([
		// 	'nama_user'=>'Hamid Septian',
		// 	'id_admin'=>'ID Admin',
		// 	'level'=>'Administrator'
		// ]);
		//$this->session->sess_destroy();
		$data['judul']='Data Karyawan';
		$data['menu']='Data Karyawan';
		$this->admin->load('admin/template','admin/master/form/dashboard/dashboard', $data);
	}
	public function data_toko()
	{	$data['data']=$this->db->get('toko')->result_array();
		$data['judul']='Data Toko';
		$data['menu']='Toko';
		$this->admin->load('admin/template','admin/master/form/toko/data_toko', $data);
	}
	public function tambah_toko()
	{
		$data['judul_konten']='Tambah Toko';
		$data['menu']='Toko';
		$this->admin->load('admin/template','admin/master/form/toko/tambah_toko', $data);
	}
		
	public function hapus_toko($id)
	{
		$this->db->delete('toko', array('id_toko' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data toko berhasil dihapus</div>');
		redirect('user/admin/master/data_toko');
	}
	public function data_karyawan()
	{
		$this->template->load('template/template','homepage/homepage');
	}

	public function wilayah()
	{
		$data['data']=$this->db->get('kecamatan')->result_array();
		$data['judul']='Data Wilayah';
		$data['menu']='Data Wilayah';
		$this->admin->load('admin/template','admin/master/form/wilayah/data_kecamatan', $data);
	}
	public function detail_wilayah($id)
	{
		$data['kec']=$this->db->get_where('kecamatan' , ['id_kecamatan'=>$id])->row_array();
		$data['data']=$this->db->get_where('kelurahan', ['id_kecamatan'=>$id])->result_array();
		$data['judul']='Data Wilayah';
		$data['menu']='Data Wilayah';
		$this->admin->load('admin/template','admin/master/form/wilayah/data_kelurahan', $data);
	}
	public function hapus_kelurahan($id)
	{	
		$dtkec = $this->db->get_where('kelurahan', ['id_kelurahan'=>$id])->row_array();
		$idkecamatan = $dtkec['id_kecamatan'];
		// echo $idkecamatan;
		$data['kec']=$this->db->delete('kelurahan' , ['id_kelurahan'=>$id]);
		redirect('user/admin/master/detail_wilayah/'.$idkecamatan);
		
	}
	public function acctoko($id)
	{	
		$dtkec = $this->db->update('toko',['status_toko'=>'Mitra'], ['id_toko'=>$id]);
		
		redirect('user/admin/master/data_toko/');
		
	}
	public function simpan_kelurahan()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$data = [
			'id_kecamatan'=>$id,
			'nama_kelurahan'=>$nama
		];
		$this->db->insert('kelurahan', $data);
		
		redirect('user/admin/master/detail_wilayah/'.$id);
	}
	public function simpan_kecamatan()
	{
		
		$nama = $this->input->post('nama');
		$data = [
			
			'nama_kecamatan'=>$nama
		];
		$this->db->insert('kecamatan', $data);
		
		redirect('user/admin/master/wilayah/');
	}
}
