
			<div class="col-md-9" style="margin-top: -50px ">
			<?php echo $this->session->flashdata('pesan'); ?>
				<div class="content-bottom">
					<h3>Mitra Aplikasi marketplace pemesanan sembako Kota Solok
</h3>
					<div class="bottom-grid">
					<?php foreach($mitra as $d1) {?>
						<div class="col-md-4 shirt" style="margin-bottom: 25px">
							<div class="bottom-grid-top">
								<img src="<?php echo base_url() ?>/file/gambar/toko.png" style="width:100%; height: 17y0px">
								
								<div class="pre">
									<div class="news-in">
										<h6><a href="#" style="margin-left: -60px"><?php echo $d1['nama_toko'] ?></a></h6>
										<!-- <p style="margin-left: -60px">Owner : <?php echo $d1['pemilik_toko'] ?></p><br> -->
										<p style="margin-left: -60px"><?php echo $d1['alamat_toko'] ?></p><br>
										<ul style="margin-left: -60px">
											<li><span>HP : <?php echo $d1['nohp_toko'] ?></span> </li>
											
											
										</ul>
										<a href="<?php echo base_url() ?>homepage/barang_toko/<?php echo $d1['id_toko'] ?>" style="margin-left: -60px">Lihat Barang </a>
									</div>
									<div class="clearfix"> </div>
								</div>
								
								
							</div>
						</div>
					<?php } ?>
						
						<div class="clearfix"> </div>
					</div>
				</div>
			
			</div>

		