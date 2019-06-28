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
    <h5 class="panel-title"><i class="glyphicon glyphicon-tower"></i> SKW </h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
          	  <th>No</th>
              <th>Nama</th>
              <th>Afdeling</th>
              <th class="never"></th>
              <th>Foto</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($v as $row): $no++; ?>
            <tr >
                <td class="never"></td>  
                <td><?php echo $row->nama_skw; ?></td>
                <td><?php echo $row->afdeling; ?></td>
                <td><?php echo $row->kd_skw; ?></td>
                <td><a href="<?php echo base_url('uploads/'.getfotoskw($row->kd_skw)); ?>"><img src="<?php echo base_url('uploads/'.getfotoskw($row->kd_skw)); ?>" alt="" height="28px"></a></td>
                <td>
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_skw;?>" class="btn btn-success " data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <!-- <button type="button" data-toggle="modal" data-target="#modal_edit<?=$row->kd_skw;?>" class="btn btn-primary " data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button>
                    <button type="button" data-toggle="modal" data-target="#modal_delete<?=$row->kd_skw;?>"  class="btn btn-danger" data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button> -->
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
    <form action="<?php echo site_url('User2/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah User</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getkd2('kd_skw','kd_skw'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div class="form-group">
          <label class='col-md-3'>Kode SKK</label>
          <div class='col-md-9'>
          <select class="select-clear" name="skk" required data-placeholder="Pilih SKK">
                <?php
                       foreach($skk as $r):;
                       echo '<option value="'.$r->kd_skk.'">'.$r->nama_skk.'</option>';
                       endforeach;
                ?>
                </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Afdeling</label>
          <div class='col-md-9'>
          <select class="select-clear" name="afdeling" required data-placeholder="Pilih SKK">
                <?php
                       foreach($afd as $r):;
                       echo '<option value="'.$r->kd_afdeling.'">'.$r->afdeling.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
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
<!-- tampil password -->
<?php $no=0; foreach($v as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_skw;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User2/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Tampil Detail</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_skw;?> " class="form-control" ></div>
            </div>
            <br>
             <div class="form-group">
              <label class='col-md-3'>Kode SKK</label>
             <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->nama_skk;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Afdeling</label>
              <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->afdeling;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->nama_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Username</label>
              <div class='col-md-9'><input type="text" name="username" readonly autocomplete="off" value="<?=$row->user_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Password</label>
              <div class='col-md-9'><input type="password" name="password" readonly autocomplete="off" value="<?=$row->pass_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Email</label>
              <div class='col-md-9'><input type="text" name="email" readonly autocomplete="off" value="<?=$row->email_skw;?>" required placeholder="Masukkan Email" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Telepon</label>
              <div class='col-md-9'><input type="text" name="telepon" readonly autocomplete="off" value="<?=$row->telp_skw;?>" required placeholder="Masukkan Telepon" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotoskw($row->kd_skw)); ?>" alt="" height="28px">
                
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
  <div id="modal_edit<?=$row->kd_skw;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User2/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_skw;?> " class="form-control" ></div>
            </div>
            <br>
             <div class="form-group">
              <label class='col-md-3'>Kode SKK</label>
              <div class='col-md-9'>
                <select class="select-clear" name="skk" required data-placeholder="Pilih Rayon">                   
                   <?php
                       foreach($skk as $r):;
                        if ($row->kd_skk==$r->kd_skk) {
                         # code...
                        echo '<option value="'.$r->kd_skk.'" '."selected".'>'.$r->nama_skk.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_skk.'">'.$r->nama_skk.'</option>';
                       }
                       endforeach;
                    ?>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Afdeling</label>
              <div class='col-md-9'>
                <select class="select-clear" name="afdeling" required data-placeholder="Pilih Rayon">                   
                     <?php
                       foreach($afd as $r):
                        if ($row->kd_afdeling==$r->kd_afdeling) {
                         # code...
                        echo '<option value="'.$r->kd_afdeling.'" '."selected".'>'.$r->afdeling.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_afdeling.'">'.$r->afdeling.'</option>';
                       }
                       endforeach;
                    ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Username</label>
              <div class='col-md-9'><input type="text" name="username" autocomplete="off" value="<?=$row->user_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Password</label>
              <div class='col-md-9'><input type="password" name="password" autocomplete="off" value="<?=$row->pass_skw;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Email</label>
              <div class='col-md-9'><input type="text" name="email"  autocomplete="off" value="<?=$row->email_skw;?>" required placeholder="Masukkan Email" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Telepon</label>
              <div class='col-md-9'><input type="text" name="telepon"  autocomplete="off" value="<?=$row->telp_skw;?>" required placeholder="Masukkan Telepon" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotoskw($row->kd_skw)); ?>" alt="" height="28px">
                <input type="file" name="foto" value="<?=$row->foto_skw;?>">
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
  <div id="modal_delete<?=$row->kd_skw;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('User2/delete/'.$row->kd_skw); ?>" method="post">
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