<div class="box-body">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              
              <h5 class="widget-user-desc">Selamat datang di halaman administrator pengelola toko</h5>
              <h3 class="widget-user-username"><?php echo $user['nama_distributor'] ?></h3>
              <h4>Distribusi barang <?php echo $user['jenis_distribusi_barang'] ?></h4>
            </div>
            
          </div>
          <!-- /.widget-user -->



<div class="row">

  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $new ?></h3>
              <p>Pesanan baru</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/distributor/pesanan_baru" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $proses ?></h3>
              <p>Pesanan diproses</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/distributor/pesanan_diproses" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $selesai ?></h3>
              <p>Pesanan selesai</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>/user/admin/distributor/pesanan_selesai" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  

      </div>
    </div>