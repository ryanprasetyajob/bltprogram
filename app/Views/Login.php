<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>Matrix Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/bootstrap.min.css') ; ?>" />
		<link rel="stylesheet" href=" <?php echo base_url('public/themes/HTML/css/bootstrap-responsive.min.css') ; ?>" />
        <link rel="stylesheet" href=" <?php echo base_url('public/themes/HTML/css/matrix-login.css') ; ?>" />
        <link href="<?php echo base_url('public/themes/HTML/font-awesome/css/font-awesome.css') ; ?>" rel="stylesheet" />
        <link rel="stylesheet" href="<?php echo base_url('public/Layout/plugins/fontawesome-free/css/all.min.css') ; ?>" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
		<style>
		.bg {
			  /* The image used */
			  background-image: url("<?php echo base_url('public/themes/HTML/gray-pyramid-texture-pattern.jpg') ; ?>");

			  /* Full height */
			  height: 100%;

			  /* Center and scale the image nicely */
			  background-position: center;
			  background-repeat: no-repeat;
			  background-size: cover;
		}
		</style>
    </head>
	
    <body class="bg" >
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="<?php echo base_url('public/login/auth') ; ?>" method="post">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Wellcome" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="email" placeholder="Email" id="Username" name="Username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" id="Password" name="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span> -->
					<span class="pull-center"><a href="Register/index" class="btn btn-info" id="btnRegister">Register</a></span>
                    <span class="pull-right"><input type="submit"  class="btn btn-success"  id="btnLogin" name="btnLogin" value='Login'/></span>
                    
                    
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        
        <script src="<?php echo base_url('public/themes/HTML/js/jquery.min.js') ?>"></script>  
        <script src="<?php echo base_url('public/themes/HTML/js/matrix.login.js') ?>"></script> 
    </body>

</html>
