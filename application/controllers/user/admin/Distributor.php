<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Distributor extends CI_Controller {

	public function index()
	{
		// $this->session->set_userdata([
		// 	'nama_user'=>'Hamid Septian',
		// 	'id_admin'=>'ID Admin',
		// 	'level'=>'Administrator'
		// ]);
		//$this->session->sess_destroy();
	$idd=$this->session->userdata('id_admin');
		$data['judul_konten']='Wellcome';
		$data['new']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Order')")->num_rows();
		$data['proses']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Di Proses')")->num_rows();
		$data['selesai']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Selesai' or a.status='Dibatalkan Distributor')")->num_rows();
		$data['user'] = $this->db->get_where('distributor', ['id_distributor'=>$idd])->row_array();
		$this->admin->load('admin/template','admin/distributor/form/dashboard/dashboard', $data);
	}
	public function pesanan_baru()
	{	
	$idd=$this->session->userdata('id_admin');
	$data['data']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Order')")->result_array();
		$data['judul_konten']='Pesanan Anda';
		$data['menu']='Pesanan';
		$this->admin->load('admin/template','admin/distributor/form/pesanan/baru', $data);
	}
	public function pesanan_selesai()
	{	
	$idd=$this->session->userdata('id_admin');
	$data['data']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Dibatalkan Distributor' or a.status='Selesai')")->result_array();
		$data['judul_konten']='Pesanan Anda';
		$data['menu']='Pesanan';
		$this->admin->load('admin/template','admin/distributor/form/pesanan/selesai', $data);
	}
	public function pesanan_diproses()
	{	
	$idd=$this->session->userdata('id_admin');
	$data['data']=$this->db->query("SELECT * from pesanan_distributor as a left join toko as b on a.id_toko = b.id_toko where a.id_distributor='$idd' and (a.status ='Di Proses')")->result_array();
		$data['judul_konten']='Pesanan Anda';
		$data['menu']='Pesanan';
		$this->admin->load('admin/template','admin/distributor/form/pesanan/proses', $data);
	}
		public function batalkan_pesanan_distributor($id)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Dibatalkan Toko";
		$rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan_distributor set status='Dibatalkan Distributor' where id_pesanan='$id'") ;
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan dibatalkan</div>');
		redirect('user/admin/distributor/pesanan_baru');
	}
		public function proses_pesanan_distributor($id)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Dibatalkan Toko";
		// $rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan_distributor set status='Di proses' where id_pesanan='$id'") ;
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan Diproses</div>');
		redirect('user/admin/distributor/pesanan_baru');
	}

		public function selesai_pesanan_distributor($id)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Dibatalkan Toko";
		// $rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan_distributor set status='Selesai' where id_pesanan='$id'") ;
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Proses Pemesanan Barang Selesai</div>');
		redirect('user/admin/distributor/pesanan_baru');
	}
}
