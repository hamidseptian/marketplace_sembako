
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
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
    
    </table>
    <br>
     
              <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#antar">Antar Pesanan</a>
              <a href="#" class="btn btn-default btn-sm" data-toggle="modal" data-target="#jemput">Pesanan Dijemput</a>
              <a href="#" class="btn btn-info btn-sm" onclick="return confirm('Apakah anda ingin menolak pesanan ini.?')">Tolak Pesanan</a>
  </div>
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
          <td colspan="4">Total</td>
          <td>Rp. <?php echo  number_format($totalharga) ?></td>
        </tr>
        <tr>
          <td colspan="4">Ongkir</td>
          <td>Rp. <?php echo  number_format($ongkir['ongkir']) ?></td>
        </tr>
        <tr>
          <td colspan="4">Total Belanja</td>
          <td>Rp. <?php echo  number_format($totalall = $totalharga + $ongkir['ongkir']) ?></td>
        </tr>
       

    
  </table>
</div>
  <!-- <div class="col=md-8"></div> -->
  
</div>


<form action="<?php echo base_url() ?>user/admin/toko/konfirmasi_pesanan/<?php echo $id.'/'.$tgl ?>" method="post"> 
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

<form action="<?php echo base_url() ?>user/admin/toko/konfirmasi_pesanan/<?php echo $id.'/'.$tgl ?>" method="post"> 
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
                        <h4>Total : <?php echo $totalall ?></h4>
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