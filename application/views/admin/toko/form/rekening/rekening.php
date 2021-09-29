
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <a href="<?php echo base_url() ?>user/admin/toko/tambahrekening/" class="btn btn-info" >Tambah Rekening</a>
  <br><br>

  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Rekening</td>
        <td>Bank</td>
        <td>No Rekening</td>
        
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_rekening'] ?></td>
        <td><?php echo $d1['bank'] ?></td>
        <td><?php echo $d1['no_rekening'] ?></td>
        
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapusrekening/<?php echo $d1['id_rekening'] ?>" class="btn btn-danger btn-xs" >Hapus</a>
          <a href="<?php echo base_url() ?>user/admin/toko/editrekening/<?php echo $d1['id_rekening'] ?>" class="btn btn-warning btn-xs" >Edit</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
