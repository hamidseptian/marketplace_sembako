<div class="box-header with-border">
  <h3 class="box-title">Data Ongkos Kirim</h3>
  <div class="pull-right">
    <?php if ($j1<=0) { ?>
    <a href="<?php echo base_url('user/admin/toko/add_ongkir') ?>" class="btn btn-default"> Kelola Data Ongkir</a>
    <?php }
    else{ ?>
    <a href="<?php echo base_url('user/admin/toko/kelola_ongkir') ?>" class="btn btn-info">Kelola Ongkir</a>
    <?php } ?>
  </div>
</div>
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Kecamatan</td>
        <td>Kelurahan</td>
        <td>Ongkos Kirim</td>
        
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($ongkir as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_kecamatan'] ?></td>
        <td><?php echo $d1['nama_kelurahan'] ?></td>
        <td><?php echo $d1['ongkir'] ?></td>
        
      </tr>
    <?php } ?>
    
  </table>
</div>
