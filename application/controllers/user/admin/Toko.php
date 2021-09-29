<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {
	public function __construct(){
		date_default_timezone_set('Asia/Jakarta');
		parent:: __construct();
	
		$login = $this->session->userdata('status');
		if ($login!=true) {
					$this->db->delete('barang', array('id_barang' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Anda harus login dulu</div>');
		redirect('auth/toko');
		}
	
	}
	public function index()
	{
		$data['judul_konten']='Selamat Datang';
		$data['menu']='Dashboard';
		$idtoko = $this->session->userdata('id_admin');
		$data['jkaryawan'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->num_rows();
		$data['jbarang'] = $this->db->get_where('barang', ['id_toko'=>$idtoko])->num_rows();
		$data['jpesananselesai'] = $this->db->get_where('pesanan', ['id_toko'=>$idtoko, 'status_pesanan'=>'Selesai'])->num_rows();
		$data['jpesananbaru'] = $this->db->get_where('pesanan', ['id_toko'=>$idtoko, 'status_pesanan'=>'Order'])->num_rows();
		$data['jpesanandiantarkan'] = $this->db->get_where('pesanan', ['id_toko'=>$idtoko, 'status_pesanan'=>'Diantarkan'])->num_rows();
		$data['jpesanancancel'] = $this->db->query("SELECT * from pesanan where id_toko='$idtoko' and (status_pesanan='Dibatalkan Pelanggan' or status_pesanan='Dibatalkan Toko') ")->num_rows();
		$data['jongkir'] = $this->db->get_where('ongkir', ['id_toko'=>$idtoko])->num_rows();
		$this->admin->load('admin/template','admin/toko/form/dashboard/dashboard', $data);
	}
	public function data_barang()
	{	
		$idtoko = $this->session->userdata('id_admin');
	//	echo $idtoko;
		$data['data']=$this->db->query("SELECT * from barang left join kategori on barang.id_kategori = kategori.id_kategori where id_toko='$idtoko'")->result_array();
		$data['judul_konten']='Data Barang';
		$data['menu']='Data Barang';
		$this->admin->load('admin/template','admin/toko/form/barang/data_barang', $data);
	}
	public function print_barang()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['toko'] = $this->db->get_where('toko', ['id_toko'=>$idtoko])->row_array();
	//	echo $idtoko;
		$data['data']=$this->db->query("SELECT * from barang left join kategori on barang.id_kategori = kategori.id_kategori where id_toko='$idtoko'")->result_array();
		$data['judul_konten']='Data Barang';
		$data['menu']='Data Barang';
		
		$print = $this->load->view('admin/toko/form/barang/print_barang', $data);

		// $mpdf = new \Mpdf\Mpdf();
		// $mpdf->WriteHTML($print);
		// $mpdf->Output();
	}
	public function hapusbarang($id)
	{
		$this->db->delete('barang', array('id_barang' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data barang berhasil dihapus</div>');
		redirect('user/admin/toko/data_barang');
	}

	public function pemesanan()
	{	$data['data']=$this->db->query('SELECT * , sum(pemesanan.qty) as jml from pemesanan join barang on barang.id_barang=pemesanan.id_barang join pelanggan on pelanggan.id_pelanggan = pemesanan.id_pelanggan group by pelanggan.nama_pelanggan asc')->result_array();
		$data['judul_konten']='Data Pemesanan';
		$data['menu']='Pemesanan';
		$this->admin->load('admin/template','admin/toko/form/pemesanan/data_pemesanan', $data);
	}
	public function tambah_barang()
	{
		$data['judul_konten']='Tambah Barang';
		$data['menu']='Data Barang';
		$data['kategori']=$this->db->get('kategori')->result_array();
		$this->admin->load('admin/template','admin/toko/form/barang/tambah_barang', $data);
	}
	public function tambahkaryawan()
	{
		$data['judul_konten']='Tambah Karyawan';
		$data['menu']='Data Karyawan';
		$this->admin->load('admin/template','admin/toko/form/karyawan/tambah_karyawan', $data);
	}
	public function tambahrekening()
	{
		$data['judul_konten']='Tambah rekening';
		$data['menu']='Data rekening';
		$this->admin->load('admin/template','admin/toko/form/rekening/tambah_rekening', $data);
	}

	public function tambahpoin()
	{

		$data['judul_konten']='Tambah poin';
		$data['menu']='Data poin';
		$this->admin->load('admin/template','admin/toko/form/poin/tambah_poin', $data);
	}
	public function tambahdiskon()
	{
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten']='Tambah diskon';
		$data['menu']='Data diskon';
		$data['barang'] = $this->db->query("SELECT * from barang where id_toko='$idtoko'")->result_array();
		$this->admin->load('admin/template','admin/toko/form/diskon/tambah_diskon', $data);
	}
	public function editdiskon($id)
	{
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten']='Tambah diskon';
		$data['menu']='Data diskon';
		$data['diskon'] = $this->db->get_where('diskon', ['id_diskon'=>$id])->row_array();
		$data['barang'] = $this->db->query("SELECT * from barang where id_toko='$idtoko'")->result_array();
		$this->admin->load('admin/template','admin/toko/form/diskon/edit_diskon', $data);
	}

	 public function simpan_karyawan(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$nama = $this->input->post('nama');
			$alm = $this->input->post('alm');
			$hp = $this->input->post('hp');
			$jabatan = $this->input->post('jabatan');
			$datainput = [
				'id_toko'=>$idtoko,
				'nama_karyawan'=>$nama,
				
				'alamat_karyawan'=>$alm,
				'nohp_karyawan'=>$hp,
				'jabatan_karyawan'=>$jabatan
				];
				$this->db->insert('karyawan',$datainput);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil disimpan</div>');
				redirect('user/admin/toko/karyawan');
	    
	}
	 public function simpan_rekening(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$nama = $this->input->post('nama');
			$bank = $this->input->post('bank');
			$nr = $this->input->post('nr');
			$jabatan = $this->input->post('jabatan');
			$datainput = [
				'id_toko'=>$idtoko,
				'nama_rekening'=>$nama,
				
				'bank'=>$bank,
				'no_rekening'=>$nr
				];
				$this->db->insert('rekening',$datainput);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil disimpan</div>');
				redirect('user/admin/toko/rekening');
	    
	}
	 public function simpan_diskon(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$barang = $this->input->post('barang');
	 		$tglbook = $this->input->post('tglbook');
	 		$mulai = $this->input->post('mulai');
	 		$selesai = $this->input->post('selesai');
		
			$tglm = strtotime($mulai);
			$tgls = strtotime($selesai);
			if ($tgls<$tglm) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data gagal berhasil disimpan<br>Tangal selesai tidak boleh lebih kecil dari tanggal mulai</div>');
				redirect('user/admin/toko/tambahdiskon');
			}else{
				
				$datainput = [
				'id_toko'=>$idtoko,
				' id_barang'=>$barang,
				'diskon'=>$tglbook,
				'mulai'=>$mulai,
				'selesai'=>$selesai,
				'status '=>'Aktif'
				];
			
				$this->db->insert('diskon',$datainput);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data diskon berhasil disimpan</div>');
				redirect('user/admin/toko/diskon');

			}
			
	    
	}
	 public function simpanedit_diskon($id){

	        $idtoko=$this->session->userdata('id_admin');
	 		$barang = $this->input->post('barang');
	 		$tglbook = $this->input->post('tglbook');
	 		$mulai = $this->input->post('mulai');
	 		$selesai = $this->input->post('selesai');
		
			$tglm = strtotime($mulai);
			$tgls = strtotime($selesai);
			if ($tgls<$tglm) {
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data gagal berhasil disimpan<br>Tangal selesai tidak boleh lebih kecil dari tanggal mulai</div>');
				redirect('user/admin/toko/tambahdiskon');
			}else{
				
				$datainput = [
				
				' id_barang'=>$barang,
				'diskon'=>$tglbook,
				'mulai'=>$mulai,
				'selesai'=>$selesai,
				
				];
			
				$this->db->update('diskon',$datainput, ['id_diskon'=>$id]);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data diskon berhasil diperbaharui</div>');
				redirect('user/admin/toko/diskon');

			}
			
	    
	}
	 public function simpan_poin(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$syarat = $this->input->post('syarat');
			$poin = $this->input->post('poin');
			$datainput = [
				'id_toko'=>$idtoko,
				'syarat'=>$syarat,
				
				'poin'=>$poin
				];
				$this->db->insert('poin',$datainput);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data poin berhasil disimpan</div>');
				redirect('user/admin/toko/poin');
	    
	}
	 public function simpanedit_karyawan(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$id = $this->input->post('id');
	 		$nama = $this->input->post('nama');
			$alm = $this->input->post('alm');
			$hp = $this->input->post('hp');
			$jabatan = $this->input->post('jabatan');
			$datainput = [
				
				'nama_karyawan'=>$nama,
				
				'alamat_karyawan'=>$alm,
				'nohp_karyawan'=>$hp,
				'jabatan_karyawan'=>$jabatan
				];
				$this->db->update('karyawan',$datainput, ['id_karyawan'=>$id]);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil diperbaharui</div>');
				redirect('user/admin/toko/karyawan');
	    
	}
	 public function simpanedit_rekening(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$id = $this->input->post('id');
	 		$nama = $this->input->post('nama');
			$bank = $this->input->post('bank');
			$nr = $this->input->post('nr');
			
			$datainput = [
				
				'nama_rekening'=>$nama,
				
				'bank'=>$bank,
				'no_rekening'=>$nr
				
				];
				$this->db->update('rekening',$datainput, ['id_rekening'=>$id]);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil diperbaharui</div>');
				redirect('user/admin/toko/rekening');
	    
	}

	 public function simpanedit_poin(){

	        $idtoko=$this->session->userdata('id_admin');
	 		$id = $this->input->post('id');
	 		$syarat = $this->input->post('syarat');
			$poin = $this->input->post('poin');			
			$datainput = [
				
				'syarat'=>$syarat,
				
				'poin'=>$poin
				];
				$this->db->update('poin',$datainput, ['id_poin'=>$id]);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data poin berhasil diperbaharui</div>');
				redirect('user/admin/toko/poin');
	    
	}


	 public function simpan_barang(){
 		
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/barang/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;
	        $idtoko=$this->session->userdata('id_admin');
	 		$nama = $this->input->post('nama');
			$hb = $this->input->post('hb');
			$hj = $this->input->post('hj');
			$stok = $this->input->post('stok');
			$satuan = $this->input->post('satuan');
			$kategori = $this->input->post('kategori');
			$poin = $this->input->post('poin');
			$datainput = [
				'id_toko'=>$idtoko,
				'nama_barang'=>$nama,
				
				'harga_jual'=>$hj,
				'gambar'=>$namabaru,
				'satuan_barang'=>$satuan,
				'id_kategori'=>$kategori,
				'stok'=>$stok,
				'tukar_poin'=>$poin
				];
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 
	        if ( ! $this->upload->do_upload('berkas')){
	            
	                 $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Gambar gagal ditambahkan</h4>
	               Silahkan dicoba lagi dengan extensi file yang benar
	              </div>');
	                 echo $this->upload->display_errors();
	                    echo "gagal";
	              // redirect('admin/file/');
	        }else{
	                $data = array('upload_data' => $this->upload->data());
	                
	            //    $this->admin_query->simpan_file();
	                $akses =$this->input->post('akses');
	                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Upload Success</h4>
	               File berhasil di upload
	              </div>');
	             $this->db->insert('barang',$datainput);
	          redirect('user/admin/toko/data_barang');
	        }
	}

	 public function kelola_stok()
	 {
 			$idtoko = $this->session->userdata('id_admin');
	 		$idb = $this->input->post('idb');
			$qty = $this->input->post('stok');
			$data = array_combine($idb, $qty);
			foreach ($data as $idbarang => $stock) {
				$cek = $this->db->query("SELECT * from barang where id_barang='$idbarang' and id_toko='$idtoko'")->row_array();
				$stoklama = $cek['stok'];
				@$stokbaru = $stoklama + $stock;
				echo $stock.'<br>';
				$update = $this->db->query("UPDATE barang set stok = '$stokbaru' where id_toko='$idtoko' and id_barang='$idbarang'");
			}
	          redirect('user/admin/toko/data_barang');
		
	}
		public function simpan_toko()
	{
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$hp = $this->input->post('hp');
		$idkel = $this->input->post('idkel');
		$email = $this->input->post('email');
		$pass = '123';
		$password = password_hash($pass, PASSWORD_DEFAULT);
		$jml = $this->db->get_where('toko', ['email_toko'=>$email])->num_rows();
		$data = [
			'nama_toko'=>$nama,
			'alamat_toko'=>$alm,
			'nohp_toko'=>$hp,
			'email_toko'=>$email,
			'password'=>$password,
			'status_toko'=>'Pendaftaran',
			'id_kelurahan'=>$idkel
			];
		if ($jml<=0) {
			$this->db->insert('toko',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data pelanggan berhasil disimpan <br>silahkan melakukan login </div>');
			redirect('user/admin/toko/data_toko');
		}
		else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan <br>Email sudah digunakan</div>');
			redirect('user/admin/toko/data_toko');

		}
	}

	public function karyawan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Karyawan";
		$data['menu'] = "Data Karyawan";
		
		$data['data'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/karyawan/karyawan', $data);
	}
	public function rekening()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Rekening";
		$data['menu'] = "Data Rekening";
		
		$data['data'] = $this->db->get_where('rekening', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/rekening/rekening', $data);
	}
	public function poin()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data poin";
		$data['menu'] = "Data poin";
		
		$data['data'] = $this->db->get_where('poin', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/poin/poin', $data);
	}
	public function diskon()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data poin";
		$data['menu'] = "Data poin";
		
		$data['data'] = $this->db->query("SELECT * from diskon as a left join barang as b on a.id_barang=b.id_barang where a.id_toko='$idtoko'")->result_array();
		$this->admin->load('admin/template','admin/toko/form/diskon/diskon', $data);
	}
	public function pesanan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Order' group by pesanan.id_pelanggan, pesanan.tanggal_pesan, pesanan.waktu_pesan")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
	}
	public function penukaran_poin()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Penukaran Poin";
		$data['menu'] = "Data Penukaran Poin";
		$data['data'] = $this->db->query("SELECT * from poin_pelanggan 
			left join pelanggan on pelanggan.id_pelanggan = poin_pelanggan.id_pelanggan
			left join barang on barang.id_barang = poin_pelanggan.id_barang
			
			where barang.id_toko = '$idtoko' and poin_pelanggan.jenis='-'")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/poin/penukaran', $data);
	}
	public function pesanan_distributor()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan Distributor";
		$data['menu'] = "Pesanan distributor";
		$data['data'] = $this->db->query("SELECT * from pesanan_distributor 
			join distributor on distributor.id_distributor = pesanan_distributor.id_distributor
			join toko on toko.id_toko = pesanan_distributor.id_toko 
			where pesanan_distributor.id_toko = '$idtoko'")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/distributor/pesanan', $data);
	}
	public function print_pesanan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['toko'] = $this->db->get_where('toko', ['id_toko'=>$idtoko])->row_array();
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Order'")->result_array() ;
		$print = $this->load->view('admin/toko/form/pesanan/print_pesanan', $data);
	}
	public function print_penjualan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['toko'] = $this->db->get_where('toko', ['id_toko'=>$idtoko])->row_array();
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Selesai'")->result_array() ;
		$print = $this->load->view('admin/toko/form/penjualan/print_penjualan', $data);
	}
	public function pesanan_diantar()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Diantarkan' group by pesanan.id_pelanggan, pesanan.tanggal_pesan, pesanan.waktu_pesan")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
	}
	public function pesanan_cancel()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and (status_pesanan = 'Dibatalkan Toko' or status_pesanan = 'Dibatalkan Pelanggan') group by pesanan.id_pelanggan, pesanan.tanggal_pesan, pesanan.waktu_pesan")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
	}
	public function penjualan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Penjualan";
		$data['menu'] = "Data Penjualan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_toko = '$idtoko' and status_pesanan = 'Selesai' and bersihkan=''")->result_array() ;

		$qsetoran = $this->db->query("SELECT sum(jumlah_setoran) as sudahstor from setoran_toko where id_toko='$idtoko'")->row_array();
		$data['listsetor'] = $this->db->query("SELECT * from setoran_toko where id_toko='$idtoko'")->result_array();
		$data['jdstor'] = $this->db->query("SELECT * from setoran_toko where id_toko='$idtoko'")->num_rows();
      $data['disetor'] = $qsetoran['sudahstor'];
      

		$this->admin->load('admin/template','admin/toko/form/penjualan/penjualan', $data);
	}
	public function bersihkan_penjualan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$this->db->update('pesanan', ['bersihkan'=>'Ya'], ['id_toko'=>$idtoko, 'status_pesanan'=>'Selesai', 'bersihkan'=>'']);
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Data penjualan berhasil dihapus</div>');
		redirect('user/admin/toko/penjualan');
	}

	public function lihat_pesanan($id, $tgl, $waktu, $pembayaran='')
	{	
		$idtoko = $this->session->userdata('id_admin');
		$pt=explode('-', $tgl);
		$data['tgl_pesan'] = $pt[2].'-'.$pt[1].'-'.$pt[0];
		$data['tgl'] = $tgl;
		$data['waktu'] = $waktu;
		$data['id'] = $id;
		$data['pembayaran'] = $pembayaran;
		$querypemb = "SELECT * from pembayaran join rekening on pembayaran.id_rekening = rekening.id_rekening where pembayaran.id_toko='$idtoko' and pembayaran.id_pelanggan='$id' and tanggal_pesan='$tgl' and waktu_pesan='$waktu' order by pembayaran.id_pembayaran  desc limit 1";
		$data['det_pembayaran'] = $this->db->query($querypemb)->row_array();
		$data['dibayar'] = $this->db->query($querypemb)->num_rows();

		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			where pesanan.id_pelanggan = '$id' and  (status_pesanan != 'Masuk Ke Keranjang')  and pesanan.id_toko='$idtoko' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu'")->row_array() ;
		$idkel = $data['pelanggan']['id_kelurahan'];
		$data['ongkir'] = $this->db->query("SELECT * from ongkir where id_kelurahan='$idkel' and id_toko='$idtoko'")->row_array();
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$id' and (status_pesanan != 'Masuk Ke Keranjang') and barang.id_toko='$idtoko' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu'")->result_array() ;
		$data['rider'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/pesanan/detail_pesanan', $data);
	}
	public function print_faktur($id, $tgl, $waktu)
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['toko'] = $this->db->get_where('toko', ['id_toko'=>$idtoko])->row_array();
		$pt=explode('-', $tgl);
		$data['tgl_pesan'] = $pt[2].'-'.$pt[1].'-'.$pt[0];
		$data['tgl'] = $tgl;
		$data['waktu'] = $waktu;
		$data['id'] = $id;
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			where pesanan.id_pelanggan = '$id' and  (status_pesanan != 'Masuk Ke Keranjang')  and pesanan.id_toko='$idtoko' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu'")->row_array() ;
		$idkel = $data['pelanggan']['id_kelurahan'];
		$data['ongkir'] = $this->db->query("SELECT * from ongkir where id_kelurahan='$idkel' and id_toko='$idtoko'")->row_array();
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$id' and (status_pesanan != 'Masuk Ke Keranjang') and barang.id_toko='$idtoko' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu'")->result_array() ;
		$data['rider'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->result_array();
		$this->load->view('admin/toko/form/pesanan/print_faktur', $data);
	}
	public function konfirmasi_pesanan($id, $tgl, $waktu)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = $this->input->post('status');
		$rider = $this->input->post('rider');
		$belanja = $this->input->post('belanja');

		$poin = $this->db->query("SELECT * from poin where id_toko='$idtoko' and syarat<'$belanja'")->row_array();
		$jdatapoin = $this->db->query("SELECT * from poin where id_toko='$idtoko' and syarat<'$belanja'")->num_rows();
		$idpoin = $poin['id_poin'];
		if ($jdatapoin>0) {
			
		$datainsert = [
			'id_poin'=>$idpoin,
			'id_toko'=>$idtoko,
			'id_pelanggan'=>$id,
			'jenis'=>'+',
			'tanggal'=>date('Y-m-d h:i:s'),
			'jumlah_transaksi'=>$belanja
		];
		$this->db->insert('poin_pelanggan', $datainsert);
		}

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan set status_pesanan='$status' , id_karyawan='$rider'
			where id_pelanggan='$id' and id_toko='$idtoko' and tanggal_pesan='$tgl' and waktu_pesan='$waktu'
			") ;
		redirect('user/admin/toko/pesanan');
	}
	public function pesanan_diterima($id, $tgl, $waktu)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Selesai";
		$rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan set status_pesanan='$status' 
			where id_pelanggan='$id' and id_toko='$idtoko' and tanggal_pesan='$tgl' and waktu_pesan='$waktu'
			") ;
		redirect('user/admin/toko/penjualan');
	}
	public function batalkan_pesanan($id, $tgl, $waktu)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Dibatalkan Toko";
		$rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("UPDATE pesanan set status_pesanan='$status' , id_karyawan='$rider'
			where id_pelanggan='$id' and id_toko='$idtoko' and tanggal_pesan='$tgl' and waktu_pesan='$waktu'
			") ;
		redirect('user/admin/toko/pesanan');
	}
	public function acc_pembayaran($id, $tgl, $waktu)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Acc";
	

	
		$data['pelanggan'] = $this->db->query("UPDATE pembayaran set status='$status' 
			where id_pelanggan='$id' and id_toko='$idtoko' and tanggal_pesan='$tgl' and waktu_pesan='$waktu'
			") ;
		redirect('user/admin/toko/pesanan');
	}
	public function tolak_pembayaran($id, $tgl, $waktu)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Ditolak";
	

	
		$data['pelanggan'] = $this->db->query("UPDATE pembayaran set status='$status' 
			where id_pelanggan='$id' and id_toko='$idtoko' and tanggal_pesan='$tgl' and waktu_pesan='$waktu'
			") ;
		redirect('user/admin/toko/pesanan');
	}
	public function batalkan_pesanan_distributor($id)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$status = "Dibatalkan Toko";
		$rider = $this->input->post('rider');

		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("DELETE from pesanan_distributor	where id_pesanan='$id'") ;
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan dibatalkan</div>');
		redirect('user/admin/toko/pesanan_distributor');
	}

	public function hapuskaryawan($id)
	{
		$this->db->delete('karyawan', array('id_karyawan' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil dihapus</div>');
		redirect('user/admin/toko/karyawan');
	}
	public function hapusrekening($id)
	{
		$this->db->delete('rekening', array('id_rekening' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data rekening berhasil dihapus</div>');
		redirect('user/admin/toko/rekening');
	}
	public function hapuspoin($id)
	{
		$this->db->delete('poin', array('id_poin' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data poin berhasil dihapus</div>');
		redirect('user/admin/toko/poin');
	}
	public function hapusdiskon($id)
	{
		$this->db->delete('diskon', array('id_diskon' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data diskon berhasil dihapus</div>');
		redirect('user/admin/toko/diskon');
	}
	public function terima_penukaran($id, $idb, $stok)
	{
		$stoksisa = $stok-1;
		$this->db->update('poin_pelanggan',['status_penukaran'=>'Penukaran Disetujui'], array('id_poin_plg' => $id)); 
		$this->db->update('barang',['stok'=>$stoksisa], array('id_barang' => $idb)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Penukaran diterima</div>');
		redirect('user/admin/toko/penukaran_poin');
	}
	public function tolak_penukaran($id)
	{
		
		$this->db->update('poin_pelanggan',['status_penukaran'=>'Penukaran Ditolak Toko'], array('id_poin_plg' => $id)); 
		
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Penukaran ditolak</div>');
		redirect('user/admin/toko/penukaran_poin');
	}
	public function penukaran_diterima_pelanggan($id)
	{
		
		$this->db->update('poin_pelanggan',['status_penukaran'=>'Penukaran Selesai'], array('id_poin_plg' => $id)); 
		
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Barang yang ditukar sudah sampai ke pelanggan</div>');
		redirect('user/admin/toko/penukaran_poin');
	}
	public function ongkir(){
		$idtoko=$this->session->userdata('id_admin');
		$data['ongkir']= $this->db->query("SELECT * FROM ongkir join kelurahan on kelurahan.id_kelurahan = ongkir.id_kelurahan 
			join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan where ongkir.id_toko='$idtoko'")->result_array();
		$data['j1']= $this->db->query("SELECT * FROM ongkir join kelurahan on kelurahan.id_kelurahan = ongkir.id_kelurahan 
			join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan where ongkir.id_toko='$idtoko'")->num_rows();
		$data['judul_konten']="Data Ongkir ";
		$data['menu']="Data Ongkir ";
		$this->admin->load('admin/template','admin/toko/form/ongkir/data_ongkir', $data);
	}
	
	public function add_ongkir(){
		$data['kelurahan'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$data['idtoko']=$this->session->userdata('id_admin');
		$this->admin->load('admin/template','admin/toko/form/ongkir/add_ongkir', $data);
	}
	public function simpan_ongkir()
	{
		$idkel = $this->input->post('idkel');
		$ongkir = $this->input->post('ongkir');
		$idtoko = $this->input->post('idtoko');
		$dataongkir = array_combine($idkel, $ongkir);
		foreach ($dataongkir as $idkelurahan => $dtongkir) {
			// echo $idkelurahan."=>".$dtongkir."<br>";
			$data = [
				'id_kelurahan'=>$idkelurahan,
				'ongkir'=>$dtongkir,
				'id_toko'=>$idtoko
			];
			$this->db->insert('ongkir', $data);
		}
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data ongkir berhasil disimpan</div>');
		redirect('user/admin/toko/ongkir');
	}
	public function kelola_ongkir(){
		$data['idtoko']=$this->session->userdata('id_admin');
		$idtoko=$this->session->userdata('id_admin');
		$data['kelurahan'] = $this->db->query("SELECT * from ongkir join kelurahan on ongkir.id_kelurahan = kelurahan.id_kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan where ongkir.id_toko='$idtoko'")->result_array();
		$this->admin->load('admin/template','admin/toko/form/ongkir/edit_ongkir', $data);
	}

	public function simpanedit_ongkir()
	{
		$idkel = $this->input->post('idkel');
		$ongkir = $this->input->post('ongkir');
		$idtoko = $this->input->post('idtoko');
		$dataongkir = array_combine($idkel, $ongkir);
		foreach ($dataongkir as $idkelurahan => $dtongkir) {
			//echo $idkelurahan."=>".$dtongkir."<br>";
			$data = [
				'id_kelurahan'=>$idkelurahan,
				
				'id_toko'=>$idtoko
			];
			$update = ['ongkir'=>$dtongkir];
			$this->db->update('ongkir', $update,  $data);
		}
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data ongkir berhasil disimpan</div>');
			redirect('user/admin/toko/ongkir');
		
	}
	public function editbarang($id){
		$data['data']= $this->db->get_where('barang',['id_barang'=>$id])->row_array();
		$data['judul_konten']='Perbaharui Data Barang';
		$data['menu']='Data Barang';
		$data['kategori']=$this->db->get('kategori')->result_array();
		$this->admin->load('admin/template','admin/toko/form/barang/edit_barang', $data);

	}
	public function editkaryawan($id){
		$data['data']= $this->db->get_where('karyawan',['id_karyawan'=>$id])->row_array();
		$data['judul_konten']='Perbaharui Data Karyawan';
		$data['menu']='Data Karyawan';

		$this->admin->load('admin/template','admin/toko/form/karyawan/edit_karyawan', $data);

	}
	public function editrekening($id){
		$data['data']= $this->db->get_where('rekening',['id_rekening'=>$id])->row_array();
		$data['judul_konten']='Perbaharui Data rekening';
		$data['menu']='Data rekening';

		$this->admin->load('admin/template','admin/toko/form/rekening/edit_rekening', $data);

	}
	public function editpoin($id){
		$data['data']= $this->db->get_where('poin',['id_poin'=>$id])->row_array();
		$data['judul_konten']='Perbaharui Data poin';
		$data['menu']='Data poin';

		$this->admin->load('admin/template','admin/toko/form/poin/edit_poin', $data);

	}
	public function simpanedit_barang(){
 			$id=$this->input->post('id');
	 	 $this->load->helper(array('form'));
	        $config['upload_path']          = './file/barang/gambar/';
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|gif';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;
	        $idtoko=$this->session->userdata('id_admin');
	 		$nama = $this->input->post('nama');
			
			$hj = $this->input->post('hj');
			$satuan = $this->input->post('satuan');
			$gambarlama = $this->input->post('gambarlama');
			$kategori = $this->input->post('kategori');
			$poin = $this->input->post('poin');
			
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;
	          $this->load->library('upload', $config);
	 
	        if ( ! $this->upload->do_upload('berkas')){
	        	$datainput = [
				'id_toko'=>$idtoko,
				'nama_barang'=>$nama,
				'satuan_barang'=>$satuan,
				'id_kategori'=>$kategori,
				'harga_jual'=>$hj,
				'tukar_poin'=>$poin,
				
				
				];
	             $this->db->update('barang',$datainput, ['id_barang'=>$id]);
	          redirect('user/admin/toko/data_barang');
	              // redirect('admin/file/');
	        }else{
	                $data = array('upload_data' => $this->upload->data());
	               	$datainput = [
					'id_toko'=>$idtoko,
					'nama_barang'=>$nama,
					'satuan_barang'=>$satuan,
					'harga_jual'=>$hj,
					'id_kategori'=>$kategori,
					'gambar'=>$namabaru
					
					];
	                
	            //    $this->admin_query->simpan_file();
	                $akses =$this->input->post('akses');
	                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Upload Success</h4>
	               File berhasil di upload
	              </div>');
	             $this->db->update('barang',$datainput, ['id_barang'=>$id]);
	                // unlink('./file/barang/gambar/'.$gambarlama);
	          redirect('user/admin/toko/data_barang');
	        }
	}
	public function update_toko(){
		$idtoko = $this->session->userdata('id_admin');
		$data['data']=$this->db->get_where('toko',['id_toko'=>$idtoko])->row_array();
		$data['judul_konten']='Perbaharui Data Toko';
		$data['kel'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$this->admin->load('admin/template','admin/toko/form/toko/edit_toko', $data);
		
	}
	public function simpanedit_toko(){
		$idtoko = $this->session->userdata('id_admin');
		$nama = $this->input->post('nama');
		$alm = $this->input->post('alm');
		$desc = nl2br($this->input->post('desc'));
		$pemilik = $this->input->post('pemilik');
		$idkel = $this->input->post('idkel');
		$hp = $this->input->post('hp');
		$email = $this->input->post('email');
		$jml = $this->db->get_where('toko', ['email_toko'=>$email])->num_rows();
		$data = [
			'nama_toko'=>$nama,
			'pemilik_toko'=>$pemilik,
			'desc_toko'=>$desc,
			'alamat_toko'=>$alm,
			'nohp_toko'=>$hp,
			'email_toko'=>$email,
		
			'id_kelurahan'=>$idkel
			];
		$this->db->update('toko', $data, ['id_toko'=>$idtoko]);
		 $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Data toko anda diperbaharui</h4>
	              
	              </div>');
		redirect('user/admin/toko');
		
		
	}
	public function simpanedit_password(){
		$idtoko = $this->session->userdata('id_admin');
		$passdb=$this->input->post('passdb');
		$passlama=$this->input->post('passlama');
		$passbaru=$this->input->post('passbaru');
		if ($passdb==$passlama) {
			  $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i>Berhasil memperbaharui password</h4>
	              Password andan telah diperbaharui
	              </div>');
			$this->db->update('toko', ['password'=>$passbaru], ['id_toko'=>$idtoko]);
		}
		else{
			  $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-close"></i>Gagal memperbaharui password</h4>
	               password lama yang anda masukkan tidak cocok dengan password yang tersimpan <br>
	               silahkan dicoba kembali
	              </div>');
		}
		redirect('user/admin/toko/update_toko');
	}


	public function distributor(){
		$data['judul_konten']="Pilih Distributor";
		$data['distributor'] = $this->db->query("SELECT * from distributor ")->result_array();
		$this->admin->load('admin/template','admin/toko/form/distributor/data_distributor', $data);
	}
	public function pesan($id){
		$data['judul_konten']="Masukan Pesanan Anda Ke  Distributor";
		$data['distributor'] = $this->db->query("SELECT * from distributor where id_distributor='$id' ")->row_array();
		$this->admin->load('admin/template','admin/toko/form/distributor/pesan_ke_distributor', $data);
	}

			public function simpan_pesanan()
	{
		$id = $this->input->post('id');
		$item = $this->input->post('pesanan');
		$waktu = date('Y-m-d h:i:s');
		$idtoko = $this->session->userdata('id_admin');
		$data = [
			'id_distributor'=>$id,
			'waktu_pesan'=>$waktu,
			'pesanan'=>nl2br($item),
			'status'=>'Order',
			'id_toko'=>$idtoko
		];
			$this->db->insert('pesanan_distributor',$data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success">pesanan disimpan</div>');
			redirect('user/admin/toko/pesanan_distributor');
		
	}

}
