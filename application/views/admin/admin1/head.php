<div class="navbar navbar-default navbar-fixed-top header-highlight">
  <div class="navbar-collapse collapse" id="navbar-mobile">
    <ul class="nav navbar-nav">
      
      <li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a>
      </li>
      <h4><img src="<?php echo base_url('assets/images/GIS1.png'); ?>" height="52px"></h4>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown dropdown-user">
        <a class="dropdown-toggle" data-toggle="dropdown">
        <h5>
         <img src="<?php echo base_url('uploads/'.getfoto($this->session->userdata('kd_admin'))); ?>" alt="">
          <span><?php echo getnama($this->session->userdata('kd_admin')); ?></span> | <?php if($this->session->userdata('level')==1){echo "Admin Tanam";}else{echo "Admin BTS";} ?>      
          <i class="caret"></i>
        </h5>
        </a>

        <ul class="dropdown-menu dropdown-menu-right">
          <?php $no=0; foreach($admin as $row): $no++; ?>
          <li><a data-toggle="modal" data-target="#edit<?=$row->kd_admin;?>" ><i class="glyphicon glyphicon-user"></i> Ubah Data</a></li>
          <li><a data-toggle="modal" data-target="#update<?=$row->kd_admin;?>"><i class="icon-cog5"></i> Ubah Username Dan Password</a></li>
          <li><a data-toggle="modal" data-target="#foto<?=$row->kd_admin;?>"><i class="glyphicon glyphicon-camera"></i> Ubah Foto</a></li>
          <li><a data-toggle="modal" data-target="#modal_theme_logout" data-popup="tooltip" data-placement="top"><i class="icon-switch2"></i> Keluar</a></li>
           <?php endforeach; ?>
        </ul>
      </li>
    </ul>
  </div>
</div>

<!-- Edit data -->
<?php $no=0; foreach($admin as $row): $no++; ?>
<div class="row">
  <div id="edit<?=$row->kd_admin;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Top/data'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group sr-only">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_admin;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama</label>
              <div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Email</label>
              <div class='col-md-9'><input type="text" name="email" autocomplete="off" value="<?=$row->email;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Telepon</label>
              <div class='col-md-9'><input type="text" name="telepon" autocomplete="off" value="<?=$row->no_telp;?>" class="form-control" ></div>
            </div>
            <br><br>
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

<!-- ubah username dan password -->
<?php $no=0; foreach($admin as $row): $no++; ?>
<div class="row">
  <div id="update<?=$row->kd_admin;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Top/update'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Username dan Password</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group sr-only">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_admin;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Username</label>
              <div class='col-md-9'><input type="text" name="username" autocomplete="off" value="<?=$row->username;?>" class="form-control" ></div>
            </div>
            <br>
            
            <div class="form-group">
              <label class='col-md-3'>Password Lama</label>
              <div class='col-md-9'><input type="password" name="passlama" autocomplete="off" class="form-control" placeholder="Password Lama"></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Password baru</label>
              <div class='col-md-9'><input type="password" name="passbaru" autocomplete="off" class="form-control" placeholder="Password Baru"></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Konfirmasi Password baru</label>
              <div class='col-md-9'><input type="password" name="konpassbaru" autocomplete="off" class="form-control" placeholder="Konfirmasi Password Baru"></div>
            </div>
            <br>
           
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

<!-- ubah foto -->
<?php $no=0; foreach($admin as $row): $no++; ?>
<div class="row">
  <div id="foto<?=$row->kd_admin;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Top/foto'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Username dan Password</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group sr-only">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_admin;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfoto($row->kd_admin)); ?>" alt="" height="70px">
                <input type="file" name="foto" value="<?=$row->foto;?>">
              </div>
            </div>
            <br><br>
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

<!-- Log Out -->
<div class="row">
  <div id="modal_theme_logout" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Top/logout'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h6 class="modal-title"><strong>Keluar</strong></h6>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class='col-md-12'><center>Apakah Anda Yakin Ingin Keluar ?</center></div>
            </div>
          </div>
        <div class="modal-footer">
          <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger"><i class="icon-switch2"></i> Keluar</button>
          </center>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>