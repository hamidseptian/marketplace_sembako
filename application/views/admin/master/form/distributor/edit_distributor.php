
<div class="box-body">
  <form action="<?php echo base_url('user/admin/master/simpanedit_distributor') ?>" method='post'>
    <div class="form-group">
      <label>Nama Distributor</label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $d['id_distributor'] ?>">
      <input type="text" name="nama" class="form-control" value="<?php echo $d['nama_distributor'] ?>">
    </div>
    <div class="form-group">
      <label>Alamat Distributor</label>
      <input type="text" name="alm" class="form-control" value="<?php echo $d['alamat'] ?>">
    </div>
    <div class="form-group">
      <label>No HP Distributor</label>
      <input type="text" name="nohp" class="form-control" value="<?php echo $d['nohp'] ?>">
    </div>
    <div class="form-group">
      <label>Jenis Barang  Distribusi</label>
      <input type="text" name="jenis" class="form-control" value="<?php echo $d['jenis_distribusi_barang'] ?>">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Perubahan distributor" class="btn btn-info">
    </div>
  </form>
</div>