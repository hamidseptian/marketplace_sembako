<div class="box-body">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              
              <h5 class="widget-user-desc">Selamat datang di halaman administrator pengelola toko</h5>
              <h3 class="widget-user-username"><?php echo $this->session->userdata('nama_user') ?></h3>
              <h4><?php echo $this->session->userdata('nama_toko') ?></h4>
            </div>
            
          </div>
          <!-- /.widget-user -->



<div class="row">

  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jkaryawan ?></h3>
              <p>Karyawan</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/karyawan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jbarang ?></h3>
              <p>Barang</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/data_barang" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jpesananbaru ?></h3>
              <p>Pesanan Baru</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/pesanan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jpesanandiantarkan ?></h3>
              <p>Pesanan Diantarkan</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/pesanan_diantar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jpesanancancel ?></h3>
              <p>Pesanan Cancel</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/pesanan_cancel" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jpesananselesai ?></h3>
              <p>Pesanan Selesai</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/penjualan" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $jongkir ?></h3>
              <p>Data Ongkir</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/ongkir" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
  
        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Perbaharui</h3>
              <p>Data Toko</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>user/admin/toko/update_toko" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-xs-6">
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>Logout</h3>
              <p>Keluar dari halaman administrator</p>
            </div>
            <div class="icon">
              
            </div>
            <a href="<?php echo base_url() ?>auth/logout" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>



      </div>
    </div>