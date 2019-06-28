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
    <h5 class="panel-title"><i class="glyphicon glyphicon-align-right"></i> Kecamatan </h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
          	  <th>No</th>
              <th>Kecamatan </th>
              <th><center>Opsi</center></th>
              <th class="never"></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr >
                <td class="never"></td>
                <td><?php echo $row->nama_kecamatan; ?></td>
                <td>
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_kecamatan;?>" class="btn btn-success" data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <!-- <button type="button" data-toggle="modal" data-target="#modal_edit<?=$row->kd_kecamatan;?>" class="btn btn-primary " data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#modal_delete<?=$row->kd_kecamatan;?>"  class="btn btn-danger" data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button> -->
                  </center>
                </td>
                <td><?php echo $row->kd_kecamatan; ?></td>
            </tr>
          <?php endforeach; ?>
      </tbody> 
  </table>
  </div>
</div>
<!-- Tambah User -->
<div id="modal_theme_primary" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Kecamatan/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah User</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getkc('kd_kecamatan','kd_kecamatan'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div class="form-group">
          <label class='col-md-3'>Kabupaten</label>
          <div class='col-md-9'>
          <select class="select-clear" name="kb" required data-placeholder="Pilih SKK">
                <?php
                       foreach($kb as $r):;
                       echo '<option value="'.$r->kd_kabupaten.'">'.$r->nama_kabupaten.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kecamatan</label>
          <div class='col-md-9'><input type="text" name="nama" autocomplete="off" required placeholder="Masukkan Nama" class="form-control" ></div>
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
<!-- tampil Detail -->
<?php $no=0; foreach($v as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_kecamatan;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Kecamatan/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Tampil Detail</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kecamatan;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kabupaten</label>
              <div class='col-md-9'><input type="text" name="kabupaten" readonly value="<?=$row->nama_kabupaten;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->nama_kecamatan;?>" class="form-control" ></div>
            </div>
            <br>
          </div>
          
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- Edit User -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_edit<?=$row->kd_kecamatan;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Kecamatan/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kecamatan;?> " class="form-control" ></div>
            </div>
            <br>
             <div class="form-group">
              <label class='col-md-3'>Kabupaten</label>
              <div class='col-md-9'>
                <select class="select-clear" name="kb" required data-placeholder="Pilih Rayon">                   
                   <?php
                       foreach($kb as $r):;
                        if ($row->kd_kabupaten==$r->kd_kabupaten) {
                         # code...
                        echo '<option value="'.$r->kd_kabupaten.'" '."selected".'>'.$r->nama_kabupaten.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_kabupaten.'">'.$r->nama_kabupaten.'</option>';
                       }
                       endforeach;
                    ?>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama_kecamatan;?>" class="form-control" ></div>
            </div>
            <br>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary"><i class="icon-pencil5"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>
<!-- hapus data -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_delete<?=$row->kd_kecamatan;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Kecamatan/delete/'.$row->kd_kecamatan); ?>" method="post">
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