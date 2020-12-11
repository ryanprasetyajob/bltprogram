<!DOCTYPE html>
<html lang="en">
<head>
<title>Bansos Approval System</title>
<meta charset="UTF-8" />
<!--<meta name="viewport" content="width=device-width, initial-scale=1.0" />-->

<link href="<?php echo base_url('public/themes/HTML/font-awesome/css/font-awesome.css') ; ?>" rel="stylesheet" />
<link rel="stylesheet" href="<?php  //echo base_url('public/Layout/plugins/daterangepicker/daterangepicker.css') ; ?>" />

<link rel="stylesheet" href="<?php  echo base_url('public/Layout/dist/css/adminlte.css') ; ?>" />
<link rel="stylesheet" href="<?php  echo base_url('public/themes/HTML/css/bootstrap.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/bootstrap-responsive.min.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/Layout/plugins/fontawesome-free/css/all.min.css') ; ?>" />



<link rel="stylesheet" href="<?php //echo base_url('public/themes/HTML/css/fullcalendar.css') ; ?>" />

<!--<link rel="stylesheet" href="<?php echo base_url('public/bootstrap-4.5.3/site/docs/4.5/assets/css/docs.min.css') ; ?>" />-->

<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/uniform.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/select2.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/matrix-style.css') ; ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/matrix-media.css') ; ?>" />
<link rel="stylesheet" href="<?php  echo base_url('public/Layout/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ; ?>">


<!-- <link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/jquery.gritter.css') ; ?>" /> -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">Matrix Admin</a></h1>
</div>
<?= $this->include('Navbar.php')  ?>
<?= $this->include('SideBar.php')  ?>
<div id="content" >
  <div id="content-header">
    <div id="breadcrumb"> <a href="../User/Dashboard" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
	<div >
	<?=$this->renderSection('content')?>
	</div>
<!--Footer-part-->

<div class="row-fluid">
 <!-- <div id="footer" class="span12"> 2013 &copy; Matrix Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>-->
</div>

<!--end-Footer-part-->
 <script src="<?php echo base_url('public/JS/jquery-3.5.1.js') ; ?>"></script>

<script src="<?php echo base_url('public/themes/HTML/js/excanvas.min.js') ; ?>"></script> 
<script src="<?php //echo base_url('public/themes/HTML/js/jquery.min.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.ui.custom.js') ; ?>"></script> 
<script src="<?php // echo base_url('public/themes/HTML/js/bootstrap.min.js') ; ?>"></script> 
<script src="<?php echo base_url('public/bootstrap-4.5.3/dist/js/bootstrap.js') ; ?>"></script> 
<script src="<?php //echo base_url('public/Layout/plugins/daterangepicker/daterangepicker.js') ; ?>"></script> 
<script src="<?php echo  base_url('public/Layout/plugins/moment/moment.min.js') ; ?>"></script>


<script src="<?php echo base_url('public/themes/HTML/js/jquery.flot.min.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.flot.resize.min.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.peity.min.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/fullcalendar.min.js') ; ?>"></script> 
 <script src="<?php echo base_url('public/themes/HTML/js/matrix.js') ; ?>"></script> 
<!-- <script src="<?php echo base_url('public/themes/HTML/js/matrix.dashboard.js') ; ?>"></script>  -->
<!-- <script src="<?php echo base_url('public/themes/HTML/js/jquery.gritter.min.js') ; ?>"></script>  -->
<!-- <script src="<?php// echo base_url('public/themes/HTML/js/matrix.interface.js') ; ?>"></script> -->
<script src="<?php  echo base_url('public/themes/HTML/js/matrix.chat.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.validate.js') ; ?>"></script> 
<script src="<?php //echo base_url('public/themes/HTML/js/matrix.form_validation.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.wizard.js') ; ?>"></script> 
<script src="<?php // echo base_url('public/themes/HTML/js/jquery.uniform.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/select2.min.js') ; ?>"></script> 
<script src="<?php //echo base_url('public/themes/HTML/js/matrix.popover.js') ; ?>"></script> 
<script src="<?php echo base_url('public/themes/HTML/js/jquery.dataTables.min.js') ; ?>"></script> 
<script src="<?php //echo base_url('public/themes/HTML/js/matrix.tables.js') ; ?>"></script>  
<script src="<?php echo base_url('public/Layout/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ; ?>"></script>
 
<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {
      
          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
              resetMenu();            
          } 
          // else, send page to designated URL            
          else {  
            document.location.href = newURL;
          }
      }
  }

// resets the menu selection upon entry to this page:
function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
