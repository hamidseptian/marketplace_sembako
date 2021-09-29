
<h3>Aplikasi Marketplace Sembako Kota Solok</h3>
    <h2 style="margin-top:-15px">
      <?php echo $toko['nama_toko'] ?></h2>
      <p  style="margin-top:-20px">
<?php echo $toko['alamat_toko'] ?><br>
Telepon : <?php echo $toko['nohp_toko'] ?></p>


<div style="clear:both;"></div>
<hr>

<h3>Laporan Data Pemesanan</h3>
<table style="width:100%; border-collapse: collapse;" border="1">
  <tr style="text-align: center;">
    <td>No</td>
    <td>Nama Barang</td>
    <td>Harga Barang</td>
    <td>Jumlah Pesanan</td>
    <td>Total Harga</td>
    
  </tr>
<?php 
$no =1;
$nol =0;
foreach ($data as $d1) { 
  $total = $d1['qty'] * $d1['harga_jual'];
  $totalharga = $nol += $total;?>
  
  <tr>
    <td  style="text-align: center;"><?php echo $no++ ;?></td>
    <td><?php echo $d1['nama_barang'] ?></td>
    <td><?php echo "Rp. ".number_format($d1['harga_jual']) ?></td>
    <td><?php echo $d1['qty'] ?> <?php echo $d1['satuan_barang'] ?></td>
    <td><?php echo "Rp. ".number_format($total) ?></td>
   
  </tr>

<?php } ?>
  <tr>
      <td colspan="4">Total Pendapatan </td>
      <td><?php echo "Rp. ".number_format(@$totalharga) ?></td>
  </tr>
</table>

<script type="text/javascript">
  window.print()
</script>