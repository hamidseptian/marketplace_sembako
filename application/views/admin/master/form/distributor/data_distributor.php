<div class="box-header with-border">
  <h3 class="box-title">Data Distributor</h3>
  <div class="pull-right">
   <a href="#" class="btn btn-info" data-toggle="modal" data-target="#adddistributor">Tambah Distributor</a>

    <form action="<?php echo base_url('user/admin/master/simpan_distributor') ?>" method="post">
    <div class="modal fade" id="adddistributor">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data Distributor</h4>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label>Nama Distributor</label>
                 
                  <input type="text" name="nama" class="form-control">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                 
                  <input type="text" name="alm" class="form-control">
                </div>
                <div class="form-group">
                  <label>No HP</label>
                 
                  <input type="text" name="nohp" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis Barang Yan Di Distribusikan</label>
                 
                  <input type="text" name="jenis" class="form-control">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Distributor</button>
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
        <td>Nama Distributor</td>
        <td>Alamat</td>
        <td>No HP </td>
        <td>Jenis Distribusi</td>
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { 
      
      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_distributor'] ?></td>
        <td><?php echo $d1['alamat'] ?></td>
        <td><?php echo $d1['nohp'] ?></td>
        <td><?php echo $d1['jenis_distribusi_barang'] ?></td>
       
        <td>
          <a href="<?php echo base_url('user/admin/master/edit_distributor/'.$d1['id_distributor']) ?>" class="btn btn-info btn-xs" >Edit</a>
          <a href="<?php echo base_url('user/admin/master/hapus_distributor/'.$d1['id_distributor']) ?>" class="btn btn-info btn-xs" onclick="return confirm('Hapus distributor.?')">Hapus</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
