<div class="box-header with-border">
  <h3 class="box-title">Perbarui Data Toko</h3>


</div>

<div class="box-body">
 <?php echo $this->session->userdata('pesan') ?>
<form action="<?php echo base_url('user/admin/toko/simpanedit_toko') ?>" method="post">

  <div class="col-md-6"> 
              <div class="form-group">
                  <label>Nama Toko</label>
                  <input type="text" name="nama" class="form-control"  value="<?php echo $data['nama_toko'] ?>">
              </div> 
              <div class="form-group">
                  <label>Pemilik Toko</label>
                  <input type="text" name="pemilik" class="form-control"  value="<?php echo $data['pemilik_toko'] ?>">
              </div>
              <div class="form-group">
                  <label>Deskripsi TOko</label>
                  <?php 
                    $desc = $data['desc_toko'];
                    $r = str_replace('<br />', '', $desc);
                     ?>
                  <textarea name="desc" class="form-control"><?php echo $r ?></textarea>
              </div>
              <div class="form-group">
                  <label>Domisili</label>
                  <select name="idkel" class="form-control" >
                    <?php foreach($kel as $d2){ ?>
                    <option value="<?php echo $d2['id_kelurahan'] ?>" <?php if($kel==$data['id_kelurahan']){echo "selected";} ?>>Kecamatan : <?php echo $d2['nama_kecamatan']; ?> - Kelurahan : <?php echo $d2['nama_kelurahan'] ?></option>
                    <?php  } ?>
                  </select>
              </div> 
    </div>
      <div class="col-md-6">
              <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" name="alm" class="form-control" value="<?php echo $data['alamat_toko'] ?>">
              </div> 
              <div class="form-group">
                  <label>No HP</label>
                  <input type="text" name="hp" class="form-control" value="<?php echo $data['nohp_toko'] ?>">
              </div> 
              <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $data['email_toko'] ?>">
              </div> 
             
  </div>   
  <div class="clearfix"> </div>     
              
              <div class="form-group">
                  <input type="submit" value="Simpan Perubahan Data" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')" class="btn btn-info">
              </div> 

              
</form>

<hr>  


<div class="box-header with-border">
  <h3 class="box-title">Perbarui Password</h3>

 
</div>



<form action="<?php echo base_url('user/admin/toko/simpanedit_password') ?>" method="post">
<br>  
  <div class="col-md-6"> 

              <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder=" masukan password baru anda" value="<?php echo   $data['email_toko'] ?>" readonly>
                  <small>username diambil dari date email. silahkan di ubah terlebih dahulu email untuk username sebelum merubah password</small>
              </div> 
              <div class="form-group">
                  <label>Password Lama</label>
                  <input type="hidden" name="passdb" class="form-control"  value="<?php echo $data['password'] ?>">
                  <input type="password" name="passlama" class="form-control" placeholder=" Masukan Password Lama Anda">
              </div> 
              <div class="form-group">
                  <label>Password Baru</label>
                  <input type="password" name="passbaru" class="form-control" placeholder=" masukan password baru anda">
              </div> 
            
    </div>
      

  <div class="clearfix"> </div>     
              
              <div class="form-group">
                  <input type="submit" value="Simpan Perubahan Data" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')" class="btn btn-info">
              </div> 

              
</form>
