
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpan_barang') ?>" method='post'  enctype="multipart/form-data">
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group" style="display:none">
      <label>Harga Beli</label>
      <input type="text" name="hb" class="form-control">
    </div>
    <div class="form-group">
      <label>Harga Jual</label>
      <input type="text" name="hj" class="form-control">
    </div>
    <div class="form-group">
      <label>Gambar</label>
      <input type="file" name="berkas" >
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Barang" class="btn btn-info">
    </div>
  </form>
</div>