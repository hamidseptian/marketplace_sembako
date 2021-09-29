	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('homepage_model');
	}
	public function catatan(){
		$this->admin->load('admin/template','catatan');
	}
	public function index()
	{
		$idpelanggan= $this->session->userdata('id_user');
	$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;
			

		$data['barang'] = $this->db->query("SELECT * from barang join toko on toko.id_toko = barang.id_toko where toko.status_toko='Mitra'")->result_array();
		$this->home->load('home/template','home/form/home/home', $data);
	}
	public function barang_toko($id)
	{
		$idpelanggan= $this->session->userdata('id_user');
	$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;
			

		$data['barang'] = $this->db->query("SELECT * from barang join toko on toko.id_toko = barang.id_toko where toko.status_toko='Mitra' and barang.id_toko='$id'")->result_array();
		$data['toko']=$this->db->get_where('toko',['id_toko'=>$id])->row_array();
		
		$this->home->load('home/template','home/form/home/barang_mitra', $data);

	}
	public function mitra()
	{
		$idpelanggan= $this->session->userdata('id_user');
		// $data['keranjang'] = $this->db->query("SELECT * from pesanan 
		// 	join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
		// 	join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;


		$data['mitra'] = $this->db->get_where('toko', ['status_toko'=>'Mitra'])->result_array();
		$this->home->load('home/template','home/form/mitra/mitra', $data);
	}
	public function detail_barang($id)
	{	
		$idpelanggan= $this->session->userdata('id_user');
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;

		$data['detail'] = $this->db->query('SELECT * from barang join toko on toko.id_toko=barang.id_toko 
			left join kategori on barang.id_kategori=kategori.id_kategori where barang.id_barang='.$id)->row_array();
		$data['id'] = $id;
		$this->home->load('home/template','home/form/home/detail_barang', $data);
	}
	

	public function pencarian(){
		$idpelanggan= $this->session->userdata('id_user');
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang
			join toko on barang.id_toko=toko.id_toko where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;



		$key = $this->input->post('key');
		$data['barang'] = $this->db->query("SELECT * from barang 
			join toko on barang.id_toko=toko.id_toko where barang.nama_barang like '%$key%'")->result_array();
		$this->home->load('home/template','home/form/home/pencarian', $data);

	}
	public function kategori_barang($id){
		$idpelanggan= $this->session->userdata('id_user');
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;



		
		$data['barang'] = $this->db->query("SELECT * from barang left join toko on barang.id_toko=toko.id_toko where barang.id_kategori='$id'")->result_array();
		$this->home->load('home/template','home/form/home/pencarian', $data);

	}



	public function daftar()
	{	
		$data['kelurahan'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$this->home->load('home/template','home/form/daftar/daftar', $data);
	}
	public function simpan_pelanggan()
	{
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$idkel = $this->input->post('idkel');
		$pass = $this->input->post('pass');
		//$password = password_hash($pass, PASSWORD_DEFAULT);
		$jml = $this->db->get_where('pelanggan', ['email_pelanggan'=>$email])->num_rows();
		$data = [
			'nama_pelanggan'=>$nama,
			'alamat_pelanggan'=>$alm,
			'nohp_pelanggan'=>$hp,
			'email_pelanggan'=>$email,
			'password'=>$pass,
			'id_kelurahan'=>$idkel
			];
		if ($jml<=0) {
			$this->db->insert('pelanggan',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil disimpan <br>silahkan melakukan login </div>');
			redirect('auth/user');
		}
		else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan <br>Email sudah digunakan</div>');
			redirect('homepage/daftar');

		}
	}
	public function daftartoko()
	{	
		$data['kecamatan'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$this->home->load('home/template','home/form/daftar/daftar_toko', $data);
	}
	public function simpan_toko()
	{
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$pemilik = $this->input->post('pemilik');
		$desc = nl2br($this->input->post('desc'));
		$idkel = $this->input->post('idkel');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$pass = $this->input->post('pass');
		//$password = password_hash($pass, PASSWORD_DEFAULT);
		$jml = $this->db->get_where('toko', ['email_toko'=>$email])->num_rows();
		$data = [
			'nama_toko'=>$nama,
			'pemilik_toko'=>$pemilik,
			'desc_toko'=>$desc,
			'alamat_toko'=>$alm,
			'nohp_toko'=>$hp,
			'email_toko'=>$email,
			'password'=>$pass,
			'status_toko'=>'Pendaftaran',
			'id_kelurahan'=>$idkel
			];
		if ($jml<=0) {
			$this->db->insert('toko',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil disimpan <br>silahkan melakukan login </div>');
			redirect('auth/toko');
		}
		else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan <br>Email sudah digunakan</div>');
			redirect('homepage/');

		}
	}
/*	public function checkout(){
		$id = $this->input->post('id');
		$qty = $this->input->post('qty');
		$idbarang = $this->session->userdata('id_barang');
		if (isset($idbarang)) {
			$qtysebelumnya = $this->session->userdata('qty');
			$qtytambah = $qtysebelumnya +=$qty;
			$keranjang = $this->session->set_userdata(['id_barang'=>$id , 'qty'=>$qtytambah]);
		}
		else{
			$keranjang = $this->session->set_userdata(['id_barang'=>$id,'qty'=>$qty]);
		}
		echo $idbarang;

 }
 */

 public function cek_kelurahan(){
 	$idkec = $this->input->post('idkec');
 	$data = $this->db->get_where('kelurahan', ['id_kecamatan'=>$idkec])->result_array();
 	echo json_encode($data);

 }
}
