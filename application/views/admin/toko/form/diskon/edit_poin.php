
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpanedit_poin') ?>" method='post'>
    <div class="form-group">
      <label>Nama poin  </label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_poin'] ?>">
      <input type="number" name="syarat" class="form-control" value="<?php echo $data['syarat'] ?>">
    </div>
    <div class="form-group">
      <label>Poin</label>
      <input type="number" name="poin" class="form-control" value="<?php echo $data['poin'] ?>">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data poin  " class="btn btn-info">
    </div>
  </form>
</div>