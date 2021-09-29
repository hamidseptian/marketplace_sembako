
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Toko</td>
        <td>Penjualan Toko</td>
        <td>Potongan</td>
        <td>Pendapatan Bersih</td>
        <td>Sudah Dibayarkan</td>
        <td>Sisa</td>
       
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) {
      $idtoko = $d1['id_toko'];
      $query = "SELECT * from pesanan 
      join pelanggan on pelanggan.id_pelanggan = pesanan.id_pelanggan
      join barang on barang.id_barang = pesanan.id_barang 
      join toko on barang.id_toko=toko.id_toko
      where barang.id_toko = '$idtoko' and pesanan.status_pesanan = 'Selesai' ";
      $penjualan= $this->db->query($query)->result_array() ;
      $jdatapenjualan= $this->db->query($query)->num_rows() ;
      if ($jdatapenjualan>0) {
        
        $nol = 0;
        $nol2 = 0;
        $nol3 = 0;
        foreach ($penjualan as $d2) {
              $total =  $d2['harga_jual'] * $d2['qty'];


                $potongandiskon = $total * ($d2['diskon'] / 100);
          $diskon = $total - $potongandiskon;


            $potongan = 0.05 * $diskon;
            $pendapatan = $diskon - $potongan;
            //echo"Rp. ". number_format($total)  ;
            $totalharga = $nol +=$diskon;
            $totalpotongan = $nol2+=$potongan;
            $totalbersih = $nol3+=$pendapatan;
        }
      }else{
        $totalharga = 0;
            $totalpotongan = 0;
            $totalbersih = 0;
      }

      $qsetoran = $this->db->query("SELECT sum(jumlah_setoran) as sudahstor from setoran_toko where id_toko='$idtoko'")->row_array();
      $disetor = $qsetoran['sudahstor'];
      $sisasetoran = $totalpotongan - $disetor;

      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_toko'] ?></td>
        <td><?php echo number_format($totalharga) ?></td>
        <td><?php echo number_format($totalpotongan) ?></td>
        <td><?php echo number_format($totalbersih) ?></td>
        <td><?php echo number_format($disetor) ?></td>
        <td><?php echo number_format($sisasetoran) ?></td>
      
        <td>
          <a href="<?php echo base_url('user/admin/master/detail_penjualan_toko/'.$d1['id_toko'].'/'.$d1['nama_toko']) ?>" class="btn btn-info btn-xs" >Lihat detail Penjualan</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
 <br><br>
</div>
