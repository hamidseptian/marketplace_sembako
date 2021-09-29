
<div class="box-body">
  <?php echo $this->session->userdata('pesan') ?>
  <a href="<?php echo base_url() ?>user/admin/toko/tambahkaryawan/" class="btn btn-info" >Tambah Karyawan</a>
  <br><br>

  <table class="table table-striped table-bordered" id="tabel1">
    <thead>
      <tr>
        <td>No</td>
        <td>Nama Pelanggan</td>
        <td>Alamat</td>
        <td>No HP</td>
        <td>Jabatan</td>
      
        <td>Option</td>
      </tr>
    </thead>
    <?php 
    $no=1;
    foreach ($data as $d1) { ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $d1['nama_karyawan'] ?></td>
        <td><?php echo $d1['alamat_karyawan'] ?></td>
        <td><?php echo $d1['nohp_karyawan'] ?></td>
        <td><?php echo $d1['jabatan_karyawan'] ?></td>
        <td>
          <a href="<?php echo base_url() ?>user/admin/toko/hapuskaryawan/<?php echo $d1['id_karyawan'] ?>" class="btn btn-danger btn-xs" >Hapus</a>
          <a href="<?php echo base_url() ?>user/admin/toko/editkaryawan/<?php echo $d1['id_karyawan'] ?>" class="btn btn-warning btn-xs" >Edit</a>
        </td>
      </tr>
    <?php } ?>
    
  </table>
</div>
