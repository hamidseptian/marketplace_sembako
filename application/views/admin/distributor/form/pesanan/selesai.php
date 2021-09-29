
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
      
        <!-- <td>Option</td> -->
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
     
      </tr>
    <?php } ?>
    
  </table>
  
</div>
