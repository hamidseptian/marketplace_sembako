
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpanedit_karyawan') ?>" method='post'>
    <div class="form-group">
      <label>Nama Karyawan</label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_karyawan'] ?>">
      <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_karyawan'] ?>">
    </div>
    <div class="form-group">
      <label>Posisi Karyawan</label>
      <input type="text" name="posisi" class="form-control"  value="<?php echo $data['posisi_karyawan'] ?>">
    </div>
   
    <div class="form-group">
      <input type="submit" value="Simpan Perubahan Data Karyawan" class="btn btn-info">
    </div>
  </form>
</div>