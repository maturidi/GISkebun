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
<html>
<head>

  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDjkcHGsO9q_Lp-7LZosbFUdtQzc9xhbGg&callback=initMap"></script>
    <script type="text/javascript">

      var peta;
      var infoWindow;

      function initMap() {
      var lokasibaru = new google.maps.LatLng(-7.9397071,112.6308378);
      var petaoption = {
      zoom: 13,
      center: lokasibaru,
      mapTypeId: google.maps.MapTypeId.ROADMAP
      };
        
      peta = new google.maps.Map(document.getElementById("map"),petaoption);

     ctaLayer = new google.maps.KmlLayer({
          
           url: '<?php $no=0; foreach($all as $row): $no++; echo $row->kml; endforeach; ?>',
          map: peta
        }); 

      infoWindow = new google.maps.InfoWindow;
        
        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Your Location.');
            infoWindow.open(peta);
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }

      
      // // ngasih fungsi marker buat generate koordinat latitude & longitude
      // tanda = new google.maps.Marker({
      //     position: lokasibaru,
      //     map: peta, 
      //     draggable : true
      // });
      
      // // ketika markernya didrag, koordinatnya langsung di selipin di textfield
      // google.maps.event.addListener(tanda, 'dragend', function(event){
      //   document.getElementById('latitude').value = this.getPosition().lat();
      //   document.getElementById('longitude').value = this.getPosition().lng();
      // });

      

      }

       function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(peta);
      }

    
    function setKabKota(lokasi){
      // mengambil koordinat dari database
      var koordinat = lokasi.split('|');
      var x = koordinat[0];
      var y = koordinat[1];
      var id = koordinat[2];
       console.log(lokasi);
      
      var lokasibaru = new google.maps.LatLng(x, y);
      var petaoption = {
        zoom: 13,
        center: lokasibaru,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      
      peta = new google.maps.Map(document.getElementById("map"),petaoption);

       ctaLayer = new google.maps.KmlLayer({
          
           url: '<?php $no=0; foreach($all as $row): $no++; echo $row->kml; endforeach; ?>',
          map: peta
        });


       // ngasih fungsi marker buat generate koordinat latitude & longitude
      tanda = new google.maps.Marker({
        position: lokasibaru,
        map: peta, 
        draggable : true
      });
      
      google.maps.event.addListener(tanda, 'dragend', function(event){
          document.getElementById('latitude').value = this.getPosition().lat();
          document.getElementById('longitude').value = this.getPosition().lng();
      });

     

    }


    </script>
      
</head>
<body onload="initMap()">

<div class="panel panel-primary">
  <div class="panel-heading">
   <?php $no=0; foreach($all as $row): $no++; ?>
   <h5 class="panel-title"><i class="icon-road"></i> Peta Kebun / <?php echo getmasa($kd_kml); ?> </h5>
   <?php endforeach; ?>
  </div>
   

    <div id="map" class="panel-body" style="width:100%;height:550px;">
    
    </div>

   <div class='col-md-3' style="float:right;margin-top:-596px;">
    <select class="select-clear" onchange="setKabKota(this.options[this.selectedIndex].value)">
        <?php
          foreach($v as $r):;
            echo '<option value="'.$r->latitude.'|'.$r->longitude.'|'.$r->kd_kebun.'">'.$r->nama_kebun.' '.$r->luas.'</option>';  
          endforeach;
        ?>
    </select>
    </div>

     

</div>

    <!-- detail -->
    <!-- <hr><h6 class="modal-title" align="center"><strong>Detail Kebun</strong></h6><hr>
      <div class="modal-body" style="height:100%;">
        <div class="form-group">
              <label class='col-md-3'>Regiter</label>
              <div class='col-md-8'><p id="a" class="form-control">Register</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Nama Kebun</label>
              <div class='col-md-8'><p id="b" class="form-control">Nama Kebun</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Luas</label>
              <div class='col-md-8'><p id="c" class="form-control">Luas</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Kategori</label>
              <div class='col-md-8'><p id="u" class="form-control">Kategori</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Masa Tanam</label>
              <div class='col-md-8'><p id="d" class="form-control">Masa Tanam</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Varietas</label>
              <div class='col-md-8'><p id="e" class="form-control">Varietas</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>IPL</label>
              <div class='col-md-8'><p id="f" class="form-control">IPL</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Rayon</label>
              <div class='col-md-8'><p id="aa" class="form-control">Rayon</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>SKK</label>
              <div class='col-md-8'><p id="ac" class="form-control">SKK</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Afdeling</label>
              <div class='col-md-8'><p id="z" class="form-control">Afdeling</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>SKW</label>
              <div class='col-md-8'><p id="ad" class="form-control">SKW</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Kabupaten</label>
              <div class='col-md-8'><p id="ab" class="form-control">Kabupaten</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Kecamatan</label>
              <div class='col-md-8'><p id="v" class="form-control">Kecamatan</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Mandor</label>
              <div class='col-md-8'><p id="w" class="form-control">Mandor</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Plpg</label>
              <div class='col-md-8'><p id="x" class="form-control">Plpg</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Manager</label>
              <div class='col-md-8'><p id="y" class="form-control">Manager</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Bon Dalam (Rp)</label>
              <div class='col-md-8'><p id="g" class="form-control">Bon Dalam (Rp)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Bon Luar (Rp)</label>
              <div class='col-md-8'><p id="h" class="form-control">Bon Luar (Rp)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Biaya per 15/Februari</label>
              <div class='col-md-8'><p id="i" class="form-control">Biaya per 15/Februari</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Rak (Rp)</label>
              <div class='col-md-8'><p id="j" class="form-control">Rak (Rp)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Rak (Ku/Ha)</label>
              <div class='col-md-8'><p id="k" class="form-control">Rak (Ku/Ha)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Rak (Ku)</label>
              <div class='col-md-8'><p id="l" class="form-control">Rak (Ku)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Taks Desember (Ku/Ha)</label>
              <div class='col-md-8'><p id="m" class="form-control">Taks Desember (Ku/Ha)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Taks Desember (Ku)</label>
              <div class='col-md-8'><p id="n" class="form-control">Taks Desember (Ku)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Persentase Taks.Des/Rak(%)</label>
              <div class='col-md-8'><p id="o" class="form-control">Persentase Taks.Des/Rak(%)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Persentase Biaya Real:Rak(%)</label>
              <div class='col-md-8'><p id="p" class="form-control">Persentase Biaya Real:Rak(%)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Taks maret (Ku/Ha)</label>
              <div class='col-md-8'><p id="q" class="form-control">Taks maret (Ku/Ha)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Taks Maret (Ku)</label>
              <div class='col-md-8'><p id="r" class="form-control">Taks Maret (Ku)</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Latitude</label>
              <div class='col-md-8'><p id="s" class="form-control">Latitude</p></div>
        </div>
        <br>
        <div class="form-group">
              <label class='col-md-3'>Longitude</label>
              <div class='col-md-8'><p id="t" class="form-control">Longitude</p></div>
        </div>
        <br>
        

      </div> -->

    <script>
    function getName(){
        var select = document.getElementById('mt');
        var a = document.getElementById('a');
        var b = document.getElementById('b');
        var c = document.getElementById('c');
        var d = document.getElementById('d');
        var e = document.getElementById('e');
        var f = document.getElementById('f');
        var g = document.getElementById('g');
        var h = document.getElementById('h');
        var i = document.getElementById('i');
        var j = document.getElementById('j');
        var k = document.getElementById('k');
        var l = document.getElementById('l');
        var m = document.getElementById('m');
        var n = document.getElementById('n');
        var o = document.getElementById('o');
        var p = document.getElementById('p');
        var q = document.getElementById('q');
        var r = document.getElementById('r');
        var s = document.getElementById('s');
        var t = document.getElementById('t');
        var u = document.getElementById('u');
        var v = document.getElementById('v');
        var w = document.getElementById('w');
        var x = document.getElementById('x');
        var y = document.getElementById('y');
        var z = document.getElementById('z');
        var aa = document.getElementById('aa');
        var ab = document.getElementById('ab');
        var ac = document.getElementById('ac');
        var ad = document.getElementById('ad');
        
        select.onchange = function() {
              var v= select.value;
              var koordinat = v.split('|');
              var x = koordinat[2];
             
             $.ajax({
                url : "<?php echo base_url(); ?>Track1/get_item",
                type : "POST",
                dataType : "json",
                data : {"name" : x},
                success : function(data) {
                    // do something
                    a.innerHTML = data.register;
                    b.innerHTML = data.nama_kebun;
                    c.innerHTML = data.luas;
                    d.innerHTML = data.mt;
                    e.innerHTML = data.varietas;
                    f.innerHTML = data.ipl;
                    g.innerHTML = data.b_dalam;
                    h.innerHTML = data.b_luar;
                    i.innerHTML = data.b_15F_Rp;
                    j.innerHTML = data.rak_rp;
                    k.innerHTML = data.rak_ku_ha;
                    l.innerHTML = data.rak_ku;
                    m.innerHTML = data.tdes_ku_ha;
                    n.innerHTML = data.tdes_ku;
                    o.innerHTML = data.p_tdes_rak;
                    p.innerHTML = data.p_bi_rak;
                    q.innerHTML = data.tmar_ku_ha;
                    r.innerHTML = data.tmar_ku;
                    s.innerHTML = data.latitude;
                    t.innerHTML = data.longitude;
                    u.innerHTML = data.kategori;
                    v.innerHTML = data.nama_kecamatan;
                    w.innerHTML = data.nama_mandor;
                    x.innerHTML = data.nama_plpg;
                    y.innerHTML = data.nama_manager;
                    z.innerHTML = data.afdeling;
                    aa.innerHTML = data.rayon;
                    ab.innerHTML = data.nama_kabupaten;
                    ac.innerHTML = data.nama_skk;
                    ad.innerHTML = data.nama_skw;



                },
                error : function(data) {
                    // do something
                }
             });
        }
    }

    window.onload = getName;
    </script>




</body>
</html>
