<?php error_reporting(0); ?><!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Marketplace Sembako </title>
<link href="<?php echo base_url() ?>mihstore/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url() ?>mihstore/js/jquery.min.js"></script>
<!-- Custom Theme files -->
<!--theme-style-->
<link href="<?php echo base_url() ?>mihstore/css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Mihstore Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--fonts-->
<link href='http://fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<!--//fonts-->
<!--//slider-script-->
<script>$(document).ready(function(c) {
	$('.alert-close').on('click', function(c){
		$('.message').fadeOut('slow', function(c){
	  		$('.message').remove();
		});
	});	  
});
</script>
<script>$(document).ready(function(c) {
	$('.alert-close1').on('click', function(c){
		$('.message1').fadeOut('slow', function(c){
	  		$('.message1').remove();
		});
	});	  
});
</script>
<script>
$(document).ready(function(c) {
	$('.alert-close2').on('click', function(c){
		$('.message2').fadeOut('slow', function(c){
	  		$('.message2').remove();
		});
	});	  
});
</script>
<script type="text/javascript" src="<?php echo base_url() ?>mihstore/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>mihstore/js/easing.js"></script>
<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){		
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>	
<!-- start menu -->
<link href="<?php echo base_url() ?>mihstore/css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="<?php echo base_url() ?>mihstore/js/megamenu.js"></script>
<script>$(document).ready(function(){$(".megamenu").megamenu();});</script>				

</head>
<body> 
<!--header-->
	<div class="container">
		<div class="header" id="home">	
			<div class="header-para">
				<p style="color:blue">Aplikasi marketplace pemesanan sembako Kota Solok</span></p>	
			</div>	
			<?php if ($this->session->userdata('id_user')) { ?>
			
		<?php } 
		else {?>
			<ul class="header-in">
				
				<!-- <li><a href="<?php echo base_url('homepage/daftar') ?>" style="color:blue">Distributor</a> </li> -->
			</ul>
		<?php } ?>
				<div class="clearfix"> </div>
		</div>
		<!---->
		<div class="header-top">
			<div class="logo">
				<!-- <a href="#"><img src="<?php echo base_url() ?>mihstore/images/logo.png" alt="" ></a> -->
			</div>

				<div class="clearfix"> </div>
		</div>
		<div class="header-bottom">
				<div class="top-nav">
				
			  <ul class="megamenu skyblue">
			  	<li class="active grid"><a  href="#">Menu</a>
			  		<?php if ($this->session->userdata('id_user')) { ?>
					    <div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>Home Page</h4>
									<ul>
										<li><a class="pink"  href="<?php echo base_url('homepage') ?>">Barang</a></li>
									    <li class="grid"><a  href="<?php echo base_url('homepage/mitra') ?>">Mitra</a></li>
									        
				    

									
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Berbelanja</h4>
									<ul>
										<li class="grid"><a  href="<?php echo base_url('user/user/user/keranjang') ?>">Keranjang</a></li>
									    <li class="grid"><a  href="<?php echo base_url('user/user/user/history') ?>">Riwayat Order</a></li>
									    <li class="grid"><a  href="<?php echo base_url('user/user/user/poin') ?>">Poin Saya</a></li>
									
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Setting Akun</h4>
									
									<ul>
										<li><a href="<?php echo base_url('user/user/user/edit_akun') ?>"><span class="item">Edit Akun</span></a></li>
										<li><a href="<?php echo base_url('auth/logout') ?>"><span class="item">Logout</span></a></li>
										
								
								
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					<?php }
					else{ ?>
						<div class="megapanel">
						<div class="row">
							<div class="col1">
								<div class="h_nav">
									<h4>Home Page</h4>
									<ul>
										<li><a class="pink"  href="<?php echo base_url('homepage') ?>">Barang</a></li>
									    <li class="grid"><a  href="<?php echo base_url('homepage/mitra') ?>">Mitra</a></li>
				
									
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Buat Akun</h4>
									<ul>	
										<li><a href="<?php echo base_url('homepage/daftar') ?>"><span class="item">Daftar Akun pelanggan</span></a></li>
										
										<li><a href="<?php echo base_url('homepage/daftartoko') ?>">Daftarkan Toko</a> </li>
									
									</ul>	
								</div>							
							</div>
							<div class="col1">
								<div class="h_nav">
									<h4>Login</h4>
									
									<ul>
										<li><a href="<?php echo base_url('auth/user') ?>"><span class="item">Pelanggan</span></a></li>
										<li><a href="<?php echo base_url('auth/toko') ?>">Pengelola Toko</a> </li>
										<li><a href="<?php echo base_url('auth/distributor') ?>">Distributor</a> </li>
										<li><a href="<?php echo base_url('auth/master') ?>">Admin</a> </li>
										
										
								
								
									</ul>	
								</div>												
							</div>
						  </div>
						</div>
					<?php } ?>
					</li>
				      
		
								
				
			
			  </ul> 
				</div>
					<div class="cart icon1 sub-icon1">
						<h6 >
					<?php if ($this->session->userdata('id_user')) { ?>
						
					<?php }
					else { ?>
						
					<?php } ?>
						
</h6>
						
					</div>
			<div class="clearfix"> </div>
		</div>
		<!-- <div class="page">
			<h6><a href="#">Judul Menu</a><b>|</b>sdvsbjs djb sdj</h6>
		</div> -->
		<div class="content">
			
			<?php echo $konten; ?>
			<div class="col-md-3 col-md">
			<div class=" possible-about">
				<?php if ($this->session->userdata('id_user')) { ?>
				
					<h4>Selamat Datang</h4>
						
						<div class="latest-grid">
							<div class="news">
								<img class="img-responsive" src="<?php echo base_url() ?>file/gambar/user.jpg" title="name" alt="">
							</div>
							<div class="news-in">
								<h6><a href="single.html">
									<?php  $idmb = $this->session->userdata('id_user');
										$d1=$this->db->get_where('pelanggan', [ 'id_pelanggan'=>$idmb])->row_array();
										echo $d1['nama_pelanggan'];
									?>
										
									</a></h6>
								<p><?php echo $d1['alamat_pelanggan'] ?></p>
								<p><?php echo $d1['nohp_pelanggan'] ?></p>
								<!-- <ul>
									
									<li><span>Edit Data</span></li> | 
									<li><a href="<?php echo base_url('auth/logout') ?>"><span class="item">Logout</span></a></li>
								</ul> -->
								
							</div>
						<div class="clearfix"> </div>
					</div>
				<?php } ?>
					<h4>Sembako yang anda cari</h4>
					<form action="<?php echo base_url('homepage/pencarian') ?>" method="post">
					<input type="text" name="key" class="form-control" required> <br>
					<button class="btn btn-info btn-sm">Cek Sembako</button>
					</form>
					<hr>
						
					
						
						
						
						
						
						<!--script-->
						
						<!-- script -->
					</div>
			<div class=" possible-about">
				
						
						
						
						
						<!--script-->
						
						<!-- script -->
					</div>
					













<hr>


					<div class=" possible-about">
					<h4>Kategori Sembako</h4>
						<?php $data = $this->db->query("SELECT * from kategori")->result_array(); 
					foreach ($data  as $d1) { ?>
						<div class="tab1">
							<ul class="place">
								<li class="sort"><a href="<?php echo base_url('homepage/kategori_barang/'.$d1['id_kategori']) ?>"><?php echo $d1['kategori'] ?></a></li>
								
									<div class="clearfix"> </div>
							</ul>
						</div>
						<?php } ?>
					
						
						<!--script-->
						
						
					</div>



				<!---->
			
			</div>
			<div class="clearfix"> </div>


		</div>
		<!---->
		<div class="footer">
			<!-- <p class="footer-class">© 2015 Mihstore All Rights Reserved | Template by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p> -->
			
				<!-- <a href="#home" class="scroll to-Top" >  GO TO TOP!</a> -->
		<div class="clearfix"> </div>
		</div>	 	
	 </div>
	</div>
	<!---->
</body>
</html>