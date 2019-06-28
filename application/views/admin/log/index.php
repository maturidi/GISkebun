<?php 
$data=$this->session->flashdata('sukses');
if($data!=""){ ?>
<div class="alert alert-success"><strong>Sukses! </strong> <?=$data;?></div>
<?php } ?>
<?php 
$data2=$this->session->flashdata('error');
if($data2!=""){ ?>
<div class="alert alert-danger"><strong> Error! </strong> <?=$data2;?></div>
<?php } ?>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h5 class="panel-title"><i class="icon-book"></i> Pengamatan <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button></h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
          	  <th>No</th>
              <th>Tanggal</th>
              <th>Jumlah Batang</th>
              <th class="never"></th>
              <th>Berat Batang</th>
              <th>Nama Kebun</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($v as $row): $no++; ?>
            <tr >
                <td class="never"></td>  
                <td><?php echo $row->tanggal; ?></td>
                <td><?php echo $row->jml_batang; ?></td>
                <td><?php echo $row->kd_pengamatan; ?></td>
                <td><?php echo $row->berat_batang; ?> Kg</td>
                <td><?php echo $row->nama_kebun; ?></td>
                <td>
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_pengamatan;?>" class="btn btn-success " data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <button type="button" data-toggle="modal" data-target="#modal_edit<?=$row->kd_pengamatan;?>" class="btn btn-primary " data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#modal_delete<?=$row->kd_pengamatan;?>"  class="btn btn-danger " data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button>
                  </center>
                </td>
            </tr>
            </tr>
          <?php endforeach; ?>
      </tbody> 
  </table>
  </div>
</div>

<!-- Tambah User -->
<div id="modal_theme_primary" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Log/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah Pengamatan</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getpeng('kd_pengamatan','kd_pengamatan'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div>
          <label class='col-md-3'>Tanggal</label>
           <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input class="form-control" type="text" name="tanggal" value="<?php echo getDatetimeNow(); ?>" readonly >   
           </div>
        </div>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang</label>
          <div class='col-md-9'><input type="text" name="jbatang" autocomplete="off" required placeholder="Masukkan Jumlah Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Berat Batang</label>
          <div class='col-md-9'><input type="text" name="bbatang" autocomplete="off" required placeholder="Masukkan Berat Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang Ha</label>
          <div class='col-md-9'><input type="text" name="jbatangha" autocomplete="off" required placeholder="Masukkan Jumlah Batang Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Daun Batang</label>
          <div class='col-md-9'><input type="text" name="dbatang" autocomplete="off" required placeholder="Masukkan Daun Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Ruas</label>
          <div class='col-md-9'><input type="text" name="jruas" autocomplete="off" required placeholder="Masukkan Jumah Ruas" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tangkai Batang</label>
          <div class='col-md-9'><input type="text" name="tbatang" autocomplete="off" required placeholder="Masukkan Tangkai Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Brix</label>
          <div class='col-md-9'><input type="text" name="brix" autocomplete="off" required placeholder="Masukkan Brix" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Catatan</label>
          <div class='col-md-9'><input type="text" name="catatan" autocomplete="off" required placeholder="Masukkan Catatan" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Kebun</label>
          <div class='col-md-9'>
          <select class="select-clear" name="kdkebun" required data-placeholder="Pilih Kode Kebun">
                <?php
                       foreach($kbn as $r):;
                       echo '<option value="'.$r->kd_kebun.'">'.$r->nama_kebun.'</option>';
                       endforeach;
                ?>
            </select>
          </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>



<!-- Tampil Data -->
<?php $no=0; foreach($v as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_pengamatan;?>" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Log/edit'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Detail Pengamatan</strong></h6>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_pengamatan;?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tanggal</label>
          <div class='col-md-9'><input type="text" name="tanggal" readonly value="<?=$row->tanggal;?>" autocomplete="off" required placeholder="Masukkan Tanggal" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang</label>
          <div class='col-md-9'><input type="text" name="jbatang" readonly value="<?=$row->jml_batang;?>" autocomplete="off" required placeholder="Masukkan Jumlah Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Berat Batang</label>
          <div class='col-md-9'><input type="text" name="bbatang" readonly value="<?=$row->berat_batang;?>" autocomplete="off" required placeholder="Masukkan Berat Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang Ha</label>
          <div class='col-md-9'><input type="text" name="jbatangha" readonly value="<?=$row->jml_batang_ha;?>" autocomplete="off" required placeholder="Masukkan Jumlah Batang Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Daun Batang</label>
          <div class='col-md-9'><input type="text" name="dbatang" readonly value="<?=$row->d_batang;?>" autocomplete="off" required placeholder="Masukkan Daun Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Ruas</label>
          <div class='col-md-9'><input type="text" name="jruas" readonly value="<?=$row->jml_ruas;?>" autocomplete="off" required placeholder="Masukkan Jumah Ruas" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tangkai Batang</label>
          <div class='col-md-9'><input type="text" name="tbatang" readonly  value="<?=$row->t_batang;?>" autocomplete="off" required placeholder="Masukkan Tangkai Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Brix</label>
          <div class='col-md-9'><input type="text" name="brix" readonly  value="<?=$row->brix;?>" autocomplete="off" required placeholder="Masukkan brix" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Catatan</label>
          <div class='col-md-9'><input type="text" name="catatan" readonly value="<?=$row->catatan;?>" autocomplete="off" required placeholder="Masukkan Catatan" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Kebun</label>
          <div class='col-md-9'><input type="text" name="kdkebun" readonly value="<?=$row->nama_kebun;?>" autocomplete="off" required placeholder="Masukkan Catatan" class="form-control" ></div>
        </div>
        <br>
      </div>
     
    </div>
    </form>
  </div>
</div>
<?php endforeach; ?>

<!-- Edit Data -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_edit<?=$row->kd_pengamatan;?>" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Log/edit'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Edit Pengamatan</strong></h6>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_pengamatan;?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br>
        <div>
          <label class='col-md-3'>Tanggal</label>
           <div class="input-group">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                  <input class="form-control" type="text" name="tanggal" value="<?=$row->tanggal;?>" readonly >   
           </div>
        </div>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang</label>
          <div class='col-md-9'><input type="text" name="jbatang" value="<?=$row->jml_batang;?>" autocomplete="off" required placeholder="Masukkan Jumlah Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Berat Batang</label>
          <div class='col-md-9'><input type="text" name="bbatang" value="<?=$row->berat_batang;?>" autocomplete="off" required placeholder="Masukkan Berat Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Batang Ha</label>
          <div class='col-md-9'><input type="text" name="jbatangha" value="<?=$row->jml_batang_ha;?>" autocomplete="off" required placeholder="Masukkan Jumlah Batang Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Daun Batang</label>
          <div class='col-md-9'><input type="text" name="dbatang" value="<?=$row->d_batang;?>" autocomplete="off" required placeholder="Masukkan Daun Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Jumlah Ruas</label>
          <div class='col-md-9'><input type="text" name="jruas" value="<?=$row->jml_ruas;?>" autocomplete="off" required placeholder="Masukkan Jumah Ruas" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tangkai Batang</label>
          <div class='col-md-9'><input type="text" name="tbatang"  value="<?=$row->t_batang;?>" autocomplete="off" required placeholder="Masukkan Tangkai Batang" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Brix</label>
          <div class='col-md-9'><input type="text" name="brix"  value="<?=$row->brix;?>" autocomplete="off" required placeholder="Masukkan Brix" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Catatan</label>
          <div class='col-md-9'><input type="text" name="catatan" value="<?=$row->catatan;?>" autocomplete="off" required placeholder="Masukkan Catatan" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Kebun</label>
          <div class='col-md-9'>
          <select class="select-clear" name="kdkebun" required data-placeholder="Pilih Rayon">                   
                    <?php
                       foreach($kbn as $r):
                       if ($row->kd_kebun==$r->kd_kebun) {
                         # code...
                        echo '<option value="'.$r->kd_kebun.'" '."selected".'>'.$r->nama_kebun.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_kebun.'">'.$r->nama_kebun.'</option>';
                       }
                       endforeach;
                    ?>
                </select>
          </div>
        </div>
        <br>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="icon-checkmark-circle2"></i> Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php endforeach; ?>

<!-- hapus data  -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_delete<?=$row->kd_pengamatan;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Log/delete/'.$row->kd_pengamatan); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><strong>Hapus Data</strong></h6>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class='col-md-12'><center>Apa anda Yakin menghapus ?</center></div>
            </div>
          </div>
        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger"><i class="icon-x"></i> Hapus</button>
          </center>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
