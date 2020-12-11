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
<?php 
	$dataQuery=$query->getFirstRow();
	$dataus=$userdata;
	//dd($dataus);

?>
<style>
            #frmCheckPassword {
                border-top: #F0F0F0 2px solid;
                background: #808080;
                padding: 10px;
            }

            .demoInputBox {
                padding: 7px;
                border: #F0F0F0 1px solid;
                border-radius: 4px;
            }

            #password-strength-status {
                /*padding: 5px 10px;
                color: #FFFFFF;
                border-radius: 4px;
                margin-top: 5px; */
            }

            .medium-password {
                background-color: #b7d60a;
                border: #BBB418 1px solid;
            }

            .weak-password {
                background-color: #ce1d14;
                border: #AA4502 1px solid;
            }

            .strong-password {
                background-color: #12CC1A;
                border: #0FA015 1px solid;
            }
        </style>
<body width='100%' Height='100%'>
<div class="container-fluid  col-md-12">
    <div class="card-body  col-md-12">    
      <!-- Horizontal Form -->
      <div class="card card-secondary">
              <div class="card-header" >
                <h3 class="card-title"><center>Change Password</center></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="<?php echo base_url('public/Register/ChangePassword');?>" method="post" enctype="multipart/form-data">
			  </br>
			  <div class="card card card-default" ">
							
				<div class="card-body">
                    
                    <div class="form-group row px-2" >
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                         <input type="email" value="<?php echo $userdata->Username?>" readonly="readonly" class="form-control"  id="inputEmail" name="inputEmail"  placeholder="Email" required="required">
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-5">
						<input type="password" value='' class="form-control" id="inputPassword" name="inputPassword" placeholder="password" onKeyUp="checkPasswordStrength();">
					    <Label id="password-strength-status"></Label>
					</div>                   
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Retype Password</label>
					<div class="col-sm-5">
						<input type="password" value='' onkeyup="Validate()" class="form-control" id="inputRetypePassword" placeholder="Retype Password">
						<Label id="ValidationLabel" name="ValidationLabel"></label>
						
                    <script>
						function checkPasswordStrength() {
							var number = /([0-9])/;
							var alphabets = /([a-zA-Z])/;
							var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
							if ($('#inputPassword').val().length < 6) {
								/* $('#password-strength-status').removeClass();
								$('#password-strength-status').addClass('weak-password'); */
								$("#password-strength-status").css('color', '#ce1d14');
								$('#password-strength-status').text("Weak (should be atleast 6 characters.)");
							} else {
								if ($('#inputPassword').val().match(number) && $('#inputPassword').val().match(alphabets) && $('#inputPassword').val().match(special_characters)) {
									/* $('#password-strength-status').removeClass();
									$('#password-strength-status').addClass('strong-password'); */
									$("#password-strength-status").css('color', '#12CC1A');
									$('#password-strength-status').html("Strong");
								} else {
									/* $('#password-strength-status').removeClass();
									$('#password-strength-status').addClass('medium-password'); */
									 $("#password-strength-status").css('color', '#b7d60a');
									$('#password-strength-status').text("Medium (should include alphabets, numbers and special characters.)");
								}
							}
						}
						function Validate() {
							var password = document.getElementById("inputPassword").value;
							var confirmPassword = document.getElementById("inputRetypePassword").value;
							
							if (password != confirmPassword) {							
								$("#ValidationLabel").text("Password Not Valid");
								$("#ValidationLabel").css('color', '#ff3300');
								
							}else{							
								$("#ValidationLabel").text("Password Valid");
								 $("#ValidationLabel").css('color', '#66ff66');
							}
						}
					</script>
					</div>                   
                    </div>
				</div>
				</div>
			
			
				
				<div class="card card card-default" >
							
				<div class="card-body">
                    
                   
					<div class="form-group row px-2" >
                   
                    <div class="col-sm-5">
						  <button type="submit" class="btn btn-info">Submit</button> &nbsp;
						  <button type="Button" class="btn btn-default" onClick="window.location.replace('../user/dashboard');">Cancel</button>
                    </div>
                    </div>                   
                    
				</div>
				</div>
                  <!--EndFormHTML-->
                </div>
                <!-- /.card-body -->
               
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
    </div>
</div>
</body>

</div>  
</body>

<?=$this->endSection() ?>


