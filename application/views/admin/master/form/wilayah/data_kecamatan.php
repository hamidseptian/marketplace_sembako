<div class="box-header with-border">
  <h3 class="box-title">Data Wilayah Kecamatan</h3>
  <div class="pull-right">
   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#addkecamatan">Tambah Kecamatan</a>

    <form action="<?php echo base_url('user/admin/master/simpan_kecamatan') ?>" method="post">
    <div class="modal fade" id="addkecamatan">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Kecamatan</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Kecamatan</label>
                 
                  <input type="text" name="nama" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Kecamatan</button>
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
        <td>Jumlah Kelurahan</td>
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
        <td><?php echo $d1['nama_kecamatan'] ?></td>
        <td><?php echo $jmkel ?> Kelurahan</td>
        <td>
          <a href="<?php echo base_url('user/admin/master/detail_wilayah/'.$d1['id_kecamatan']) ?>" class="btn btn-info btn-xs" >Lihat Data Kelurahan</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
