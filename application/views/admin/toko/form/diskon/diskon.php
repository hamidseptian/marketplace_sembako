
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <a href="<?php echo base_url() ?>user/admin/toko/tambahdiskon/" class="btn btn-info" >Tambah diskon</a>
  <br><br>

  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Barang di diskon</td>
        <td>diskon</td>
        <td>Mulai Diskon</td>
        <td>Selesai Diskon</td>
        
        
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { 
      $ptm = explode('-', $d1['mulai']);
      $pts = explode('-', $d1['selesai']);

      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['diskon'] ?> %</td>
        <td><?php echo $ptm[2].'-'.$ptm[1].'-'.$ptm[0] ?></td>
        <td><?php echo $pts[2].'-'.$pts[1].'-'.$pts[0] ?></td>
        
        
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapusdiskon/<?php echo $d1['id_diskon'] ?>" class="btn btn-danger btn-xs" >Hapus</a>
          <a href="<?php echo base_url() ?>user/admin/toko/editdiskon/<?php echo $d1['id_diskon'] ?>" class="btn btn-warning btn-xs" >Edit</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
