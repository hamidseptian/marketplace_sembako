<br>
<div class="box-body">
<?php echo $this->session->flashdata('pesan') ?>

  <form action="<?php echo base_url('user/admin/toko/simpan_diskon') ?>" method='post'>
    <div class="form-group">
      <label>Barang</label>
      <select class="form-control" name="barang">
        <?php foreach ($barang as $br) { ?>
          <option value="<?php echo $br['id_barang'] ?>"><?php echo $br['nama_barang'] ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="form-group">
      <label>Diskon (%)</label>
        <input type="text" name="tglbook" class="form-control" required id="lama"  onKeyPress="return goodchars(event,'1234567890',this)" maxlength="2">
      </div>
    <div class="form-group">
      <label>Mulai</label>
      <input type="date" name="mulai" class="form-control" required>
    </div>
    <div class="form-group">
      <label>Selesai</label>
      <input type="date" name="selesai" class="form-control" required>
    </div>
    <div class="form-group">
      <input type="submit" value="Simpan Data Diskon" class="btn btn-info">
    </div>
  </form>
</div>