
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <a href="<?php echo base_url() ?>user/admin/toko/tambahpoin/" class="btn btn-info" >Tambah poin</a>
  <br><br>

  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Syarat Minimal Belanja</td>
        <td>Poin Didapatkan</td>
        
        
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['syarat'] ?></td>
        <td><?php echo $d1['poin'] ?></td>
        
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapuspoin/<?php echo $d1['id_poin'] ?>" class="btn btn-danger btn-xs" >Hapus</a>
          <a href="<?php echo base_url() ?>user/admin/toko/editpoin/<?php echo $d1['id_poin'] ?>" class="btn btn-warning btn-xs" >Edit</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
