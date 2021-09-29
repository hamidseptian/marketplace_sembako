
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
<?php foreach ($distributor as $d) { ?>
  
<div class="col-md-12">
  <div class="col-md-3">
    <img class="img" src="<?php echo base_url() ?>file/gambar/toko.PNG" alt="" width="100%">
   
  </div>
  <div class="col-md-9">
   
    <h4><?php echo $d['nama_distributor'] ?></h4>
    <p><?php echo $d['alamat'] ?></p>
    <p><?php echo $d['nohp'] ?></p>
    <p>Jenis Distributor : <?php echo $d['jenis_distribusi_barang'] ?></p>

    <br>
    <a href="<?php echo base_url() ?>user/admin/toko/pesan/<?php echo $d['id_distributor'] ?>" class="btn btn-info">Pesan</a>
  </div>
  <div class="clearfix"></div>
</div>
<div class="clearfix"></div>
<hr>
<?php } ?>



</div>
