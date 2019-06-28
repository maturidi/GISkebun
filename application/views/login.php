<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PG Rajwali 1 | RNI Group</title>

	<!-- Global stylesheets -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/icons/icomoon/styles.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/core.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/components.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/css/minified/colors.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/images/icon.ico'); ?>" rel="shortcut icon">
  <!-- /global stylesheets -->

  <!-- Core JS files -->
  <script type="text/javascript" src="<?php echo base_url('assets/js/plugins/loaders/pace.min.js'); ?>"></script>
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

</head>

<body style="background-image:url(assets/images/background.png); background-position: center center;background-attachment: fixed;background-repeat: no-repeat;background-size: cover;">

		

	<!-- Page container -->
	<div class="page-container login-container">
		<br>
		<h1 align="center">
			<img src="<?php echo base_url('assets/images/head.png'); ?>" height="60px"><br>
			<img src="<?php echo base_url('assets/images/GIS1.png'); ?>" height="130px">
		</h1>
		<!-- Page content -->
		<div class="page-content">
			
			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">

					<!-- Simple login form -->
					<form action="<?php echo site_url('Login/signin'); ?>" method="post">
						<div class="panel panel-body login-form">
							<hr>
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
							<div class="form-group has-feedback has-feedback-left">
								<input type="text" class="form-control" name="username" placeholder="Username">
								<div class="form-control-feedback">
									<i class="icon-user text-muted"></i>
								</div>
							</div>

							<div class="form-group has-feedback has-feedback-left">
								<input type="password" class="form-control" name="password" placeholder="Password">
								<div class="form-control-feedback">
									<i class="icon-lock2 text-muted"></i>
								</div>
							</div>

							<div class="form-group">
								<button type="submit" class="btn btn-warning btn-block">Masuk</button>
								<hr>
							</div>
						</div>
					</form>
					<div class="footer text-muted">
						 All Right Reserved &copy; Copyright 2017 PT PG Rajawali I
					</div>
					<!-- /footer -->

				</div>
				<!-- /content area -->

			</div>
			<!-- /main content -->

		</div>
		<!-- /page content -->

	</div>
	<!-- /page container -->
</body>
</html>
