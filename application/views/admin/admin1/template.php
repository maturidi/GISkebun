<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GIS Kebun | PG Rejo Agung Baru</title>
  
  <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/css.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/core.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/images/icon.ico'); ?>" rel="shortcut icon">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/bootstrap.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/blockui.min.js'); ?>"></script>
  <!-- /core JS files -->

  <!-- Theme JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/tables/datatables/datatables.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/app.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pages/datatables_advanced.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/interactions.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/forms/selects/select2.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pages/form_select2.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pages/components_modals.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pages/picker_date.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/datepicker.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/core/libraries/jquery_ui/effects.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/ui/moment/moment.min.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/pickers/daterangepicker.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/pickers/pickadate/picker.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/pickers/pickadate/picker.date.js');?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/pages/components_popups.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/geoxml3.js'); ?>"></script>
<style>
   .img4{
     width:50px;
     height:60px;
    transition: all 0.5s;
    -o-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -webkit-transition: all 0.5s;
    }
    .img4:hover {
      transition: all 2s;
      -o-transition: all 2s;
      -moz-transition: all 2s;
      -webkit-transition: all 2s;
      transform: scale(3);
      -moz-transform: scale(3);
      -o-transform: scale(3);
      -webkit-transform: scale(3);
      box-shadow: 2px 2px 6px rgba(0,0,0,2);
    }
</style>
</head>

<body class="navbar-top">
  <?php include 'head.php'; ?>
  <div class="page-container">
    <div class="page-content">
      <?php include $menu; ?>
      <div class="content-wrapper">
        <div class="page-header">
          <div class="breadcrumb-line">
            <?php echo $this->breadcrumb->output();  ?>
            <div class="calender" >
              <script type="text/javascript">        
                  function tampilkanwaktu(){        
                  var waktu = new Date();            
                  var sh = waktu.getHours() + "";    
                  var sm = waktu.getMinutes() + "";      
                  var ss = waktu.getSeconds() + "";  
                  document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss) + " - ";
                  }
              </script>
              
              <i class="glyphicon glyphicon-calendar"></i>
              <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
              <span id="clock"></span> 

                <?php
                $hari = date('l');

                if ($hari=="Sunday") {
                 echo "Minggu";
                }elseif ($hari=="Monday") {
                 echo "Senin";
                }elseif ($hari=="Tuesday") {
                 echo "Selasa";
                }elseif ($hari=="Wednesday") {
                 echo "Rabu";
                }elseif ($hari=="Thursday") {
                 echo("Kamis");
                }elseif ($hari=="Friday") {
                 echo "Jum'at";
                }elseif ($hari=="Saturday") {
                 echo "Sabtu";
                }
                ?>,

                <?php
                $tgl =date('d');
                echo $tgl;
                $bulan =date('F');
                if ($bulan=="January") {
                 echo " Januari ";
                }elseif ($bulan=="February") {
                 echo " Februari ";
                }elseif ($bulan=="March") {
                 echo " Maret ";
                }elseif ($bulan=="April") {
                 echo " April ";
                }elseif ($bulan=="May") {
                 echo " Mei ";
                }elseif ($bulan=="June") {
                 echo " Juni ";
                }elseif ($bulan=="July") {
                 echo " Juli ";
                }elseif ($bulan=="August") {
                 echo " Agustus ";
                }elseif ($bulan=="September") {
                 echo " September ";
                }elseif ($bulan=="October") {
                 echo " Oktober ";
                }elseif ($bulan=="November") {
                 echo " November ";
                }elseif ($bulan=="December") {
                 echo " Desember ";
                }
                $tahun=date('Y');
                echo $tahun;
                ?>

            </div>
          </div>
        </div>
        <br>
        <div class="content">
          <?php include $content; ?>
        </div>
          

      </div>
    </div>
  </div>
</body>
</html>