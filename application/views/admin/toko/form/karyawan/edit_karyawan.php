
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpanedit_karyawan') ?>" method='post'>
    <div class="form-group">
      <label>Nama Karyawan</label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_karyawan'] ?>">
      <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_karyawan'] ?>">
    </div>
    <div class="form-group">
      <label>Alamat Karyawan</label>
      <input type="text" name="alm" class="form-control" value="<?php echo $data['alamat_karyawan'] ?>">
    </div>
    <div class="form-group">
      <label>No HP Karyawan</label>
      <input type="text" name="hp" class="form-control" value="<?php echo $data['nohp_karyawan'] ?>">
    </div>
    <div class="form-group">
      <label>Jabatan Karyawan</label>
      <input type="text" name="jabatan" class="form-control" value="<?php echo $data['jabatan_karyawan'] ?>">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Karyawan" class="btn btn-info">
    </div>
  </form>
</div>