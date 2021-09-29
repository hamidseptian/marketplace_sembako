
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpan_barang') ?>" method='post'  enctype="multipart/form-data">
    <div class="form-group">
      <label>Kategori Barang </label>

      <select name="kategori" class="form-control">
        <?php
        foreach ($kategori as $k) { ?>
           <option value="<?php echo $k['id_kategori'] ?>"><?php echo $k['kategori'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Nama Barang</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group" style="display:none">
      <label>Harga Beli</label>
      <input type="number" name="hb" class="form-control">
    </div>
    <div class="form-group">
      <label>Harga Jual</label>
      <input type="number" name="hj" class="form-control">
    </div>
    <div class="form-group">
      <label>Satuan </label>

      <select name="satuan" class="form-control">
        <?php $satuan = ['KG','Liter','Ekor','Kaleng','Butir','Bungkus','Unit','Buah'];
        foreach ($satuan as $st) { ?>
           <option value="<?php echo $st ?>"><?php echo $st ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Gambar</label>
      <input type="file" name="berkas" >
    </div>
    <div class="form-group">
      <label>Stok </label>
      <input type="number" name="stok" class="form-control">
    </div>
    <div class="form-group">
      <label>Jumlah Poin untuk bisa ditukarkan dengan produk ini</label>
      <input type="number" name="poin" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Barang" class="btn btn-info">
    </div>
  </form>
</div>