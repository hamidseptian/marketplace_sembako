<div class="box-header with-border">
  <h3 class="box-title">Data Toko</h3>
  <div class="pull-right">
    <!-- <a href="<?php echo base_url('user/admin/master/tambah_toko') ?>" class="btn btn-info">Tambah Toko</a> -->
  </div>
</div>
<div class="box-body">
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Toko</td>
        <td>Pemilik</td>
        <td>Deskripsi Toko</td>
        <td>Alamat</td>
        <td>Status Toko</td>
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_toko'] ?></td>
        <td><?php echo $d1['pemilik_toko'] ?></td>
        <td><?php echo $d1['desc_toko'] ?></td>
        <td><?php echo $d1['alamat_toko'] ?></td>
        <td><?php echo $d1['status_toko'] ?></td>
        <td>
          <?php if ($d1['status_toko']=="Pendaftaran") { ?>
          <a href="<?php echo base_url('user/admin/master/acctoko/'.$d1['id_toko']) ?>" class="btn btn-info btn-xs" >Jadikan Mitra</a>
          <a href="<?php echo base_url('user/admin/master/hapus_toko/'.$d1['id_toko']) ?>" class="btn btn-info btn-xs" >Hapus Toko</a>
            
          <?php }else{ ?>
          <a href="<?php echo base_url('user/admin/master/hapus_toko/'.$d1['id_toko']) ?>" class="btn btn-info btn-xs" >Hapus Toko</a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>

<script type="text/javascript">
  function hapustoko(id){
    $.ajax({
      type : 'GET',
      data : {'id' : id},
      url : "<?php echo base_url() ?>user/admin/master/hapus_toko/"+id ,
      success : function(html){
        window.location.href="<?php echo base_url('user/admin/master/data_toko') ?>"
      }
    })
  }
</script>