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
    <h5 class="panel-title"><i class="icon-road"></i> Peta Kebun <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button></h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
              <th>No</th>
              <th>Masa Tanam</th>
              <th>Kml</th>
              <th class="never"></th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr>
                <td class="never"></td>
                <td><?php echo $row->ms_kml; ?></td>
                <td><a href="<?php echo site_url('Track/lihat/'.$row->kd_kml); ?>" type="button" class="btn btn-default " data-popup="tooltip" data-original-title="Tampilkan Peta" data-placement="top">Tampilkan Peta</button></td>
                <!-- target="_blank" untuk membuka new tab-->
                <td><?php echo $row->kd_kml; ?></td>
                <td>
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_kml;?>" class="btn btn-success " data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <!-- <button type="button" data-toggle="modal" data-target="#modal_edit<?=$row->kd_kml;?>" class="btn btn-primary " data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#modal_delete<?=$row->kd_kml;?>"  class="btn btn-danger" data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button> -->
                  </center>
               </td>
            </tr>
          <?php endforeach; ?>
      </tbody> 
  </table>
  </div>
</div>


<!-- Tambah User -->
<div id="modal_theme_primary" class="modal fade">
  <div class="modal-dialog">
    <form action="<?php echo site_url('Track/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah User</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getkd('kd_manager','kd_manager'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div class="form-group">
          <label class='col-md-3'>Masa Tanam</label>
          <div class='col-md-9'><input type="text" name="ms" autocomplete="off" required placeholder="Masukkan Masa Tanam" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kml</label>
          <div class='col-md-9'><input type="text" name="kml" autocomplete="off" required placeholder="Masukkan Kml" class="form-control" ></div>
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

<!-- tampil -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_kml;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Track/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Tampil Detail</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kml;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Masa Tanam</label>
              <div class='col-md-9'><input type="text" name="ms" readonly autocomplete="off" value="<?=$row->ms_kml;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kml</label>
              <div class='col-md-9'><input type="text" name="kml" readonly autocomplete="off" value="<?=$row->kml;?>" class="form-control" ></div>
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
  <div id="modal_edit<?=$row->kd_kml;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Track/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kml;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Masa Tanam</label>
              <div class='col-md-9'><input type="text" name="ms" autocomplete="off" value="<?=$row->ms_kml;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kml</label>
              <div class='col-md-9'><input type="text" name="kml" autocomplete="off" value="<?=$row->kml;?>" class="form-control" ></div>
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
  <div id="modal_delete<?=$row->kd_kml;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Track/delete/'.$row->kd_kml); ?>" method="post">
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