<div class="box-header with-border">
  <h3 class="box-title">Data Barang</h3>
  <div class="pull-right">
    <a href="#" class="btn btn-info btn-sm"  data-toggle="modal" data-target="#addstok">Tambah Stok Barang</a>
    <a href="<?php echo base_url('user/admin/toko/tambah_barang') ?>" class="btn btn-info btn-sm">Tambah Barang</a>
    <a href="<?php echo base_url('user/admin/toko/print_barang') ?>" class="btn btn-info btn-sm" target='_blank'>Print Data  Barang</a>
  </div>
</div>

<form action="<?php echo base_url() ?>user/admin/toko/kelola_stok" method="post" enctype="multipart/form-data">
<div class="modal fade" id="addstok">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Kelola Barang</h4>
              </div>
              <div class="modal-body">
                <table class="table">
                  <tr>
                    <td>Barang</td>
                    <td>Harga</td>
                    <td>Stok Terkini</td>
                    <td>Tambah Stok</td>
                  </tr>
                  <?php foreach($data as $d2){ ?>
                  <tr>
                    <td><?php echo $d2['nama_barang'] ?></td>
                    <td>Rp. <?php echo number_format($d2['harga_jual']) ?></td>
                    <td><?php echo $d2['stok'] ?> Unit</td>
                   
                    <td>
                      <input type="number" name="stok[]" class="form-control" >
                      <input type="hidden" name="idb[]" class="form-control" value="<?php echo  $d2['id_barang'] ?>" >
                    </td>
                  </tr>
                  <?php } ?>
                </table>
           
             
             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" onclick="return confirm('Apakah data yang anda masukan sudah benar.?')">Simpan Data Barang</button>
               
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
</form>

<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Gambar</td>
        <!-- <td>Kode Barang</td> -->
        <td>Kategori Barang</td>
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
        <!-- <td><?php echo $d1['id_barang'] ?></td> -->
        <td><?php echo $d1['kategori'] ?></td>
        <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['harga_jual'] ?></td>
        <td><?php echo $d1['stok'] ?></td>
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapusbarang/<?php echo $d1['id_barang'] ?>" class="btn btn-danger btn-xs" >Hapus Barang</a>
          <a href="<?php echo base_url() ?>user/admin/toko/editbarang/<?php echo $d1['id_barang'] ?>" class="btn btn-warning btn-xs" >Edit Barang</a>
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