
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Toko</td>
        <td>Alamat</td>
        
        <td>Waktu Pesan</td>
        <td>Pesanan</td>
        <td>Status</td>
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_toko'] ?></td>
        <td><?php echo $d1['alamat_toko'] ?></td>
        <td><?php 
        $pisahtime= explode(' ', $d1['waktu_pesan']);
        $tglp = $pisahtime[0];
        $jamp = $pisahtime [1];
          $pt = explode('-', $tglp);
          echo $pt[2].'-'.$pt[1].'-'.$pt[0];
          echo "<br>";
          echo $jamp;
         ?></td>
        
        <td><?php echo $d1['pesanan'] ?></td>
        <td><?php echo $d1['status'] ?></td>
        <td>
          <?php  if ($d1['status']!='Selesai') { ?>
            
    <a href="<?php echo base_url() ?>user/admin/distributor/selesai_pesanan_distributor/<?php echo $d1['id_pesanan'] ?>" class="btn btn-info btn-xs" onclick="return confirm('Selesai memproses pesanan toko <?php echo  $d1['nama_toko'] ?> ')" >Selesai</a>
          <!-- <a href="<?php echo base_url() ?>user/admin/distributor/batalkan_pesanan_distributor/<?php echo $d1['id_pesanan'] ?>" class="btn btn-info btn-xs" onclick="return confirm('Apakah anda akan menghapus pesanan dari    distributor <?php echo  $d1['nama_toko'] ?> ')" >Batalkan Pesanan</a> -->
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
    
  </table>
  
</div>
