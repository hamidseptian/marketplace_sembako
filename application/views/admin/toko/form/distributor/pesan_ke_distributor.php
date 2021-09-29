
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>

<form action="<?php echo base_url() ?>/user/admin/toko/simpan_pesanan" method="post"> 
<div class="col-md-12">
  <div class="col-md-3">
    <img class="img" src="<?php echo base_url() ?>file/gambar/toko.PNG" alt="" width="100%">
   
  </div>
  <div class="col-md-9">
   
    <h4><?php echo $distributor['nama_distributor'] ?></h4>
    <p><?php echo $distributor['alamat'] ?></p>
    <p><?php echo $distributor['nohp'] ?></p>
    <p>Jenis Distributor : <?php echo $distributor['jenis_distribusi_barang'] ?></p>

   
  </div>
  <div class="clearfix"></div>
</div>
<div class="col-md-12">
  <div class="form-group">
    <label>Pesanan Anda</label>
    <input type="hidden" name="id" value="<?php echo $distributor['id_distributor'] ?>">
    <textarea class="form-control" name="pesanan"></textarea>
  </div>
  <div class="form-group">
    <a href="<?php echo base_url() ?>user/admin/toko/distributor" class="btn btn-info" style="float:right; margin-left: 10px ">Kembali</a>
    <button type="submit" class="btn btn-info" style="float:right">Pesan</button>
  </div>
</div>
<div class="clearfix"></div>
</form>



</div>
