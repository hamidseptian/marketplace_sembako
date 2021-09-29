
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  


  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Tanggal </td>
        <td>Pelanggan</td>
        <td>Alamat Pelanggan</td>
        <td>No HP Pelanggan</td>
        <td>Poin Ditukarkan</td>
        <td>Barang</td>
        <td>Status penukaran</td>
        
        
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { 
        @$pw = explode(' ', $d1['tanggal']);
       @ $pt = explode('-', $pw[0]);
          @$waktu = $pt[2].'-'.$pt[1].'-'.$pt[0].'<br>'.$pw[1];
        
          ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $waktu ?></td>
        <td><?php echo $d1['nama_pelanggan'] ?></td>
        <td><?php echo $d1['alamat_pelanggan'] ?></td>
        <td><?php echo $d1['nohp_pelanggan'] ?></td>
        <td><?php echo $d1['tukar_poin'] ?> Poin</td>
        <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['status_penukaran'] ?></td>
        
        <td>
          <?php if ($d1['status_penukaran']=='Menunggu Persetujuan Toko'): ?>
          <a href="<?php echo base_url() ?>user/admin/toko/terima_Penukaran/<?php echo $d1['id_poin_plg'] ?>/<?php echo $d1['id_barang'] ?>/<?php echo $d1['stok'] ?>" class="btn btn-info btn-xs" >Terima</a>
          <a href="<?php echo base_url() ?>user/admin/toko/tolak_penukaran/<?php echo $d1['id_poin_plg'] ?>" class="btn btn-info btn-xs" >Tolak</a>
          <?php elseif ($d1['status_penukaran']=='Penukaran Ditolak Toko'): ?>
          <?php elseif ($d1['status_penukaran']=='Penukaran Disetujui'): ?>
          <a href="<?php echo base_url() ?>user/admin/toko/penukaran_diterima_pelanggan/<?php echo $d1['id_poin_plg'] ?>" class="btn btn-info btn-xs" >Diterima Pelanggan</a>
          <?php endif ?>
          <!-- <a href="<?php echo base_url() ?>user/admin/toko/editpoin/<?php echo $d1['id_poin'] ?>" class="btn btn-warning btn-xs" >Edit</a> -->
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
