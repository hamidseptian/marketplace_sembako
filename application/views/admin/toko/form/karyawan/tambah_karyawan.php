
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpan_karyawan') ?>" method='post'>
    <div class="form-group">
      <label>Nama Karyawan</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
      <label>Alamat Karyawan</label>
      <input type="text" name="alm" class="form-control">
    </div>
    <div class="form-group">
      <label>No HP Karyawan</label>
      <input type="text" name="hp" class="form-control">
    </div>
    <div class="form-group">
      <label>Jabatan Karyawan</label>
      <input type="text" name="jabatan" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Karyawan" class="btn btn-info">
    </div>
  </form>
</div>