<form action="<?php echo base_url('user/admin/toko/simpanedit_ongkir') ?>" method="post">
<div class="box-header with-border">
  <h3 class="box-title">Data Ongkos Kirim</h3>
  <div class="pull-right">
    <button class="btn btn-info"> Simpan Ongkir</button>
    <a href="<?php echo base_url('user/admin/toko/ongkir') ?>" class="btn btn-info">Kembali</a>
  </div>
</div>
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="">
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
    foreach ($kelurahan as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_kecamatan'] ?></td>
        <td><?php echo $d1['nama_kelurahan'] ?></td>
        <td>
          <input type="hidden" name="idkel[]" class="form-control" value="<?php echo $d1['id_kelurahan'] ?>" readonly>
          <input type="hidden" name="idtoko" class="form-control" value="<?php echo $idtoko ?>">
          <input type="number" name="ongkir[]" class="form-control" required value="<?php echo $d1['ongkir'] ?>">
        </td>

      </tr>
    <?php } ?>
    
  </table>
</div>
</form>