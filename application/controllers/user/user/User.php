<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		// $data['barang'] = $this->db->get('barang')->result_array();
		$idpelanggan= $this->session->userdata('id_user');

		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Masuk Ke Keranjang'")->result_array() ;

		// $data['totalbelanja'] = $this->db->query("SELECT sum()from pesanan where id_pelanggan = '$idpelanggan' and status_pesanan ='Order' ") ;
		$data['jmlitem'] = $this->db->query("SELECT * from pesanan where id_pelanggan = '$idpelanggan'  and status_pesanan = 'Masuk Ke Keranjang'")->num_rows(); 
		$data['barang'] = $this->db->query("SELECT * from barang join toko on toko.id_toko = barang.id_toko where toko.status_toko='Mitra'")->result_array();
	
		$this->home->load('home/template','home/form/home/home', $data);
	}
	
	public function keranjang()
	{
		$idpelanggan= $this->session->userdata('id_user');
		// $data['idpelanggan']=$idpelanggan;
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Masuk Ke Keranjang' group by barang.id_toko")->result_array() ;
		$data['j1'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Masuk Ke Keranjang' group by barang.id_toko")->num_rows() ;
		
		// foreach ($data['keranjang'] as $d1) {
		// 	$idtoko = $d1['id_toko'];

		// 	$data['barang_belanjaan'] = $this->db->query("SELECT * from pesanan 
		// 	join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
		// 	join barang on barang.id_barang = pesanan.id_barang 
		// 	where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order' and barang.id_toko='$idtoko'")->result_array() ;
		// }

		// $data['totalbelanja'] = $this->db->query("SELECT sum()from pesanan where id_pelanggan = '$idpelanggan' and status_pesanan ='Order' ") 
	
		$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function simpan_penukaran()
	{
		$idpelanggan= $this->session->userdata('id_user');
		$id_barang = $this->input->post('idb');
		$idtoko = $this->input->post('idt');
	

			$datainput = [
			'id_pelanggan'=>$idpelanggan,
			'id_barang'=>$id_barang,
			'tanggal'=>date('Y-m-d h:i:s'),
			'id_toko'=>$idtoko,
			'jenis'=>'-',
			'status_penukaran'=>'Menunggu Persetujuan Toko'
		];
		$this->db->insert('poin_pelanggan', $datainput);
			redirect('user/user/user/detail_poin/'.$idtoko);

		
		
	
		//$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	} 
	public function simpan_pesanan()
	{
		$idpelanggan= $this->session->userdata('id_user');
		$diskon = $this->input->post('diskon');
		$id_barang = $this->input->post('idb');
		$idtoko = $this->input->post('idtoko');
		$qty = $this->input->post('qty');
		$stok = $this->input->post('stok');
		$satuan = $this->input->post('satuan');
		if ($qty>$stok) {
			$this->session->set_flashdata('pesan','<div class="alert alert-warning">Pesanan tidak boleh dari jumlah stok</div>');
			redirect('/produk/detail/'.$slug);
		}else{
		 $cekpesanan = $this->db->query("SELECT * from pesanan where id_pelanggan='$idpelanggan' and id_barang='$id_barang' and id_toko='$idtoko' and status_pesanan='Masuk Ke Keranjang'")->row_array();
		 $qtylama = $cekpesanan['qty'];
		 $qtybaru = $qtylama + $qty;
		$datainput = [
			'id_pelanggan'=>$idpelanggan,
			'id_barang'=>$id_barang,
			'qty'=>$qty,
			'diskon'=>$diskon,
			//'tanggal_pesan'=>date('Y-m-d'),
			'id_toko'=>$idtoko,
			'status_pesanan'=>'Masuk Ke Keranjang'
		];
		 if ($cekpesanan!='') {
		 	if ($qtybaru > $stok) {
			$this->session->set_flashdata('pesan','<div class="alert alert-warning">Pesanan tidak boleh dari jumlah stok.anda sudah memesan produk ini sebanyak '.$qtylama.' '.$satuan.'</div>');
			redirect('/produk/detail/'.$slug);
		 	}else{
		 	$update = $this->db->query("UPDATE pesanan set qty='$qtybaru' where id_pelanggan='$idpelanggan' and id_barang='$id_barang' and id_toko='$idtoko' and status_pesanan='Masuk Ke Keranjang'");
			redirect('homepage');
			}
		 }else{
			$this->db->insert('pesanan', $datainput);
			redirect('homepage');

		 }


		}
		
	
		//$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function hapus_pesanan($id){
		$this->db->delete('pesanan', ['id_pesanan'=>$id]);
		redirect('user/user/user/keranjang');

	}
	public function batal_tukar($id, $idt){
		$this->db->delete('poin_pelanggan', ['id_poin_plg'=>$id]);
		redirect('user/user/user/detail_poin/'.$idt);

	}
	public function edit_akun()
	{	
		$idplg =  $this->session->userdata('id_user');
		$data['data'] = $this->db->query("SELECT * from pelanggan where id_pelanggan='$idplg'")->row_array();
		$data['kelurahan'] = $this->db->query("SELECT * from kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$this->home->load('home/template','user/form/dashboard/editakun', $data);
	}


	public function simpanedit_pelanggan()
	{
		$idpelanggan= $this->session->userdata('id_user');
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
		if ($jml==1 || $jml<=0) {
			$this->db->update('pelanggan',$data, ['id_pelanggan'=>$idpelanggan]);
			$this->session->set_flashdata('pesan','<br><div class="alert alert-success">Data pelanggan berhasil diperbaharui</div>');
			redirect('homepage');
		}
		else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger">Data gagal disimpan <br>Email sudah digunakan</div>');
			redirect('user/user/user/edit_akun');

		}
	}
	public function konfirmasi_pesanan()
	{
		$metode = $this->input->post('metode');
		$idpelanggan= $this->session->userdata('id_user');
		$waktu = date('h:i');
		$tgl=date('Y-m-d');
		$data = [
			'status_pesanan'=>'Order',
			'tanggal_pesan'=>$tgl,
			'waktu_pesan'=>$waktu
		];
		$cekqty = $this->db->query("SELECT * from pesanan where status_pesanan='Masuk Ke Keranjang' and id_pelanggan='$idpelanggan'")->result_array();
		foreach ($cekqty as $data) {
			$qty = $data['qty'];
			$id_barang = $data['id_barang'];
			$cekstok = $this->db->query("SELECT * from barang where id_barang='$id_barang'")->row_array();
			$stokada = $cekstok['stok'];
			$sisastok = $stokada - $qty;
			echo $stokada.'<br>';
			echo $sisastok.'<br>';
			$updatestok = $this->db->query("UPDATE barang set stok = '$sisastok' where id_barang='$id_barang'");
		}
		$where = ['id_pelanggan'=>$idpelanggan, 'status_pesanan'=>'Masuk Ke Keranjang'];
		// $this->db->update('pesanan', $data, $where);
		$this->db->query("UPDATE pesanan set status_pesanan='Order', tanggal_pesan='$tgl' , waktu_pesan='$waktu', metode_bayar='$metode' where id_pelanggan='$idpelanggan' and status_pesanan='Masuk Ke Keranjang'");
		redirect('user/user/user/detail_pesanan/'.date('Y-m-d').'/'.$waktu);
		
	
		//$this->home->load('home/template','user/form/keranjang/keranjang', $data);
	}
	public function history()
	{
		$idpelanggan= $this->session->userdata('id_user');
		// $data['idpelanggan']=$idpelanggan;
		$data['data'] = $this->db->query("SELECT * from pesanan 
			where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan != 'Masuk Ke Keranjang' group by tanggal_pesan, waktu_pesan ")->result_array() ;
		$this->home->load('home/template','user/form/pesanan/history', $data);
	}

	public function upload_pembayaran(){
		date_default_timezone_set('Asia/Jakarta');
	        $config['upload_path']          = './pembayaran';
	        $waktu = $this->input->post('waktup');
	        $tgl = $this->input->post('tglp');
	        $idtoko = $this->input->post('idtoko');
	        $rek = $this->input->post('rek');

		$idpelanggan= $this->session->userdata('id_user');
	          $namaberkas         = $_FILES['berkas']['name'];
	         // $config['max_size']             = 20000;
	        $config['allowed_types']        = 'jpg|png|JPG|PNG';
	       
	      $x = explode('.', $namaberkas );
	        $ekstensi = strtolower(end($x));
	        $namabaru=date('ymdhis.').$ekstensi;
	       // echo $namabaru;
	         $config['file_name']  = $namabaru;

	          $this->load->library('upload', $config);
	 
	        if ( ! $this->upload->do_upload('berkas')){
	    	   $error = array('error' => $this->upload->display_errors());
	        }else{
	                $data = array('upload_data' => $this->upload->data());
	                $data = [
	                	'id_rekening'=>$rek,
	                	'id_pelanggan'=>$idpelanggan,
	                	'id_toko'=>$idtoko,
	                	'file'=>$namabaru,
	                	'tanggal_pesan'=>$tgl,
	                	'waktu_pesan'=>$waktu,
	                	'tanggal_bayar'=>date('Y-m-d h:i:s'),
	                	'status'=>'Pengecekan'

	                ];
	                $this->db->insert('pembayaran', $data);
	                $this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4> Pembayaran anda sedang di proses</h4>
	             
	              </div>');
	           redirect('user/user/user/detail_pesanan/'.$tgl.'/'.$waktu);
	        }
	}
	public function poin()
	{
		$idpelanggan= $this->session->userdata('id_user');
		// $data['idpelanggan']=$idpelanggan;
		$data['poinadd'] = $this->db->query("
			SELECT * from poin_pelanggan as a
			left join toko as b on a.id_toko=b.id_toko
			left join poin as c on a.id_poin = c.id_poin
			
			 where a.id_pelanggan='$idpelanggan' group by a.id_toko ")->result_array() ;
		$this->home->load('home/template','user/form/poin/poin', $data);
	}
	public function detail_poin($id)
	{
		$data['toko'] = $this->db->get_where('toko', ['id_toko'=>$id])->row_array();
		$idpelanggan= $this->session->userdata('id_user');
		// $data['idpelanggan']=$idpelanggan;
		$data['poinadd'] = $this->db->query("
			SELECT * from poin_pelanggan as a
			left join toko as b on a.id_toko=b.id_toko
			left join poin as c on a.id_poin = c.id_poin
			left join barang as d on a.id_barang = d.id_barang
			 where a.id_pelanggan='$idpelanggan' and a.jenis='+' and a.id_toko='$id'")->result_array() ;
		$data['poinmin'] = $this->db->query("
			SELECT * from poin_pelanggan as a
			left join toko as b on a.id_toko=b.id_toko
			left join poin as c on a.id_poin = c.id_poin
			left join barang as d on a.id_barang = d.id_barang
			 where a.id_pelanggan='$idpelanggan' and a.jenis='-' and a.id_toko='$id'")->result_array() ;

		
		$this->home->load('home/template','user/form/poin/detail_poin', $data);
	}

	public function penukaran_selesai($id,$idt)
	{
		
		$this->db->update('poin_pelanggan',['status_penukaran'=>'Penukaran Selesai'], array('id_poin_plg' => $id)); 
		
			
		redirect('user/user/user/detail_poin/'.$idt);
	}
	public function tukar_poin($id)
	{	
		$idpelanggan= $this->session->userdata('id_user');
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan = 'Order'")->result_array() ;

		$data['detail'] = $this->db->query('SELECT * from barang join toko on toko.id_toko=barang.id_toko 
			left join kategori on barang.id_kategori=kategori.id_kategori where barang.id_barang='.$id)->row_array();
		
		$this->home->load('home/template','user/form/poin/tukar_poin', $data);
	}
	
	public function detail_pesanan($tgl,$waktu)
	{
		$idpelanggan= $this->session->userdata('id_user');
		$data['idpelanggan']=$idpelanggan;
		$data['tgldb']=$tgl;
		$data['waktudb']=$waktu;
		$data['keranjang'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan != 'Masuk Ke Keranjang' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu' group by barang.id_toko")->result_array() ;
		$data['j1'] = $this->db->query("SELECT * from pesanan 
			join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_pelanggan = '$idpelanggan' and status_pesanan != 'Masuk Ke Keranjang' and pesanan.tanggal_pesan='$tgl' and pesanan.waktu_pesan='$waktu' group by barang.id_toko")->num_rows() ;
		// echo $data['j1'];
		$pt = explode('-',$tgl);

		$data['tgl']=$pt[2].'-'.$pt[1].'-'.$pt[0];
		$this->home->load('home/template','user/form/pesanan/detail_pesanan', $data);
	}

	public function terima_barang($tgl , $idtoko, $waktu)
	{
		$idpelanggan= $this->session->userdata('id_user');
		
		$data['j1'] = $this->db->query("UPDATE pesanan 
			set status_pesanan= 'Selesai'
			where id_pelanggan='$idpelanggan' and id_toko='$idtoko' and tanggal_pesan = '$tgl' and waktu_pesan='$waktu'");
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Barang anda sudah di terima</div>');
		redirect('user/user/user/detail_pesanan/'.$tgl.'/'.$waktu);
		
	}
	public function batalkan_pesanan($tgl , $idtoko, $waktu)
	{
		$idpelanggan= $this->session->userdata('id_user');
		
		$data['j1'] = $this->db->query("UPDATE pesanan 
			set status_pesanan= 'Dibatalkan Pelanggan'
			where id_pelanggan='$idpelanggan' and id_toko='$idtoko' and tanggal_pesan = '$tgl' and waktu_pesan='$waktu'");
		$this->session->set_flashdata('pesan','<div class="alert alert-success">Pesanan anda telah dibatalkan</div>');
		redirect('user/user/user/detail_pesanan/'.$tgl.'/'.$waktu);
	}

	
}
