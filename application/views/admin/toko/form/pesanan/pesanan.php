
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Pelanggan</td>
        <td>Alamat</td>
        <td>Tanggal Pesan</td>
        <td>Waktu Pesan</td>
        <td>Status Pesanan</td>
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_pelanggan'] ?></td>
        <td><?php echo $d1['alamat_pelanggan'] ?></td>
        <td><?php 
          $pt = explode('-', $d1['tanggal_pesan']);
          echo $pt[2].'-'.$pt[1].'-'.$pt[0];
         ?></td>
        <td><?php echo $d1['waktu_pesan'] ?></td>
        <td><?php echo $d1['status_pesanan'] ?></td>
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/lihat_pesanan/<?php echo $d1['id_pelanggan'].'/'.$d1['tanggal_pesan'].'/'.$d1['waktu_pesan'].'/'.$d1['metode_bayar']  ?>" class="btn btn-info btn-xs" >Lihat Detail Pesanan</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
  <a href="<?php echo base_url('user/admin/toko/print_pesanan') ?>" class="btn btn-info btn-sm" target='_blank'>Print Data Pesanan</a> <br><br>
</div>
