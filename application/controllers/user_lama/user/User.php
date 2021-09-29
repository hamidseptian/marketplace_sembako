<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$data['barang'] = $this->db->query("SELECT * from barang join toko on toko.id_toko = barang.id_toko")->result_array();
		$idmember= $this->session->userdata('id_user');

		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_member = '$idmember' and status_pesanan = 'Masuk Ke Keranjang'")->result_array() ;

		// $data['totalbelanja'] = $this->db->query("SELECT sum()from pesanan where id_member = '$idmember' and status_pesanan ='Order' ") ;
		$data['jmlitem'] = $this->db->query("SELECT * from pesanan where id_member = '$idmember'  and status_pesanan = 'Masuk Ke Keranjang'")->num_rows(); 
	
		$this->home->load('home/template','home/form/home/home', $data);
	}
	
	public function keranjang()
	{
		$idmember= $this->session->userdata('id_user');
		// $data['idmember']=$idmember;
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$idmember' and status_pesanan = 'Masuk Ke Keranjang' group by barang.id_toko")->result_array() ;
		$data['j1'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$idmember' and status_pesanan = 'Masuk Ke Keranjang' group by barang.id_toko")->num_rows() ;
		
		// foreach ($data['keranjang'] as $d1) {
		// 	$idtoko = $d1['id_toko'];

		// 	$data['barang_belanjaan'] = $this->db->query("SELECT * from pesanan 
		// 	join member on member.id_member = pesanan.id_member
		// 	join barang on barang.id_barang = pesanan.id_barang 
		// 	where pesanan.id_member = '$idmember' and status_pesanan = 'Order' and barang.id_toko='$idtoko'")->result_array() ;
		// }

		// $data['totalbelanja'] = $this->db->query("SELECT sum()from pesanan where id_member = '$idmember' and status_pesanan ='Order' ") 
	
		$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function simpan_pesanan()
	{
		$idmember= $this->session->userdata('id_user');
		$id_barang = $this->input->post('idb');
		$idtoko = $this->input->post('idtoko');
		$qty = $this->input->post('qty');
		$datainput = [
			'id_member'=>$idmember,
			'id_barang'=>$id_barang,
			'qty'=>$qty,
			//'tanggal_pesan'=>date('Y-m-d'),
			'id_toko'=>$idtoko,
			'status_pesanan'=>'Masuk Ke Keranjang'
		];
		$this->db->insert('pesanan', $datainput);
		redirect('homepage');
		
	
		//$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function hapus_pesanan($id){
		$this->db->delete('pesanan', ['id_pesanan'=>$id]);
		redirect('user/user/user/keranjang');

	}

	public function konfirmasi_pesanan()
	{
		$idmember= $this->session->userdata('id_user');
		
		$data = [
			'status_pesanan'=>'Order',
			'tanggal_pesan'=>date('Y-m-d')
		];
		$where = ['id_member'=>$idmember, 'status_pesanan'=>'Masuk Ke Keranjang'];
		$this->db->update('pesanan', $data, $where);
		redirect('user/user/user/detail_pesanan/'.date('Y-m-d'));
		
	
		//$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function history()
	{
		$idmember= $this->session->userdata('id_user');
		// $data['idmember']=$idmember;
		$data['data'] = $this->db->query("SELECT * from pesanan 
			where pesanan.id_member = '$idmember' and status_pesanan != 'Masuk Ke Keranjang' group by tanggal_pesan ")->result_array() ;
		$this->home->load('home/template','user/form/pesanan/history', $data);
	}

	public function detail_pesanan($tgl)
	{
		$idmember= $this->session->userdata('id_user');
		// $data['idmember']=$idmember;
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$idmember' and status_pesanan != 'Masuk Ke Keranjang' and pesanan.tanggal_pesan='$tgl' group by barang.id_toko")->result_array() ;
		$data['j1'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$idmember' and status_pesanan != 'Masuk Ke Keranjang' and pesanan.tanggal_pesan='$tgl' group by barang.id_toko")->num_rows() ;
		$pt = explode('-',$tgl);

		$data['tgl']=$pt[2].'-'.$pt[1].'-'.$pt[0];
		$this->home->load('home/template','user/form/pesanan/detail_pesanan', $data);
	}
	public function edit_akun()
	{	$idmember= $this->session->userdata('id_user');
		$data['kelurahan'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$data['data'] = $this->db->query("SELECT * from member where id_member='$idmember'")->row_array();
		$this->home->load('home/template','user/form/dashboard/editakun', $data);
	}
	public function simpanedit_member()
	{
		$idmember= $this->session->userdata('id_user');
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$idkel = $this->input->post('idkel');
		$pass = $this->input->post('pass');
		//$password = password_hash($pass, PASSWORD_DEFAULT);
		$jml = $this->db->get_where('member', ['email_member'=>$email])->num_rows();
		$data = [
			'nama_member'=>$nama,
			'alamat_member'=>$alm,
			'nohp_member'=>$hp,
			'email_member'=>$email,
			'password'=>$pass,
			'id_kelurahan'=>$idkel
			];
		if ($jml<=1) {
			$this->db->where('id_member', $idmember);
			$this->db->update('member',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data member berhasil disimpan <br>silahkan melakukan login </div>');
			redirect('user/user/user/edit_akun');
		}
		else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan <br>Email sudah digunakan</div>');
			redirect('user/user/user/edit_akun');

		}
	}

	
}
