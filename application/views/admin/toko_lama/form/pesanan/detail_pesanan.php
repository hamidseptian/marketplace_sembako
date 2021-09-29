<div class="box-header with-border">
  <h3 class="box-title">Data Pesanan</h3>

  
</div>
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  
  <table class="table table-striped table-bordered" id="">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Barang</td>
        <td>QTY</td>
        <td>Harga Perbuah</td>
        <td>Harga Total</td>
      
      
      </tr>
    </thead>
    <?php 
    $no=1;
    $nol = 0 ;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['qty'] ?> </td>
        <td>Rp. <?php echo number_format($d1['harga_jual']) ?></td>
        <td>
          <?php $total =  $d1['harga_jual'] * $d1['qty'];
          echo"Rp. ". number_format($total)  ;
          $totalharga = $nol +=$total;
          ?>
            
          </td>
      
      </tr>
    <?php } ?>
        <tr>
          <td colspan="4">Total Belanja</td>
          <td>Rp. <?php echo  number_format($totalharga) ?></td>
        </tr>
        <tr>
          <td colspan="4">Ongkir </td>
          <td>Rp. <?php  $ongkir  = $ongkir['ongkir'];
          echo number_format($ongkir);
          $totalbelanja = $ongkir + $totalharga; ?></td>
        </tr>
        <tr>
          <td colspan="4">Total Pembayaran</td>
          <td>Rp. <?php echo  number_format($totalbelanja) ?></td>
        </tr>
    
  </table>
  <br>
  <form action="<?php echo base_url() ?>user/admin/toko/konfirmasi_pesanan" method="post">
  <div class="col-md-6">
    <div class="box-header with-border">
      <h3 class="box-title">Identitas Pelanggan</h3>  
    </div>
    <table class="table">
      <tr>
        <td>Nama Pelanggan</td>
        <td>:</td>
        <td><?php echo $pelanggan['nama_member'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $pelanggan['alamat_member'] ?></td>
      </tr>
      <tr>
        <td>No HP</td>
        <td>:</td>
        <td><?php echo $pelanggan['nohp_member'] ?></td>
      </tr>
    </table>
    <input type="hidden" name="id" value="<?php echo $pelanggan['id_member'] ?>">
    <input type="hidden" name="tglp" value="<?php echo $tanggalpesan ?>">
    <button class="btn btn-info" onclick="return confirm('Apakah data yang anda masukkan sudah benar.??')">Antarkan Pesanan</button>
  </div>

  <div class="col-md-4">
    <div class="box-header with-border">
      <h3 class="box-title">Proses transaksi</h3>  
    </div>
        
       <table class="table table-striped">
    <tr>
      <td>Tanggal Pesan</td>
      <td>:</td>
      <td><?php echo $tglp ?></td>
    </tr>
    <tr>
      <td>Total Belanja</td>
      <td>:</td>
      <td><?php echo $totalbelanja ?></td>
    </tr>
    <tr>
      <td>Pengantar Pesanan</td>
      <td>:</td>
      <td>
        <select name="idk" class="form-control">
          <?php foreach ($karyawan as $d2) { ?>
          <option value="<?php echo $d2['id_karyawan'] ?>"> <?php echo $d2['nama_karyawan'] ?> - <?php echo $d2['posisi_karyawan'] ?></option>
          
         <?php  } ?>
        </select>
      </td>
    </tr>
   

</table>
    </div>
  </form>
  </div>

