
<div class="box-body">
  <form action="<?php echo base_url('user/admin/master/simpan_toko') ?>" method='post'>
    <div class="form-group">
      <label>Nama Toko</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
      <label>Alamat Toko</label>
      <input type="text" name="alm" class="form-control">
    </div>
    <div class="form-group">
      <label>No HP Toko</label>
      <input type="text" name="hp" class="form-control">
    </div>
    <div class="form-group">
      <label>Email Toko</label>
      <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Toko" class="btn btn-info">
    </div>
  </form>
</div>