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
    <h5 class="panel-title"><i class="glyphicon glyphicon-flag"></i> Data Kebun </h5>
  </div>
  <div class="panel-body">
   <table class="table table-hover datatable-columns" style="font-size:15px;">
      <thead>
          <tr>
          	  <th>Register</th>
          	  <th>Nama Kebun</th>
              <th>Luas</th>
              <th class="never"></th>
              <th>Kategori</th>
              <th>Rayon</th>
              <th>Afdeling</th>
              <th><center>Opsi</center></th>
          </tr>
      </thead>
      <tbody>
          <?php $no=0; foreach($v as $row): $no++; ?>
            <tr >
            	  <td class="never"></td>
                <td><?php echo $row->nama_kebun; ?></td>
                <td><?php echo $row->luas; ?></td>
                <td><?php echo $row->register; ?></td>
                <td><?php echo $row->kategori; ?></td>
                <td><?php echo $row->rayon; ?></td>
                <td><?php echo $row->afdeling; ?></td>
                <td>	
                  <center>
                    <button type="button" data-toggle="modal" data-target="#modal_tampil<?=$row->kd_kebun;?>" class="btn btn-success " data-popup="tooltip" data-original-title="Detail" data-placement="top">Detail</button>
                    <!-- <button type="button"  data-toggle="modal" data-target="#modal_edit<?=$row->kd_kebun;?>" class="btn btn-primary" data-popup="tooltip" data-original-title="Edit" data-placement="top">Edit</button >
                    <button type="button"  data-toggle="modal" data-target="#modal_delete<?=$row->kd_kebun;?>"  class="btn btn-danger" data-popup="tooltip" data-original-title="Hapus" data-placement="top">Hapus</button > -->
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
    <form action="<?php echo site_url('Activity/add'); ?>" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h6 class="modal-title"><strong>Tambah User</strong></h6>
      </div>
      <div class="modal-body">
        <!-- <div class="form-group">
          <label class='col-md-3'>ID</label>
          <div class='col-md-9'><input type="text" name="id" value="<?php echo getkdkebun('kd_kebun','kd_kebun'); ?>" autocomplete="off" required placeholder="Masukkan ID" readonly class="form-control" ></div>
        </div>
        <br> -->
        <div class="form-group">
          <label class='col-md-3'>Kode Kategori</label>
          <div class='col-md-9'>
          <select class="select-clear" name="kategori" required data-placeholder="Pilih Kategori">
                <?php
                       foreach($ktgr as $r):;
                       echo '<option value="'.$r->kd_kategori.'">'.$r->kategori.'</option>';
                       endforeach;
                ?>
                </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Kecamatan</label>
          <div class='col-md-9'>
          <select class="select-clear" name="kecamatan" required data-placeholder="Pilih Kecamatan">
                <?php
                       foreach($kc as $r):;
                       echo '<option value="'.$r->kd_kecamatan.'">'.$r->nama_kecamatan.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Mandor</label>
          <div class='col-md-9'>
          <select class="select-clear" name="mandor" required data-placeholder="Pilih Mandor">
                <?php
                       foreach($md as $r):;
                       echo '<option value="'.$r->kd_mandor.'">'.$r->nama_mandor.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Plpg</label>
          <div class='col-md-9'>
          <select class="select-clear" name="plpg" required data-placeholder="Pilih Plpg">
                <?php
                       foreach($pl as $r):;
                       echo '<option value="'.$r->kd_plpg.'">'.$r->nama_plpg.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Manager</label>
          <div class='col-md-9'>
          <select class="select-clear" name="manager" required data-placeholder="Pilih Manager">
                <?php
                       foreach($mng as $r):;
                       echo '<option value="'.$r->kd_manager.'">'.$r->nama_manager.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Kode Afdeling</label>
          <div class='col-md-9'>
          <select class="select-clear" name="afdeling" required data-placeholder="Pilih Afdeling">
                <?php
                       foreach($afd as $r):;
                       echo '<option value="'.$r->kd_afdeling.'">'.$r->afdeling.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br><div class="form-group">
          <label class='col-md-3'>Kode Rayon</label>
          <div class='col-md-9'>
          <select class="select-clear" name="rayon" required data-placeholder="Pilih Rayon">
                <?php
                       foreach($ryn as $r):;
                       echo '<option value="'.$r->kd_rayon.'">'.$r->rayon.'</option>';
                       endforeach;
                ?>
          </select>
          </div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Nama Kebun</label>
          <div class='col-md-9'><input type="text" name="nama" autocomplete="off" required placeholder="Masukkan Nama" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Register</label>
          <div class='col-md-9'><input type="text" name="register" autocomplete="off" required placeholder="Masukkan Register" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Luas</label>
          <div class='col-md-9'><input type="text" name="luas" autocomplete="off" required placeholder="Masukkan Luas" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>MT</label>
          <div class='col-md-9'><input type="text" name="mt" autocomplete="off" required placeholder="Masukkan MT" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Varietas</label>
          <div class='col-md-9'><input type="text" name="varietas" autocomplete="off" required placeholder="Masukkan Varietas" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>IPL</label>
          <div class='col-md-9'><input type="text" name="ipl" autocomplete="off" required placeholder="Masukkan IPL" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>B Dalam</label>
          <div class='col-md-9'><input type="text" name="bdalam" autocomplete="off" required placeholder="Masukkan B Dalam" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>B Luar</label>
          <div class='col-md-9'><input type="text" name="bluar" autocomplete="off" required placeholder="Masukkan B Luar" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>B 15F Rp</label>
          <div class='col-md-9'><input type="text" name="b15" autocomplete="off" required placeholder="Masukkan B 15F Rp" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Rak Rp</label>
          <div class='col-md-9'><input type="text" name="rakrp" autocomplete="off" required placeholder="Masukkan Rak Rp" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Rak Ku Ha</label>
          <div class='col-md-9'><input type="text" name="rakkuha" autocomplete="off" required placeholder="Masukkan Rak Ku Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Rak Ku</label>
          <div class='col-md-9'><input type="text" name="rakku" autocomplete="off" required placeholder="Masukkan Rak Ku" class="form-control" ></div>
        </div>
        <br>	
        <div class="form-group">
          <label class='col-md-3'>Tdes Ku Ha</label>
          <div class='col-md-9'><input type="text" name="tdeskuha" autocomplete="off" required placeholder="Masukkan Tdes Ku Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tdes Ku</label>
          <div class='col-md-9'><input type="text" name="tdesku" autocomplete="off" required placeholder="Masukkan Tdes Ku" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>P Tdes Rak</label>
          <div class='col-md-9'><input type="text" name="ptdesrak" autocomplete="off" required placeholder="Masukkan P Tdes Rak" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>P Bi Rak</label>
          <div class='col-md-9'><input type="text" name="pbirak" autocomplete="off" required placeholder="Masukkan P Bi Rak" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tmar Ku Ha</label>
          <div class='col-md-9'><input type="text" name="tmarkuha" autocomplete="off" required placeholder="Masukkan Tmar Ku Ha" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Tmar Ku</label>
          <div class='col-md-9'><input type="text" name="tmarku" autocomplete="off" required placeholder="Masukkan Tmar Ku" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Latitude</label>
          <div class='col-md-9'><input type="text" name="latitude" autocomplete="off" required placeholder="Masukkan Latitude" class="form-control" ></div>
        </div>
        <br>
        <div class="form-group">
          <label class='col-md-3'>Longitude</label>
          <div class='col-md-9'><input type="text" name="longitude" autocomplete="off" required placeholder="Masukkan Longitude" class="form-control" ></div>
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
<?php $no=0; foreach($v as $row): $no++; ?>
<div class="row">
  <div id="modal_tampil<?=$row->kd_kebun;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Activity/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Tampil Detail</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kebun;?> " class="form-control" ></div>
            </div>
            <br>
             <div class="form-group">
              <label class='col-md-3'>Kode Kategori</label>
              <div class='col-md-9'><input type="text" name="kategori" readonly value="<?=$row->kategori;?> " class="form-control" ></div>
            </div>
            <br>

            <div class="form-group">
              <label class='col-md-3'>Kode Kecamatan</label>
              <div class='col-md-9'><input type="text" name="kecamatan" readonly value="<?=$row->nama_kecamatan;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Mandor</label>
              <div class='col-md-9'><input type="text" name="mandor" readonly value="<?=$row->nama_mandor;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Plpg</label>
              <div class='col-md-9'><input type="text" name="plpg" readonly value="<?=$row->nama_plpg;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Manager</label>
              <div class='col-md-9'><input type="text" name="manager" readonly value="<?=$row->nama_manager;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Afdeling</label>
              <div class='col-md-9'><input type="text" name="Afdeling" readonly value="<?=$row->afdeling;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Rayon</label>
              <div class='col-md-9'><input type="text" name="rayon" readonly value="<?=$row->rayon;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Nama Kebun</label>
              <div class='col-md-9'><input type="text" name="nama" readonly autocomplete="off" value="<?=$row->nama_kebun;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Register</label>
              <div class='col-md-9'><input type="text" name="register" readonly autocomplete="off" value="<?=$row->register;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Luas</label>
              <div class='col-md-9'><input type="text" name="luas" readonly autocomplete="off" value="<?=$row->luas;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>MT</label>
              <div class='col-md-9'><input type="text" name="mt" readonly autocomplete="off" value="<?=$row->mt;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Varietas</label>
              <div class='col-md-9'><input type="text" name="varietas" readonly autocomplete="off" value="<?=$row->varietas;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>IPL</label>
              <div class='col-md-9'><input type="text" name="ipl" readonly autocomplete="off" value="<?=$row->ipl;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>B Dalam</label>
              <div class='col-md-9'><input type="text" name="bdalam" readonly autocomplete="off" value="<?=$row->b_dalam;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>B Luar</label>
              <div class='col-md-9'><input type="text" name="dluar" readonly autocomplete="off" value="<?=$row->b_luar;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>B 15F Rp</label>
              <div class='col-md-9'><input type="text" name="b15" readonly autocomplete="off" value="<?=$row->b_15F_Rp;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Rak Rp</label>
              <div class='col-md-9'><input type="text" name="rakrp" readonly autocomplete="off" value="<?=$row->rak_rp;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Rak Ku Ha</label>
              <div class='col-md-9'><input type="text" name="rakkuha" readonly autocomplete="off" value="<?=$row->rak_ku_ha;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Rak Ku</label>
              <div class='col-md-9'><input type="text" name="rakku" readonly autocomplete="off" value="<?=$row->rak_ku;?>" class="form-control" ></div>
            </div>
            <br>  
            <div class="form-group">
              <label class='col-md-3'>Tdes Ku Ha</label>
              <div class='col-md-9'><input type="text" name="tdeskuha" readonly autocomplete="off" value="<?=$row->tdes_ku_ha;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Tdes Ku</label>
              <div class='col-md-9'><input type="text" name="tdesku" readonly autocomplete="off" value="<?=$row->tdes_ku;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>P Tdes Rak</label>
              <div class='col-md-9'><input type="text" name="ptdesrak" readonly autocomplete="off" value="<?=$row->p_tdes_rak;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>P Bi Rak</label>
              <div class='col-md-9'><input type="text" name="pbirak" readonly autocomplete="off" value="<?=$row->p_bi_rak;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Tmar Ku Ha</label>
              <div class='col-md-9'><input type="text" name="tmarkuha" readonly autocomplete="off" value="<?=$row->tmar_ku_ha;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Tmar Ku</label>
              <div class='col-md-9'><input type="text" name="tmarku" readonly autocomplete="off" value="<?=$row->tmar_ku;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Latitude</label>
              <div class='col-md-9'><input type="text" name="latitude" readonly autocomplete="off" value="<?=$row->latitude;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Longitude </label>
              <div class='col-md-9'><input type="text" name="longitude" readonly autocomplete="off" value="<?=$row->longitude;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotokebun($row->kd_kebun)); ?>" alt="" height="28px">
                
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
  <div id="modal_edit<?=$row->kd_kebun;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Activity/edit'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h6 class="modal-title"><strong>Edit Data</strong></h6>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label class='col-md-3'>ID</label>
              <div class='col-md-9'><input type="text" name="id" readonly value="<?=$row->kd_kebun;?> " class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Kategori</label>
              <div class='col-md-9'>
                <select class="select-clear" name="kategori" required data-placeholder="Pilih Kategori">                   
                   <?php
                       foreach($ktgr as $r):;
                        if ($row->kd_kategori==$r->kd_kategori) {
                         # code...
                        echo '<option value="'.$r->kd_kategori.'" '."selected".'>'.$r->kategori.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_kategori.'">'.$r->kategori.'</option>';
                       }
                       endforeach;
                    ?>
                </select> 
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Kecamatan</label>
              <div class='col-md-9'>
                <select class="select-clear" name="kecamatan" required data-placeholder="Pilih SKK">
                    <?php
                       foreach($kc as $r):;
                       if ($row->kd_kecamatan==$r->kd_kecamatan) {
                        # code...
                        echo '<option value="'.$r->kd_kecamatan.'" '."selected".'>'.$r->nama_kecamatan.'</option>';
                       } else {
                        echo '<option value="'.$r->kd_kecamatan.'">'.$r->nama_kecamatan.'</option>';
                       }
                       endforeach;
                    ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Mandor</label>
              <div class='col-md-9'>
                <select class="select-clear" name="mandor" required data-placeholder="Pilih Mandor">
                    <?php
                           foreach($md as $r):;
                           if ($row->kd_mandor==$r->kd_mandor) {
                            # code...
                            echo '<option value="'.$r->kd_mandor.'" '."selected".'>'.$r->nama_mandor.'</option>';
                           } else {
                           echo '<option value="'.$r->kd_mandor.'">'.$r->nama_mandor.'</option>';
                       		}
                           endforeach;
                    ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Plpg</label>
              <div class='col-md-9'>
                <select class="select-clear" name="plpg" required data-placeholder="Pilih SKK">
                    <?php
                           foreach($pl as $r):;
                          	if ($row->kd_plpg==$r->kd_plpg) {
                            # code...
                            echo '<option value="'.$r->kd_plpg.'" '."selected".'>'.$r->nama_plpg.'</option>';
                           } else {
                           echo '<option value="'.$r->kd_plpg.'">'.$r->nama_plpg.'</option>';
                       		}
                           endforeach;
                    ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Kode Manager</label>
              <div class='col-md-9'>
                <select class="select-clear" name="manager" required data-placeholder="Pilih SKK">
                    <?php
                           foreach($mng as $r):;
                           if ($row->kd_manager==$r->kd_manager) {
                            # code...
                            echo '<option value="'.$r->kd_manager.'" '."selected".'>'.$r->nama_manager.'</option>';
                           } else {
                           echo '<option value="'.$r->kd_manager.'">'.$r->nama_manager.'</option>';
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
                <select class="select-clear" name="afdeling" required data-placeholder="Pilih Afdeling">
                    <?php
                           foreach($afd as $r):;
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
              <label class='col-md-3'>Kode Rayon</label>
              <div class='col-md-9'>
                <select class="select-clear" name="rayon" required data-placeholder="Pilih Rayon">
                    <?php
                           foreach($ryn as $r):;
                           if ($row->kd_rayon==$r->kd_rayon) {
                            # code...
                            echo '<option value="'.$r->kd_rayon.'" '."selected".'>'.$r->rayon.'</option>';
                           } else {
                           echo '<option value="'.$r->kd_rayon.'">'.$r->rayon.'</option>';
                          }
                           endforeach;
                    ?>
                </select>
              </div>
            </div>
            <br>
            <div class="form-group">
                	<label class='col-md-3'>Nama Kebun</label>
                	<div class='col-md-9'><input type="text" name="nama" autocomplete="off" value="<?=$row->nama_kebun;?>" class="form-control" ></div>
              </div>
              <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Register</label>
  	          <div class='col-md-9'><input type="text" name="register" autocomplete="off" value="<?=$row->register;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Luas</label>
  	          <div class='col-md-9'><input type="text" name="luas" autocomplete="off" value="<?=$row->luas;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>MT</label>
  	          <div class='col-md-9'><input type="text" name="mt" autocomplete="off" value="<?=$row->mt;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Varietas</label>
  	          <div class='col-md-9'><input type="text" name="varietas" autocomplete="off" value="<?=$row->varietas;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>IPL</label>
  	          <div class='col-md-9'><input type="text" name="ipl" autocomplete="off" value="<?=$row->ipl;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>B Dalam</label>
  	          <div class='col-md-9'><input type="text" name="bdalam" autocomplete="off" value="<?=$row->b_dalam;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>B Luar</label>
  	          <div class='col-md-9'><input type="text" name="bluar" autocomplete="off" value="<?=$row->b_luar;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>B 15F Rp</label>
  	          <div class='col-md-9'><input type="text" name="b15" autocomplete="off" value="<?=$row->b_15F_Rp;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Rak Rp</label>
  	          <div class='col-md-9'><input type="text" name="rakrp" autocomplete="off" value="<?=$row->rak_rp;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Rak Ku Ha</label>
  	          <div class='col-md-9'><input type="text" name="rakkuha" autocomplete="off" value="<?=$row->rak_ku_ha;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Rak Ku</label>
  	          <div class='col-md-9'><input type="text" name="rakku" autocomplete="off" value="<?=$row->rak_ku;?>" class="form-control" ></div>
  	        </div>
  	        <br>	
  	        <div class="form-group">
  	          <label class='col-md-3'>Tdes Ku Ha</label>
  	          <div class='col-md-9'><input type="text" name="tdeskuha" autocomplete="off" value="<?=$row->tdes_ku_ha;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Tdes Ku</label>
  	          <div class='col-md-9'><input type="text" name="tdesku" autocomplete="off" value="<?=$row->tdes_ku;?>" class="form-control" ></div>
  	        </div>
  	        <br>
            <div class="form-group">
              <label class='col-md-3'>P Tdes Rak</label>
              <div class='col-md-9'><input type="text" name="ptdesrak" autocomplete="off" value="<?=$row->p_tdes_rak;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>P Bi Rak</label>
              <div class='col-md-9'><input type="text" name="pbirak" autocomplete="off" value="<?=$row->p_bi_rak;?>" class="form-control" ></div>
            </div>
            <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Tmar Ku Ha</label>
  	          <div class='col-md-9'><input type="text" name="tmarkuha" autocomplete="off" value="<?=$row->tmar_ku_ha;?>" class="form-control" ></div>
  	        </div>
  	        <br>
  	        <div class="form-group">
  	          <label class='col-md-3'>Tmar Ku</label>
  	          <div class='col-md-9'><input type="text" name="tmarku" autocomplete="off" value="<?=$row->tmar_ku;?>" class="form-control" ></div>
  	        </div>
  	        <br>
            <div class="form-group">
              <label class='col-md-3'>Latitude</label>
              <div class='col-md-9'><input type="text" name="latitude" autocomplete="off" value="<?=$row->latitude;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Longitude</label>
              <div class='col-md-9'><input type="text" name="longitude" autocomplete="off" value="<?=$row->longitude;?>" class="form-control" ></div>
            </div>
            <br>
            <div class="form-group">
              <label class='col-md-3'>Foto</label>
              <div class='col-md-9'>
                <img src="<?php echo base_url('uploads/'.getfotokebun($row->kd_kebun)); ?>" alt="" height="28px">
                <input type="file" name="foto" value="<?=$row->foto_kebun;?>">
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
  <div id="modal_delete<?=$row->kd_kebun;?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('Activity/delete/'.$row->kd_kebun); ?>" method="post">
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