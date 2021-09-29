<div class="box-header with-border">
  <h3 class="box-title">Data Wilayah Kecamatan <?php echo $kec['nama_kecamatan'] ?></h3>
  <div class="pull-right">
    <a href="<?php echo base_url('user/admin/master/wilayah') ?>" class="btn btn-info">Kembali</a>
    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addkelurahan">Tambah Kelurahan</a>

    <form action="<?php echo base_url('user/admin/master/simpan_kelurahan') ?>" method="post">
    <div class="modal fade" id="addkelurahan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Kelurahan</label>
                  <input type="hidden" name="id" value="<?php echo $kec['id_kecamatan'] ?>" class="form-control">
                  <input type="text" name="nama" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Kelurahan</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
      </form>
  </div>
</div>
<div class="box-body">
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Kecamatan</td>
        
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { 
      $jmkel=$this->db->get_where('kelurahan', ['id_kecamatan'=>$d1['id_kecamatan']])->num_rows();
      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_kelurahan'] ?></td>
       
        <td>
          <a href="<?php echo base_url('user/admin/master/hapus_kelurahan/'.$d1['id_kelurahan']) ?>" class="btn btn-info btn-xs" >Hapus  Kelurahan</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
