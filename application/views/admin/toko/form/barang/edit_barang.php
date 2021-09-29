
<div class="box-body">
  <div class="col-md-6">
    <label><?php echo $data['nama_barang'] ?></label><br>
    <img src="<?php echo base_url() ?>/file/barang/gambar/<?php echo $data['gambar'] ?>" style="width:100%">
  </div>
  <div class="col-md-6">
    <form action="<?php echo base_url('user/admin/toko/simpanedit_barang') ?>" method='post'  enctype="multipart/form-data">
       <div class="form-group">
      <label>Kategori Barang </label>

      <select name="kategori" class="form-control">
        <?php
        foreach ($kategori as $k) { ?>
           <option value="<?php echo $k['id_kategori'] ?>" <?php if($k['id_kategori']==$data['id_kategori']){echo "selected";} ?>><?php echo $k['kategori'] ?></option>
        <?php } ?>
      </select>
    </div>
      <div class="form-group">
        <label>Nama Barang</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_barang'] ?>">
        <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_barang'] ?>">
      </div>
      <div class="form-group">
        <label>Harga Jual</label>
        <input type="text" name="hj" class="form-control" value="<?php echo $data['harga_jual'] ?>">
      </div>
      <div class="form-group">
      <label>Satuan </label>

      <select name="satuan" class="form-control">
        <?php $satuan = ['KG','Liter','Ekor','Kaleng','Butir','Bungkus','Unit','Buah'];
        foreach ($satuan as $st) { ?>
           <option value="<?php echo $st ?>" <?php if($data['satuan_barang']==$st){echo "selected";} ?>><?php echo $st ?></option>
        <?php } ?>
      </select>
    </div>
      <div class="form-group">
        <label>Gambar</label>
        <input type="file" name="berkas">
        <input type="hidden" name="gambarlama" value="<?php echo $data['gambar'] ?>">
      </div> 
       <div class="form-group">
      <label>Jumlah Poin untuk bisa ditukarkan dengan produk ini</label>
      <input type="number" name="poin" class="form-control" value="<?php echo $data['tukar_poin'] ?>">
    </div> 

      <div class="form-group">
        <input type="submit" value="Simpan Data Barang" class="btn btn-info">
      </div>
    </form>
  </div>
</div>