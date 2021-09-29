<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Toko extends CI_Controller {

	public function index()
	{
		$data['judul_konten']='Data Karyawan';
		$data['menu']='Data Karyawan';
		$this->admin->load('admin/template','admin/toko/form/dashboard/dashboard', $data);
	}
	public function data_barang()
	{	
		$idtoko = $this->session->userdata('id_admin');
	//	echo $idtoko;
		$data['data']=$this->db->get_where('barang', ['id_toko'=>$idtoko])->result_array();
		$data['judul_konten']='Data Barang';
		$data['menu']='Data Barang';
		$this->admin->load('admin/template','admin/toko/form/barang/data_barang', $data);
	}
	public function hapusbarang($id)
	{
		$this->db->delete('barang', array('id_barang' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data barang berhasil dihapus</div>');
		redirect('user/admin/toko/data_barang');
	}

	public function pemesanan()
	{	$data['data']=$this->db->query('SELECT * , sum(pemesanan.qty) as jml from pemesanan join barang on barang.id_barang=pemesanan.id_barang join member on member.id_member = pemesanan.id_member group by member.nama_member asc')->result_array();
		$data['judul_konten']='Data Pemesanan';
		$data['menu']='Pemesanan';
		$this->admin->load('admin/template','admin/toko/form/pemesanan/data_pemesanan', $data);
	}
	public function tambah_barang()
	{
		$data['judul_konten']='Tambah Barang';
		$data['menu']='Data Barang';
		$this->admin->load('admin/template','admin/toko/form/barang/tambah_barang', $data);
	}
	public function addkaryawan()
	{
		$data['judul_konten']='Tambah Karyawan';
		$data['menu']='Data Karyawan';
		$this->admin->load('admin/template','admin/toko/form/karyawan/tambah_karyawan', $data);
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
			$datainput = [
				'id_toko'=>$idtoko,
				'nama_barang'=>$nama,
				'harga_beli'=>$hb,
				'harga_jual'=>$hj,
				'gambar'=>$namabaru,
				'stok'=>0
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
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data member berhasil disimpan <br>silahkan melakukan login </div>');
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
	public function simpan_karyawan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
		$data = [
				'nama_karyawan'=>$nama,
				'posisi_karyawan'=>$posisi,
				'id_toko'=>$idtoko
				];
				$this->db->insert('karyawan', $data);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan disimpan </div>');
			redirect('user/admin/toko/karyawan');

	}
	public function simpanedit_karyawan()
	{	
		// $id= $this->session->userdata('id_admin');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$posisi = $this->input->post('posisi');
		$data = [
				'nama_karyawan'=>$nama,
				'posisi_karyawan'=>$posisi
				];
				$this->db->update('karyawan', $data, ['id_karyawan'=>$id]);
				$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan diperbaharui </div>');
			redirect('user/admin/toko/karyawan');

	}
	public function pesanan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Order' group by pesanan.id_member, pesanan.tanggal_pesan")->result_array() ;
		$this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
	}
	public function pesanan_diantar()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Diantarkan' group by pesanan.id_member, pesanan.tanggal_pesan")->result_array() ;
		// $this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
		$this->admin->load('admin/template','admin/segera', $data);
	}
	public function penjualan()
	{	
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Data Pesanan";
		$data['menu'] = "Data Pesanan";
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where barang.id_toko = '$idtoko' and status_pesanan = 'Selesai' group by pesanan.id_member, pesanan.tanggal_pesan")->result_array() ;
		// $this->admin->load('admin/template','admin/toko/form/pesanan/pesanan', $data);
		$this->admin->load('admin/template','admin/segera', $data);
	}

	public function lihat_pesanan($id)
	{	
		$pisah = explode('__', $id);
		$id = $pisah[0];
		$tglp = $pisah[1];
		$pt = explode('-',$tglp);
		$data['tglp'] = $pt[2].'-'.$pt[1].'-'.$pt[0];
		$data['tanggalpesan']=$tglp;
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			where pesanan.id_member = '$id' and status_pesanan = 'Order' ")->row_array();
		$idkel = $data['pelanggan']['id_kelurahan'];
		$data['id']=$id;
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$id' and status_pesanan = 'Order' and barang.id_toko='$idtoko' and pesanan.tanggal_pesan='$tglp'")->result_array() ;
		$data['ongkir']=$this->db->get_where('ongkir',['id_kelurahan'=>$idkel])->row_array();
		$data['karyawan'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/pesanan/detail_pesanan', $data);
	}
	public function checkout($id)
	{	
		//$idtoko = $this->session->userdata('id_admin');
		$idtoko = $this->session->userdata('id_admin');
		$data['judul_konten'] = "Detail Pesanan";
		$data['menu'] = "Pesanan";
		$data['pelanggan'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			where pesanan.id_member = '$id' and status_pesanan = 'Order' ")->row_array();
		$idkel = $data['pelanggan']['id_kelurahan'];
		$data['id']=$id;
		$data['data'] = $this->db->query("SELECT * from pesanan 
			join member on member.id_member = pesanan.id_member
			join barang on barang.id_barang = pesanan.id_barang 
			join toko on barang.id_toko=toko.id_toko
			where pesanan.id_member = '$id' and status_pesanan = 'Order' and barang.id_toko='$idtoko' ")->result_array() ;
		$data['ongkir']=$this->db->get_where('ongkir',['id_kelurahan'=>$idkel])->row_array();
		$data['karyawan'] = $this->db->get_where('karyawan', ['id_toko'=>$idtoko])->result_array();
		$this->admin->load('admin/template','admin/toko/form/pesanan/detail_pesanan', $data);
	}
	public function hapuskaryawan($id)
	{
		$this->db->delete('karyawan', array('id_karyawan' => $id)); 
			$this->session->set_flashdata('pesan','<div class="alert alert-success">Data karyawan berhasil dihapus</div>');
		redirect('user/admin/toko/karyawan');
	}
	public function editkaryawan($id)
	{
		$data['data']=$this->db->get_where('karyawan', array('id_karyawan' => $id))->row_array(); 
		$data['judul_konten']='Edit Karyawan';
		$data['menu']='Data Karyawan';
		$this->admin->load('admin/template','admin/toko/form/karyawan/edit_karyawan', $data);
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
	public function konfirmasi_pesanan()
	{
		$idtoko = $this->session->userdata('id_admin');
		$id = $this->input->post('id');
		$idk = $this->input->post('idk');
		$tglp = $this->input->post('tglp');


		// $this->db->where();
	//	$this->db->update('pesanan', ['status_pesanan'=>'Diantarkan', 'id_karyawan'=>$idk] , ['id_member'=>$id, 'tanggal_pesan'=>$tglp, 'id_toko'=>$idtoko]);
		
		 $this->db->query("UPDATE pesanan set status_pesanan='Diantarkan', id_karyawan='$idk' where id_member='$id' and tanggal_pesan='$tglp' and id_toko='$idtoko'");
		redirect('user/admin/toko/pesanan');
	}
	public function kelola_ongkir(){
		$data['kelurahan'] = $this->db->query("SELECT * from ongkir join kelurahan on ongkir.id_kelurahan = kelurahan.id_kelurahan join kecamatan on kecamatan.id_kecamatan=kelurahan.id_kecamatan")->result_array();
		$data['idtoko']=$this->session->userdata('id_admin');
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
}
