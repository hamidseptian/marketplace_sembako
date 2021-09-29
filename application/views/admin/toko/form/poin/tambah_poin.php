
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpan_poin') ?>" method='post'>
    <div class="form-group">
      <label>Syarat minimal belanja</label>
      <input type="number" name="syarat" class="form-control">
    </div>
    <div class="form-group">
      <label>Poin</label>
      <input type="number" name="poin" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Poin" class="btn btn-info">
    </div>
  </form>
</div>