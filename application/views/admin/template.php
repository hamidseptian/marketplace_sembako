 <?php 
// error_reporting(0);

$level = $this->session->userdata('level');
if ($level=='Admin Distributor') {
$iddistr = $this->session->userdata('id_admin');
  $jpesanbaru= $this->db->query("SELECT * from pesanan_distributor where id_distributor =  '$iddistr' and status='Order'")->num_rows() ;
}else if ($level=='Admin Toko') {

$idtoko = $this->session->userdata('id_admin');
$jpesanbaru= $this->db->query("SELECT * from pesanan 
      join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
      join barang on barang.id_barang = pesanan.id_barang 
      join toko on barang.id_toko=toko.id_toko
      where barang.id_toko = '$idtoko' and status_pesanan = 'Order' group by pesanan.id_pelanggan, pesanan.tanggal_pesan, pesanan.waktu_pesan")->num_rows() ;
}

       ?>
       <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Administrator Page - Marketplace Sembako</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url() ?>/adminlte/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url() ?>/adminlte/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php $namauser = $this->session->userdata('nama_user'); 
                  if (isset($namauser)) {
                    echo $namauser;
                  }
                  else {
                    echo "Tidak ada session";
                  }
                ?>
                  
                </span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php $namauser = $this->session->userdata('nama_user'); 
                  if (isset($namauser)) {
                    echo $namauser;
                  }
                  else {
                    echo "Tidak ada session";
                  }
                ?>
                   - <?php $level = $this->session->userdata('level'); 
                  if (isset($level)) {
                    echo $level;
                  }
                  else {
                    echo "Level Tidak Diketahui";
                  }
                ?>
                  
                  <small><?php echo   $this->session->userdata('nama_toko'); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url() ?>/file/gambar/user.jpg" class="img" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php $namauser = $this->session->userdata('nama_user'); 
                  if (isset($namauser)) {
                    echo $namauser;
                  }
                  else {
                    echo "Tidak ada session";
                  }
                ?>
                  
            </p>
          <a href="#">
            <?php $level = $this->session->userdata('level'); 

                  if (isset($level)) {
                    if ($level=='Admin Master' || $level=='Admin Distributor') {
                      echo $level;
                    }
                    else{
                      echo  $this->session->userdata('nama_toko');
                    }
                  }
                  else {
                    echo "Tidak ada session";
                  }
                ?>
                  
          </a>
        </div>
      </div>
     
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->session->userdata('level')=='Admin Master'){ ?>
     
        <li><a href="<?php echo base_url('user/admin/master/data_toko') ?>"><i class="fa fa-circle-o"></i>Data Toko</a></li>
        <li><a href="<?php echo base_url('user/admin/master/penjualan') ?>"><i class="fa fa-circle-o"></i>Penjualan Toko</a></li>
        <li><a href="<?php echo base_url('user/admin/master/wilayah') ?>"><i class="fa fa-circle-o"></i>Data Wilayah</a></li>
        <li><a href="<?php echo base_url('user/admin/master/distributor') ?>"><i class="fa fa-circle-o"></i>Data Distributor</a></li>
      <?php } 
      elseif($this->session->userdata('level')=='Admin Toko'){ ?>
        <li><a href="<?php echo base_url('user/admin/toko/karyawan') ?>"><i class="fa fa-book"></i>Data Karyawan</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/rekening') ?>"><i class="fa fa-book"></i>Data Rekening</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/poin') ?>"><i class="fa fa-book"></i>Data Poin</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/diskon') ?>"><i class="fa fa-book"></i>Data Diskon</a></li>
        
        <li><a href="<?php echo base_url('user/admin/toko/data_barang') ?>"><i class="fa fa-book"></i>Data Barang</a></li>

        <li><a href="<?php echo base_url('user/admin/toko/pesanan') ?>"><i class="fa fa-book"></i>
         Data Pesanan Baru
         <?php if ($jpesanbaru>0): ?>
            
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $jpesanbaru ?> Baru</span>
            </span>
         <?php endif ?>
          </a></li>

        <li><a href="<?php echo base_url('user/admin/toko/penukaran_poin') ?>"><i class="fa fa-book"></i>Data Penukaran Poin</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/pesanan_diantar') ?>"><i class="fa fa-book"></i>Data Pemesanan Diantarkan</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/pesanan_cancel') ?>"><i class="fa fa-book"></i>Data Pemesanan Cancel</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/penjualan') ?>"><i class="fa fa-book"></i>Data Penjualan</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/ongkir') ?>"><i class="fa fa-book"></i>Data Ongkir</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/distributor') ?>"><i class="fa fa-book"></i>Pesan Barang Ke Distributor</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/pesanan_distributor') ?>"><i class="fa fa-book"></i>Pesanan Distributor</a></li>
        <li><a href="<?php echo base_url('user/admin/toko/update_toko') ?>"><i class="fa fa-book"></i>Perbaharui Data Toko</a></li>
        <!-- <li><a href="<?php echo base_url('user/admin/toko/') ?>"><i class="fa fa-book"></i>Laporan</a></li> -->
      <?php } 
      elseif($this->session->userdata('level')=='Admin Distributor'){ ?>
        <li><a href="<?php echo base_url('user/admin/distributor/pesanan_baru') ?>"><i class="fa fa-book"></i>Pesanan Baru  <?php if ($jpesanbaru>0): ?>
            
            <span class="pull-right-container">
              <span class="label label-primary pull-right"><?php echo $jpesanbaru ?> Baru</span>
            </span>
         <?php endif ?></a></li>
          

        <li><a href="<?php echo base_url('user/admin/distributor/pesanan_diproses') ?>"><i class="fa fa-book"></i>Pesanan Diproses</a></li>
        
        <li><a href="<?php echo base_url('user/admin/distributor/pesanan_selesai') ?>"><i class="fa fa-book"></i>Pesanan Selesai</a></li>
      <?php } ?>
        
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <section class="content-header">
      <h1>
        <?php 
        if (isset($judul_konten)) {
              echo $judul_konten;
            }
            else {
              echo "Tidak ada judul";
            } ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url() ?>user/admin/toko"><i class="fa fa-laptop"></i>Menu</a></li>
        <li><a href="#">
            <?php 
        if (isset($menu)) {
              echo $menu;
            }
            else {
              echo "Tidak Diketahui";
            } ?>
              
            </a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <!-- /.box -->

          <div class="box">
           
             <?php echo $konten ?>
            
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.18
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>/adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>/adminlte/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#tabel1').DataTable()
    $('#tabel2').DataTable()
    $('#tabel3').DataTable()
     $('#tabelscroll1').DataTable( {
    "scrollX": true
    } );
     $('#tabelscroll2').DataTable( {
    "scrollX": true
    } );
    $('#tabel4').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
<script type="text/javascript">

    function getkey(e)
            {
            if (window.event)
               return window.event.keyCode;
            else if (e)
               return e.which;
            else
               return null;
            }
            
        function goodchars(e, goods, field)
            {
                var key, keychar;
                key = getkey(e);
                if (key == null) return true;
                 
                keychar = String.fromCharCode(key);
                keychar = keychar.toLowerCase();
                goods = goods.toLowerCase();
                 
                // check goodkeys
                if (goods.indexOf(keychar) != -1)
                    return true;
                // control keys
                if ( key==null || key==0 || key==8 || key==9 || key==27 )
                   return true;
                    
                if (key == 13) {
                    var i;
                    for (i = 0; i < field.form.elements.length; i++)
                        if (field == field.form.elements[i])
                            break;
                    i = (i + 1) % field.form.elements.length;
                    field.form.elements[i].focus();
                    return false;
                    };
                // else return false
                return false;
            }
</script>
</body>
</html>
