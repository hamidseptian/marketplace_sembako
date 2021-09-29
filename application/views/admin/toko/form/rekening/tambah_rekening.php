
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpan_rekening') ?>" method='post'>
    <div class="form-group">
      <label>Nama Rekening</label>
      <input type="text" name="nama" class="form-control">
    </div>
    <div class="form-group">
      <label>Bank</label>
      <input type="text" name="bank" class="form-control">
    </div>
    <div class="form-group">
      <label>No Rekening</label>
      <input type="text" name="nr" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Rekening" class="btn btn-info">
    </div>
  </form>
</div>