
<h3>Aplikasi Marketplace Sembako Kota Solok</h3>
    <h2 style="margin-top:-15px">
      <?php echo $toko['nama_toko'] ?></h2>
      <p  style="margin-top:-20px">
<?php echo $toko['alamat_toko'] ?><br>
Telepon : <?php echo $toko['nohp_toko'] ?></p>

<div style="clear:both;"></div>
<hr>

  <?php echo $this->session->userdata('pesan') ?>
  
    
  <div style="float: left;">  
    <table class="table">
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><?php echo $pelanggan['nama_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Tanggal Pesan</td>
        <td>:</td>
        <td><?php echo $tgl_pesan ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $pelanggan['alamat_pelanggan'] ?></td>
      </tr>
      
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td><?php echo $pelanggan['nohp_pelanggan'] ?></td>
      </tr>
      <tr>
        <td>Status Pesanan</td>
        <td>:</td>
        <td><?php echo $pelanggan['status_pesanan'] ?></td>
      </tr>
    
    </table>
  </div>
  <div style="float: right;">
    <h2>Faktur Pembayaran</h2>
  </div>
  <div style="clear: both"></div>
<br><br>
<table class="table table-striped table-bordered" id="tabel1" border="1" style="border-collapse: collapse; width:100%">
    <thead>
      <tr>
        <td>No</td>
     
         <td>Nama Barang</td>
        <td>Harga Barang</td>
        <td>Jumlah Pesanan</td>
        <td>Total Harga</td>
        <td>Diskon</td>
        <td>Harga setelah diskon</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    $nol=0;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
      
       <td><?php echo $d1['nama_barang'] ?></td>
        <td>Rp. <?php echo number_format($d1['harga_jual']) ?></td>
        <td><?php echo $d1['qty'] ?> <?php echo $d1['satuan_barang'] ?> </td>
        <td>
          <?php $total =  $d1['harga_jual'] * $d1['qty'];
          echo"Rp. ". number_format($total)  ;
          $potongan = $total * ($d1['diskon'] / 100);
          $diskon = $total - $potongan;
          $totalharga = $nol +=$diskon;
          ?>
            
          </td>
          <td><?php echo $d1['diskon'] ?>%</td>
          <td>Rp. <?php echo $diskon ?></td>
      </tr>
    <?php } ?>
    <tfoot>
       <tr>
          <td colspan="6">Total Penjualan</td>
          <td>Rp. <?php echo  number_format(@$totalharga) ?></td>
        </tr>
        <tr>
          <td colspan="6">Ongkir</td>
          <td>Rp. <?php echo  number_format($ongkir['ongkir']) ?></td>
        </tr>
        <tr>
          <td colspan="6">Total Belanja</td>
          <td>Rp. <?php echo  number_format($totalall = $totalharga + $ongkir['ongkir']) ?></td>
        </tr>
    </tfoot>
    
  </table>


  <br>

  <div style="width: 300px;float: left; height: 150px; margin-left: 50px">
    <center>


      Pelanggan <br>
       

       <br><br><br><br>
       <?php echo $d1['nama_pelanggan'] ?>
        </center>



</div>
  <div style="width: 300px;float: right; height: 150px; margin-left: 50px">
    <center>

Hormat Kami<br>
      
       

       <br><br><br><br>
       <?php echo $d1['nama_toko'] ?>
        </center>



</div>
<script type="text/javascript">
  window.print()
</script>