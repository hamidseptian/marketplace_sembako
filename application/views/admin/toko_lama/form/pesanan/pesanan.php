
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Pelanggan</td>
        <td>Alamat</td>
        <td>No HP</td>
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_member'] ?></td>
        <td><?php echo $d1['alamat_member'] ?></td>
        <td><?php echo $d1['nohp_member'] ?></td>
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/lihat_pesanan/<?php echo $d1['id_member'] ?>__<?php echo $d1['tanggal_pesan'] ?>" class="btn btn-info btn-xs" >Lihat Detail Pesanan</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
