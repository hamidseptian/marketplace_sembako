
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <div class="col-md-8">
  <div class="box-header">
      <h3 class="box-title">Pesanan</h3>
      
    </div>
  <table class="table table-striped table-bordered" id="">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Barang</td>
        <td>QTY</td>
        <td>Harga Perbuah</td>
        <td>Harga Total</td>
        <td>Diskon</td>
        <td>Harga setelah diskon</td>
      
       
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
          $potongan = $total * ($d1['diskon'] / 100);
          $diskon = $total - $potongan;
          $totalharga = $nol +=$diskon; 
          ?>
            
          </td>
        <td><?php echo $d1['diskon'] ?>% </td>
        <td>Rp. <?php echo $diskon ?> </td>
      
      </tr>
    <?php } ?>
        <tr>
          <td colspan="6">Total</td>
          <td>Rp. <?php echo  number_format($totalharga) ?></td>
        </tr>
        <tr>
          <td colspan="6">Ongkir</td>
          <td>Rp. <?php echo  number_format($ongkir['ongkir']) ?></td>
        </tr>
        <tr>
          <td colspan="6">Total Belanja</td>
          <td>Rp. <?php echo  number_format($totalall = $totalharga + $ongkir['ongkir']) ?></td>
        </tr>
       

    
  </table>
</div>
  <div class="col-md-4">
    <div class="box-header">
      <h3 class="box-title">Identitas Pelanggan</h3>
    </div>
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
    
      <tr>
        <td>Pembayaran via</td>
        <td>:</td>
        <td><?php echo $pembayaran ?></td>
      </tr>
    
    </table>




    <br> 

    <?php if ($pembayaran=='Transfer') {
      if ($dibayar>0) {
        echo "Pembayaran telah di Transfer : <br>File bukti pembayaran";
                    echo "<img src='".base_url()."pembayaran/".$det_pembayaran['file']."' style='max-width:300px'>"; 
        if ($det_pembayaran['status']=='Pengecekan') {   ?>
                    <a href="<?php echo base_url() ?>user/admin/toko/acc_pembayaran/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menerima pembayaran ini.?')">Acc Pembayaran</a>
                    <a href="<?php echo base_url() ?>user/admin/toko/tolak_pembayaran/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menolak pembayaran ini.?')">Tolak Pembayaran</a>
        
      <?php }
      elseif ($det_pembayaran['status']=='Acc') { ?>
       <?php if ($pelanggan['status_pesanan']=='Order') { ?>
              
              <a href="<?php echo base_url() ?>user/admin/toko/print_faktur/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" target="_blank">Print Faktur</a>
              <a href="#" class="btn btn-info btn-xs" style="margin-top: 5px" data-toggle="modal" data-target="#antar">Antar Pesanan</a>
              <a href="#" class="btn btn-info btn-xs" style="margin-top: 5px" data-toggle="modal" data-target="#jemput">Pesanan Dijemput</a>
              <!-- <a href="<?php echo base_url() ?>user/admin/toko/batalkan_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menolak pesanan ini.?')">Tolak Pesanan</a> -->
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php }
      elseif ($pelanggan['status_pesanan']=='Diantarkan') { ?>
         <a href="<?php echo base_url() ?>user/admin/toko/print_faktur/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" target="_blank">Print Faktur</a>
        
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_diterima/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px">Sudah Diterima Pelanggan</a>
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_diantar" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php } 
      else{ ?>
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_cancel" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php }  

      }else{
        echo "Pembayaran ditolak<br>Pembayaran akan dilakukan kembali oleh pelanggan"; ?>
        <?php if ($pelanggan['status_pesanan']=='Order') { ?>
        <a href="<?php echo base_url() ?>user/admin/toko/batalkan_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menolak pesanan ini.?')">Tolak Pesanan</a>
        <?php 
        }else{
         echo "Pesanan Dibatalkan"; 
        }
      }

       }else{
        echo "Pelanggan ini belum melakukan pembayaran"; ?> <br>
        <a href="<?php echo base_url() ?>user/admin/toko/batalkan_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menolak pesanan ini.?')">Tolak Pesanan</a>
      <?php }
    }else{ ?>
      <?php if ($pelanggan['status_pesanan']=='Order') { ?>
              
              <a href="<?php echo base_url() ?>user/admin/toko/print_faktur/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" target="_blank">Print Faktur</a>
              <a href="#" class="btn btn-info btn-xs" style="margin-top: 5px" data-toggle="modal" data-target="#antar">Antar Pesanan</a>
              <a href="#" class="btn btn-info btn-xs" style="margin-top: 5px" data-toggle="modal" data-target="#jemput">Pesanan Dijemput</a>
              <a href="<?php echo base_url() ?>user/admin/toko/batalkan_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" onclick="return confirm('Apakah anda ingin menolak pesanan ini.?')">Tolak Pesanan</a>
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php }
      elseif ($pelanggan['status_pesanan']=='Diantarkan') { ?>
         <a href="<?php echo base_url() ?>user/admin/toko/print_faktur/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px" target="_blank">Print Faktur</a>
        
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_diterima/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" class="btn btn-info btn-xs" style="margin-top: 5px">Sudah Diterima Pelanggan</a>
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_diantar" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php } 
      else{ ?>
              <a href="<?php echo base_url() ?>user/admin/toko/pesanan_cancel" class="btn btn-info btn-xs" style="margin-top: 5px">Kembali</a>
      <?php } 
    } ?>
  </div>
  
  <!-- <div class="col=md-8"></div> -->
  
</div>


<form action="<?php echo base_url() ?>user/admin/toko/konfirmasi_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" method="post"> 
               <div class="modal fade" id="jemput">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Pesanan Dijemput.?</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="status" value="Selesai">
                        <input type="hidden" name="rider" value="">
                        <input type="hidden" name="belanja" value="<?php echo $totalharga ?>">
                        <h4>Pesanan dijemput pelanggan ke alamat toko <br>Total belanja Rp <?php echo number_format($totalharga) ?> </h4>
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button class="btn btn-info">Konfirmasi</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>

<form action="<?php echo base_url() ?>user/admin/toko/konfirmasi_pesanan/<?php echo $id.'/'.$tgl.'/'.$waktu ?>" method="post"> 
               <div class="modal fade" id="antar">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Antar Pesanan</h4>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="status" value="Diantarkan">
                        <h4>Antarkan pesanan ke alamat berikut</h4>
                        <table class="table">
                          <tr>
                            <td>Penerima</td>
                            <td>:</td>
                            <td><?php echo $pelanggan['nama_pelanggan'] ?></td>
                          </tr>
                          <!-- <tr>
                            <td>Tanggal Pesan</td>
                            <td>:</td>
                            <td><?php echo $tgl_pesan ?></td>
                          </tr> -->
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
                        </table>
                         <input type="hidden" name="belanja" value="<?php echo $totalharga ?>">
                        <h4>Total : <?php echo $totalharga ?></h4>
                        <h4>Ongkir : <?php echo $ongkir['ongkir'] ?></h4>
                        <h4>Total Semuanya: <?php echo $totalall ?></h4>
                        <div class="form-group">
                          <label>Rider</label>
                          <select name="rider" class="form-control">
                            <?php foreach ($rider as $r) { ?>
                              <option value="<?php echo $r['id_karyawan'] ?>"><?php echo $r['nama_karyawan'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                       
                     
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button class="btn btn-info">Konfirmasi</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>