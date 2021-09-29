<div class="col-md-9">
			<div class="col-md-5 single-top">	
				<img class="etalage_thumb_image img-responsive" src="<?php echo base_url() ?>/file/barang/gambar/<?php echo $detail['gambar'] ?>" style="display: inline; width: 300px; opacity: 1;">
					

					</div>	
					<div class="col-md-7 single-top-in">
						<div class="single-para">
							<h4><?php echo $detail['nama_barang'] ?></h4>
							<div class="para-grid">
								<span class="add-to">Rp. <?php echo $detail['harga_jual'] ?></span>
								<a href="#" class=" cart-to">Toko <?php echo $detail['nama_toko'] ?></a>					
								<div class="clearfix"></div>
							 </div>
							<h5><?php echo $detail['stok'] ?> Stok Tersedia</h5>
							<div class="available">
								<?php 	
								if ($this->session->userdata('id_user')) { ?>
									<h6>Jumlah Pembelian</h6>
								<form method="post" action="<?php echo base_url('user/user/user/simpan_pesanan') ?>">
								<input type="hidden" name="idb" class="form-control" value="<?php echo $detail['id_barang'] ?>">
								<input type="text" name="qty" class="form-control" placeholder="masukan jumlah yang akan anda beli untuk produk ini">
								<input type="submit" value="Masukan Ke Keranjang">
								</form>
								<?php }
								else{
								 ?>
								
								<h6>Harap Login terlebih dahulu sebelum melakukan pembelian	</h6>
							<?php } ?>
								
								
						</div>
							
					
						</div>
					</div>
				<div class="clearfix"> </div>

	    
<!---->

<!---->
			</div>

			