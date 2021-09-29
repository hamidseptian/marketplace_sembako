
		<div class="col-md-9 ">
			<h3>Buka Toko</h3>
			<?php echo $this->session->flashdata('pesan'); ?>
				<form method="post" action="<?php echo base_url('homepage/simpan_toko') ?>">
					<br>
		<div class="form-group">
			<span>Nama Toko</span>
			<input type="text" name="nama" class="form-control">
		</div> 
		<div class="form-group">
			<span>Pemilik</span>
			<input type="text" name="pemilik" class="form-control">
		</div> 				
		<div class="form-group"> 	
			<span class="me-at">Kecamatan</span>
			<select name="idkec" class="form-control" id="idkecamatan">
				<?php foreach($kecamatan as $d1){ ?>
				<option value="<?php echo $d1['id_kecamatan'] ?>"><?php echo $d1['nama_kecamatan'] ?></option>
				<?php } ?>
			</select>
		</div>			
		<div class="form-group" style="display:none" id="fg_kel"> 	
			<span class="me-at">Kelurahan</span>
			<select name="idkec" class="form-control" id="optkel">
				<option>Pilih Kelurahan</option>
				
			</select>
		</div>	
		<div id="pilih_kelurahan"></div>			
		<div class="form-group"> 	
			<span class="me-at">Alamat</span>
			<input type="text" name="alm" class="form-control"> 
		</div>		
		<div class="form-group"> 	
			<span class="me-at">No HP</span>
			<input type="text" name="hp" class="form-control"> 
		</div>
		<div class="form-group"> 	
			<span class="me-at">Email</span>
			<input type="text" name="email" class="form-control"> 
		</div>
		<div class="form-group"> 	
			<span class="me-at">Password</span>
			<input type="password" name="pass" class="form-control"> 
		</div>
				
			<input type="submit" value="Submit"> 
		</form>
	<div class="clearfix"> </div>
		</div>

<script type="text/javascript">
	$('#idkecamatan').on('click', function(){
		$.ajax({
			url : "<?php echo base_url('homepage/cek_kelurahan') ?>",
			data : { 'idkec': $('#idkecamatan').val() },
			type : "POST",
			success : function(html){
				var data = JSON.parse(html);
				var kelurahan = data.nama_kelurahan;
				$('#fg_kel').attr('style','');
				$('#optkel').html(html);
			
				
			},
			error : function(){
				alert('ajax error')
			}
		})
		
	})
</script>