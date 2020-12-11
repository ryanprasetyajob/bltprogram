<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>
<body width='100%' Height='100%' >
 <script src="<?php echo base_url('public/JS/jquery-3.5.1.js') ; ?>"></script>
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/bootstrap.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/bootstrap-responsive.min.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/Layout/dist/css/adminlte.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/Layout/plugins/fontawesome-free/css/all.min.css') ; ?>" />


<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/fullcalendar.css') ; ?>" />
<link href="<?php echo base_url('public/themes/HTML/font-awesome/css/font-awesome.css') ; ?>" rel="stylesheet" />
<!--<link rel="stylesheet" href="<?php echo base_url('public/bootstrap-4.5.3/site/docs/4.5/assets/css/docs.min.css') ; ?>" />-->

<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/uniform.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/select2.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/matrix-style.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/matrix-media.css') ; ?>" />


<?php //=$this->extend('MainLayout.php') ?>
<?php //=$this->section('content') ?>

<body width='100%' Height='100%'>
<br/><br/><br/>
<div class="container-fluid  col-md-5">
   <div class="position-relative p-3 bg-gray" style="height: 180px"><center>
	  <div class="ribbon-wrapper ribbon-lg">
		<div class="ribbon bg-success text-lg">
		  Not Verified 
		</div>
	  </div> <br /> <br />
	  Warning <br /> Data Profile bisa diupdate jika sudah Verified oleh RT setempat. <br />
	  <small>Silahkan hubungi RT Anda untuk bisa verified.</small></center>
	</div>
</div>
</body>


<?=$this->endSection() ?>


