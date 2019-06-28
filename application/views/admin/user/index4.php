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
    <h5 class="panel-title"><i class="glyphicon glyphicon-bishop"></i> Mandor <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_theme_primary"><i class="icon-file-plus"></i> Tambah </button></h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
          	  <th>No</th>
              <th>Nama</th>
              <th>Foto</th>
              <th class="never"></th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($all as $row): $no++; ?>
            <tr >
                <td class="never"></td>
                <td><?php echo $row->nama_mandor; ?></td>
                <td><a href="<?php echo base_url('uploads/'.getfotomandor($row->kd_mandor)); ?>"><img src="<?php echo base_url('uploads/'.getfotomandor($row->kd_mandor)); ?>" alt="" height="28px"></a></td>
                <td><?php echo $row->kd_mandor; ?></td>
                <td>
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_mandor;?>" class="btn btn-success " data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <button type="button"  data-toggle="modal" data-target="#modal_edit<?=$row->kd_mandor;?>" class="btn btn-primary " data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button>
                    <button type="button"  data-toggle="modal" data-target="#modal_delete<?=$row->kd_mandor;?>"  class="btn btn-danger" data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button>
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
    <form action="<?php echo site_url('User4/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah User</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getkd4('kd_mandor','kd_mandor'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div class="form-group">
          <label class='col-md-3'>Nama</label>
          <div class='col-md-9'><input type="text" name="nama" autocomplete="off" required placeholder="Masukkan Nama" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Username</label>
          <div class='col-md-9'><input type="text" name="username" autocomplete="off" required placeholder="Masukkan Username" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Password</label>
          <div class='col-md-9'><input type="password" name="password" autocomplete="off" required placeholder="Masukkan Password" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Email</label>
          <div class='col-md-9'><input type="text" name="email" autocomplete="off" required placeholder="Masukkan Email" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Telepon</label>
          <div class='col-md-9'><input type="text" name="telepon" autocomplete="off" required placeholder="Masukkan Telepon" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Foto</label>
          <div class='col-md-9'><input type="file" name="foto"></div>
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
<!-- tampil detail -->
<?php $no=0; foreach($all as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_mandor;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User4/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Tampil Detail</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_mandor;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->nama_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Username</label>
              <div class='col-md-9'><input type="text" name="username" readonly autocomplete="off" value="<?=$row->user_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Password</label>
              <div class='col-md-9'><input type="password" name="password" readonly autocomplete="off" value="<?=$row->pass_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Email</label>
              <div class='col-md-9'><input type="text" name="email" readonly autocomplete="off" value="<?=$row->email_mandor;?>" required placeholder="Masukkan Email" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Telepon</label>
              <div class='col-md-9'><input type="text" name="telepon" readonly autocomplete="off" value="<?=$row->telp_mandor;?>" required placeholder="Masukkan Telepon" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotomandor($row->kd_mandor)); ?>" alt="" height="28px">
                
              </div>
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
  <div id="modal_edit<?=$row->kd_mandor;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User4/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_mandor;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Username</label>
              <div class='col-md-9'><input type="text" name="username"  autocomplete="off" value="<?=$row->user_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Password</label>
              <div class='col-md-9'><input type="password" name="password"  autocomplete="off" value="<?=$row->pass_mandor;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Email</label>
              <div class='col-md-9'><input type="text" name="email"  autocomplete="off" value="<?=$row->email_mandor;?>" required placeholder="Masukkan Email" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Telepon</label>
              <div class='col-md-9'><input type="text" name="telepon"  autocomplete="off" value="<?=$row->telp_mandor;?>" required placeholder="Masukkan Telepon" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotomandor($row->kd_mandor)); ?>" alt="" height="28px">
                <input type="file" name="foto" value="<?=$row->foto_mandor;?>">
              </div>
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
  <div id="modal_delete<?=$row->kd_mandor;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User4/delete/'.$row->kd_mandor); ?>" method="post">
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