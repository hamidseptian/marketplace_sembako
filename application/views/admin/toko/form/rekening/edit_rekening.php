
<div class="box-body">
  <form action="<?php echo base_url('user/admin/toko/simpanedit_rekening') ?>" method='post'>
    <div class="form-group">
      <label>Nama rekening</label>
      <input type="hidden" name="id" class="form-control" value="<?php echo $data['id_rekening'] ?>">
      <input type="text" name="nama" class="form-control" value="<?php echo $data['nama_rekening'] ?>">
    </div>
    <div class="form-group">
      <label>Bank</label>
      <input type="text" name="bank" class="form-control" value="<?php echo $data['bank'] ?>">
    </div>
    <div class="form-group">
      <label>No rekening</label>
      <input type="text" name="nr" class="form-control" value="<?php echo $data['no_rekening'] ?>">
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Rekening" class="btn btn-info">
    </div>
  </form>
</div>