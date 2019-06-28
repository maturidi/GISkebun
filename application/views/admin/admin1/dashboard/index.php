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
    <h5 class="panel-title"><i class="icon-home4"></i> Beranda </h5>
  </div>
  <div class="panel-body">

		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
				<li data-target="#myCarousel" data-slide-to="5"></li>
			</ol>
 
			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="assets/images/slide/slide1.jpg" >
					<div class="carousel-caption">
						<!-- <h3>Tutorial Android</h3>
						<p>Tutorial membuat aplikasi android.</p> -->
					</div>
				</div>
				<div class="item">
					<img src="assets/images/slide/slide2.jpg" >
					<div class="carousel-caption">
						
					</div>
				</div>
				<div class="item ">
					<img src="assets/images/slide/slide3.jpg" >
					<div class="carousel-caption">
						
					</div>
				</div>
				<div class="item ">
					<img src="assets/images/slide/slide4.jpg" >
					<div class="carousel-caption">
						
					</div>
				</div>
				<div class="item ">
					<img src="assets/images/slide/slide5.jpg" >
					<div class="carousel-caption">
						
					</div>
				</div>			
			</div>
 
			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
   </div>
</div>