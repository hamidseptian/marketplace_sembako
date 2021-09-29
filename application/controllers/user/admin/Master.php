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
		$data['judul_konten']='Wellcome Admin';
		$data['toko']=$this->db->query("SELECT * from toko where status_toko = 'Mitra'")->num_rows();
		$this->admin->load('admin/template','admin/master/form/dashboard/dashboard', $data);
	}
	public function data_toko()
	{	$data['data']=$this->db->get('toko')->result_array();
		$data['judul_konten']='Data Toko';
		$data['menu']='Toko';
		$this->admin->load('admin/template','admin/master/form/toko/data_toko', $data);
	}
	public function tambah_toko()
	{
		$data['judul_konten_konten']='Tambah Toko';
		$data['menu']='Toko';
		$this->admin->load('admin/template','admin/master/form/toko/tambah_toko', $data);
	}
		
	public function hapus_toko($id)
	{
		$this->db->delete('toko', array('id_toko' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data toko berhasil dihapus</div>');
		redirect('user/admin/master/data_toko');
	}	
	public function hapus_pembayaran($idp , $idtoko)
	{
		$this->db->delete('setoran_toko', array('id_setoran' => $idp)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pembayaran toko dihapus</div>');
		redirect('user/admin/master/detail_penjualan_toko/'.$idtoko);
	}
	public function hapus_distributor($id)
	{
		$this->db->delete('distributor', array('id_distributor' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data distributor berhasil dihapus</div>');
		redirect('user/admin/master/distributor');
	}
	public function data_karyawan()
	{
		$this->template->load('template/template','homepage/homepage');
	}

	public function wilayah()
	{
		$data['data']=$this->db->get('kecamatan')->result_array();
		$data['judul_konten']='Data Wilayah';
		$data['menu']='Data Wilayah';
		$this->admin->load('admin/template','admin/master/form/wilayah/data_kecamatan', $data);
	}
	public function distributor()
	{
		$data['data']=$this->db->get('distributor')->result_array();
		$data['judul_konten']='Data Distributor';
		$data['menu']='Data Distributor';
		$this->admin->load('admin/template','admin/master/form/distributor/data_distributor', $data);
	}
	public function detail_wilayah($id)
	{
		$data['kec']=$this->db->get_where('kecamatan' , ['id_kecamatan'=>$id])->row_array();
		$data['data']=$this->db->get_where('kelurahan', ['id_kecamatan'=>$id])->result_array();
		$data['judul_konten']='Data Wilayah';
		$data['menu']='Data Wilayah';
		$this->admin->load('admin/template','admin/master/form/wilayah/data_kelurahan', $data);
	}
	public function edit_distributor($id)
	{
		$data['d']=$this->db->get_where('distributor' , ['id_distributor'=>$id])->row_array();
		$data['judul_konten']='Edit Distributor';
		$data['menu']='Distributor';
		$this->admin->load('admin/template','admin/master/form/distributor/edit_distributor', $data);
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

	public function penjualan()
	{	
		
		$data['judul_konten'] = "Data Penjualan Toko";
		$data['menu'] = "Data Penjualan Toko";
		$data['data'] = $this->db->query("SELECT * from toko where status_toko='Mitra'")->result_array() ;
		$this->admin->load('admin/template','admin/master/form/penjualan/penjualan', $data);
	}
	public function detail_penjualan_toko($idtoko)
	{	
				$toko = $this->db->query("SELECT * from toko where id_toko='$idtoko'")->row_array();

		$data['judul_konten'] = "Data Penjualan ".$toko['nama_toko'];
		$data['menu'] = "Data Penjualan Toko";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Selesai'")->result_array() ;


		$qsetoran = $this->db->query("SELECT sum(jumlah_setoran) as sudahstor from setoran_toko where id_toko='$idtoko'")->row_array();
		$data['listsetor'] = $this->db->query("SELECT * from setoran_toko where id_toko='$idtoko'")->result_array();
		$data['jdstor'] = $this->db->query("SELECT * from setoran_toko where id_toko='$idtoko'")->num_rows();
      $data['disetor'] = $qsetoran['sudahstor'];
      $data['idtoko'] = $idtoko;



		$this->admin->load('admin/template','admin/master/form/penjualan/detail_penjualan', $data);
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
	public function simpan_setoran()
	{
		$id = $this->input->post('idtoko');
		$tagihan = $this->input->post('tagihan');
		$dibayar = $this->input->post('dibayar');
		$tglbayar = date('Y-m-d');

		$data = [
			'id_toko'=>$id,
			'jumlah_setoran'=>$dibayar,
			'tanggal_setor'=>$tglbayar
		];
		if ($dibayar>$tagihan) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Gagal menyimpan pembayaran<br>Jumlah pembayaran melebihi jumlah tagihan</div>');
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pembayaran disimpan</div>');			
		$this->db->insert('setoran_toko', $data);
		}
		
		redirect('user/admin/master/detail_penjualan_toko/'.$id);
	}
	public function simpan_distributor()
	{
		
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$nohp = $this->input->post('nohp');
		$jenis = $this->input->post('jenis');
		$data = [
			'nama_distributor'=>$nama,
			'alamat'=>$alm,
			'nohp'=>$nohp,
			'jenis_distribusi_barang'=>$jenis
		];
		$this->db->insert('distributor', $data);
		
		redirect('user/admin/master/distributor/'.$id);
	}
	public function simpanedit_distributor()
	{
		
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$nohp = $this->input->post('nohp');
		$jenis = $this->input->post('jenis');
		$data = [
			'nama_distributor'=>$nama,
			'alamat'=>$alm,
			'nohp'=>$nohp,
			'jenis_distribusi_barang'=>$jenis
		];
		$this->db->update('distributor', $data, ['id_distributor'=>$id]);
		
		redirect('user/admin/master/distributor/'.$id);
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
