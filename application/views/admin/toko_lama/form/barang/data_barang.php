<div class="box-header with-border">
  <h3 class="box-title">Data Barang</h3>
  <div class="pull-right">
    <a href="<?php echo base_url('user/admin/toko/tambah_barang') ?>" class="btn btn-info">Tambah Barang</a>
  </div>
</div>
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Gambar</td>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>Stok</td>
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><img src="<?php echo base_url() ?>/file/barang/gambar/<?php echo $d1['gambar'] ?>" style="width:100px"></td>
        <td><?php echo $d1['id_barang'] ?></td>
        <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['harga_jual'] ?></td>
        <td><?php echo $d1['stok'] ?></td>
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapusbarang/<?php echo $d1['id_barang'] ?>" class="btn btn-info btn-xs" >Hapus Barang</a>
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