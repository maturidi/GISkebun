<div class="sidebar sidebar-main">
  <div class="sidebar-content">
    <div class="sidebar-user">
    </div>
    <div class="sidebar-category sidebar-category-visible">
      <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">
          <li class="<?php echo menuaktif('dashboard',$aktif); ?>"><a href="<?php echo base_url(); ?>"><i class="icon-home4"></i> <span>Beranda</span></a></li>
            
           <li>
            <a href="#"><i class="icon-user"></i> <span>Management User</span></a>
            <ul>
              <li class="<?php echo menuaktif('user',$aktif); ?>"><a href="<?php echo site_url('User'); ?>"><i class="glyphicon glyphicon-king"></i>Manager</a></li>
              <li class="<?php echo menuaktif('user1',$aktif); ?>"><a href="<?php echo site_url('User1'); ?>"><i class="glyphicon glyphicon-queen"></i>SKK</a></li>
              <li class="<?php echo menuaktif('user2',$aktif); ?>"><a href="<?php echo site_url('User2'); ?>"><i class="glyphicon glyphicon-tower"></i>SKW</a></li>
              <li class="<?php echo menuaktif('user3',$aktif); ?>"><a href="<?php echo site_url('User3'); ?>"><i class="glyphicon glyphicon-knight"></i>PLPG</a></li>
              <li class="<?php echo menuaktif('user4',$aktif); ?>"><a href="<?php echo site_url('User4'); ?>"><i class="glyphicon glyphicon-bishop"></i>Mandor</a></li>
            </ul>
          </li>

          <li>
            <a href="#"><i class="glyphicon glyphicon-map-marker"></i> <span>Kebun</span></a>
            <ul>
              <li class="<?php echo menuaktif('track',$aktif); ?>"><a href="<?php echo site_url('Track'); ?>"><i class="icon-road"></i> <span>Peta Kebun</span></a></li>
              <li class="<?php echo menuaktif('activity',$aktif); ?>"><a href="<?php echo site_url('Activity'); ?>"><i class="glyphicon glyphicon-flag"></i>Data Kebun</a></li>
            </ul>
          </li>
          <!-- <li>
            <a href="#"><i class="glyphicon glyphicon-book"></i> <span>Data Master</span></a>
            <ul>
              <li class="<?php echo menuaktif('kategori',$aktif); ?>"><a href="<?php echo site_url('Kategori'); ?>"><i class="glyphicon glyphicon-list"></i>Kategori</a></li>
              <li class="<?php echo menuaktif('kabupaten',$aktif); ?>"><a href="<?php echo site_url('Kabupaten'); ?>"><i class="glyphicon glyphicon-align-left"></i>Kabupaten</a></li>
              <li class="<?php echo menuaktif('kecamatan',$aktif); ?>"><a href="<?php echo site_url('Kecamatan'); ?>"><i class="glyphicon glyphicon-align-right"></i>Kecamatan</a></li>
              <li class="<?php echo menuaktif('rayon',$aktif); ?>"><a href="<?php echo site_url('Rayon'); ?>"><i class="glyphicon glyphicon-align-center"></i>Rayon</a></li>
              <li class="<?php echo menuaktif('afdeling',$aktif); ?>"><a href="<?php echo site_url('Afdeling'); ?>"><i class="glyphicon glyphicon-align-justify"></i>Afdeling</a></li>
            </ul>
          </li>
          
          <li>
            <a href="#"><i class="glyphicon glyphicon-dashboard"></i> <span>Aktivitas</span></a>
            <ul>
              <li class="<?php echo menuaktif('log',$aktif); ?>"><a href="<?php echo site_url('log'); ?>"><i class="icon-book"></i>Pengamatan</a></li>
            </ul>
          </li> -->
         
        </ul>  
      </div>
    </div>
  </div>
</div>