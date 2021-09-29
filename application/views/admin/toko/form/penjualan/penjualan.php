
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <table class="table table-striped table-bordered" id="tabelscroll2">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Pelanggan</td>
        <td>Alamat</td>
        <td>Tanggal Pesan</td>
        <td>Waktu Pesan</td>
         <td>Nama Barang</td>
        <td>QTY</td>
        <td>Harga Perbuah</td>
        <td>Harga Total</td>
        <td>Diskon Barang</td>
        <td>Harga setelah diskon</td>
        <td>Biaya Potongan</td>
        <td>Pendapatan Bersih</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    $nol=0;
    $nol2=0;
    $nol3=0;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_pelanggan'] ?></td>
        <td><?php echo $d1['alamat_pelanggan'] ?></td>
        <td><?php 
          $pt = explode('-', $d1['tanggal_pesan']);
          echo $pt[2].'-'.$pt[1].'-'.$pt[0];
         ?></td>
        <td><?php echo $d1['waktu_pesan'] ?></td>
       <td><?php echo $d1['nama_barang'] ?></td>
        <td><?php echo $d1['qty'] ?> </td>
        <td>Rp. <?php echo number_format($d1['harga_jual']) ?></td>
        <td>
          <?php $total =  $d1['harga_jual'] * $d1['qty'];
          $setelahdiskon = $total * ($d1['diskon'] / 100);
          $diskon = $total - $setelahdiskon;

          $potongan = 0.05 * $diskon;
          $pendapatan = $diskon - $potongan;
          echo"Rp. ". number_format($total)  ;
          $totalharga = $nol +=$diskon;
          $totalpotongan = $nol2+=$potongan;
          $totalbersih = $nol3+=$pendapatan;
          ?>
            
          </td>
           <td><?php echo $d1['diskon'] ?>%</td>
           <td><?php echo $diskon ?></td>
          <td>Rp. <?php echo number_format($potongan) ?></td>
          <td>Rp. <?php echo number_format($pendapatan) ?></td>
      </tr>
    <?php } ?>
    <tfoot>
       <tr>
          <td colspan="8">Total</td>
          <td>Rp. <?php echo  number_format(@$totalharga) ?></td>
          <td>Rp. <?php echo  number_format(@$totalpotongan) ?></td>
          <td>Rp. <?php echo  number_format(@$totalbersih) ?></td>
        </tr>
    </tfoot>
    
  </table>
  <a href="<?php echo base_url('user/admin/toko/print_penjualan') ?>" class="btn btn-info btn-sm" target='_blank'>Print Data Penjualan</a> 
  <a href="<?php echo base_url('user/admin/toko/bersihkan_penjualan') ?>" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda akan menghapus data penjualan.?')">Hapus Semua Data Penjualan</a> 
  <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#lt">Lihat Tagihan anda</a>
  <br><br>
</div>



<form action="<?php echo base_url() ?>user/admin/master/simpan_setoran" method="post"> 
               <div class="modal fade" id="lt">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tagihan Anda</h4>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          Tagihan anda akan di proses admin setelah melakukan ppembayaran
                        </div>
                        
                        <div class="form-group">
                          
                           
                            <table class="table">
                              <tr>
                                <td>Total Tagihan Mitra</td>
                                <td>:</td>
                                <td>Rp. <?php echo  number_format(@$totalpotongan) ?></td>
                              </tr>
                              <tr>
                                <td>Sudah Dibayar</td>
                                <td>:</td>
                                <td>Rp. <?php echo  number_format(@$disetor) ?></td>
                              </tr>
                              <tr>
                                <td>Sisa Pembayaran</td>
                                <td>:</td>
                                <td>Rp. <?php 
                                $sisasetoran = $totalpotongan - $disetor;
                                echo  number_format(@$sisasetoran) ?></td>
                              </tr>
                            </table>

                        </div>
                        <div class="form-group">
                            <h4>Data Pembayaran</h4>
                        
                     
                        <?php if ($jdstor>0) { ?>
                          
                        <table class="table">
                          <tr>
                            <td>No</td>
                            <td>Tanggal</td>
                            <td>Jumlah Bayar</td>
                         
                          </tr>
                          <?php 
                          $nomor = 1;
                          $nol4 = 0;
                          foreach ($listsetor as $ls): 
                            $pt = explode('-', $ls['tanggal_setor']);
                            $tglst = $pt[2].'-'.$pt[1].'-'.$pt[0];
                            $totsetor = $nol4+= $ls['jumlah_setoran'];
                            ?>
                            
                          <tr>
                            <td><?php echo $nomor++; ?></td>
                            <td><?php echo $tglst; ?></td>
                            <td>Rp. <?php echo $ls['jumlah_setoran']; ?></td>
                            
                          
                          </tr>
                          <?php endforeach ?>

                          <tr>
                            <td colspan="2">Total</td>
                            <td colspan="2">Rp. <?php echo $totsetor?></td>
                            
                          
                          </tr>
                        </table>
                        <?php }else{
                          echo ' <div class="alert alert-info">Belum ada data pembayaran</div>';
                        } ?>
                        </div>
                       
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </form>