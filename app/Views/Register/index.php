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
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>


<?php //=$this->extend('MainLayout.php') ?>
<?php //=$this->section('content') ?>
<?php 
	
	$listKecamatan=$data['dataKec']->getResult();
	$listKelurahan=$data['dataKel']->getResult();
//	dd($listKecamatan);

?>
<script>
$(document).ready(function()
{
	$("#inputKecamatanID").on('change', function() {
		//alert($("#inputKecamatanID").val());
		getKelurahan($("#inputKecamatanID").val());
	});
	$("#inputKelurahanID").on('change', function() {
		//alert($("#inputKecamatanID").val());
		getRW($("#inputKecamatanID").val(),$("#inputKelurahanID").val());
	});
	$("#inputRwID").on('change', function() {
		//alert($("#inputKecamatanID").val());
		getRT($("#inputKecamatanID").val(),$("#inputKelurahanID").val(),$("#inputRwID").val());
	});
	 $('#inputTanggalLahir').datepicker({
            uiLibrary: 'bootstrap4'
        });
});
function getKelurahan(kecID)
{
	//alert("tepilih "+kecID);	
	var kecSelectID = 'kecSelectID='+ kecID;
	$('#inputKelurahanID').html('');
	$('#inputKelurahanID').append('<option value="">Pilih</option>');
	$.ajax({
		type: 'GET',
		url: '../Register/getKelurahanByKecID',
		data: kecSelectID,	
		dataType: 'JSON',		
		success: function (response) {		
			var len = response.length;
			//alert("jumlah "+len);				
            for(var i=0; i<len; i++){              
                var NamaKelurahan = response[i].NamaKelurahan;
				var KelurahanID = response[i].KelurahanID;
				
				$('#inputKelurahanID').append('<option value="'+KelurahanID+'">'+NamaKelurahan+'</option>');
			} 
		}
	});	
}

function getRW(kecID,kelID)
{
	//alert("tepilih "+kecID);	
	//var kecSelectID = 'kecSelectID='+ kecID;
	$('#inputRwID').html('');
	$('#inputRwID').append('<option value="">Pilih</option>');
	$.ajax({
		type: 'GET',
		url: '../Register/getRwByKecKelID?kecSelectID='+kecID+'&kelSelectID='+kelID,
		//data: {kecSelectID:kecID,kelSelectID:kelID},
		dataType: 'JSON',		
		success: function (response) {		
			var len = response.length;
			//alert("jumlah "+len);				
            for(var i=0; i<len; i++){              
               var NomorRW = response[i].NomorRW;
				var RwID = response[i].RwID;			
				$('#inputRwID').append('<option value="'+RwID+'">'+NomorRW+'</option>');
			} 
		}
	});	
}
function getRT(kecID,kelID,rwID)
{
	//alert("tepilih "+rwID);	
	//var kecSelectID = 'kecSelectID='+ kecID;
	$('#inputRtID').html('');
	$('#inputRtID').append('<option value="">Pilih</option>');
	$.ajax({
		type: 'GET',
		url: '../Register/getRtByKecKelRwID?kecSelectID='+kecID+'&kelSelectID='+kelID+'&rwSelectID='+rwID,
		//data: {kecSelectID:kecID,kelSelectID:kelID},
		dataType: 'JSON',		
		success: function (response) {		
			var len = response.length;
			//alert("jumlah "+len);				
            for(var i=0; i<len; i++){              
               var NomorRt = response[i].NomorRt;
				var RtID = response[i].RwID;			
				$('#inputRtID').append('<option value="'+RtID+'">'+NomorRt+'</option>');
			} 
		}
	});	
}
</script>

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
<div class="container-fluid  col-md-10">
    <div class="card-body  col-md-12">    
      <!-- Horizontal Form -->
      <div class="card card-secondary">
              <div class="card-header" >
                <h3 class="card-title"><center>Register Form</center></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" autocomplete="off" action="<?php echo base_url('public/Register/SimpanRegister');?>" method="post" enctype="multipart/form-data">
			  </br>
			  <div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Account Login</h3>
				</div>				
				<div class="card-body">
                    
                    <div class="form-group row px-2" >
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                         <input type="email" class="form-control"  id="inputEmail" name="inputEmail"  placeholder="Email" required="required">
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Password</label>
					<div class="col-sm-5">
						<input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="password" onKeyUp="checkPasswordStrength();">
					    <Label id="password-strength-status"></Label>
					</div>                   
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label">Retype Password</label>
					<div class="col-sm-5">
						<input type="password" onkeyup="Validate()" class="form-control" id="inputRetypePassword" placeholder="Retype Password">
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
			<div class="card card-default" >
				<div class="card-header">
					<h4 class="card-title">Biodata</h4>
				</div>				 
                <div class="card-body">				
                  <!--StartFormHTML-->                   
						<div class="form-group row px-2" >
						<label for="inputNIK" class="col-sm-2 col-form-label">NIK KTP</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputNIK" name="inputNIK" placeholder="Nomor KTP">
						</div>
						</div>                    
						<div class="form-group row px-2" >
						<label for="inputNamaWarga" class="col-sm-2 col-form-label">Nama Warga</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputNamaWarga"  name="inputNamaWarga" placeholder="Nama Lengkap">
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputTempatLahir" name="inputTempatLahir" placeholder="Nama Kota Lahir">
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputTanggalLahir" name="inputTanggalLahir" placeholder="Tanggal Lahir">
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
						<div class="col-sm-5">
						     <div class="form-group clearfix">
								 <select id="inputGender" name="inputGender" class="form-control select2" style="width: 100%;">								
									<option selected="selected" value=''>Pilih</option>
									<option value='L'>Laki-laki</option>
									<option value='P'>Perempuan</option>									
							    </select>
							 </div> 
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputGolDarah" class="col-sm-2 col-form-label">Gol Darah</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputGolDarah" name="inputGolDarah" placeholder="Gol Darah">
						</div>
						</div>
						 <div class="form-group row px-2" >
						<label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputAgama" name="inputAgama" placeholder="Agama">
						</div>
						</div>
						
						<div class="form-group row px-2" >
						<label for="inputKewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputKewarganegaraan" name="inputKewarganegaraan" placeholder="Kewarganegaraan">
						</div>
						</div>
				   </div>
				</div>
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Status Pernikahan</h3>
				</div>
				<div class="card-body">
					<div class="form-group row px-2" >
					<label for="inputStatusKawin" class="col-sm-2 col-form-label">Status Kawin</label>
					<div class="col-sm-5">
						<div class="form-group clearfix">
							  <select id="inputStatusKawin" name="inputStatusKawin" class="form-control select2" style="width: 100%;">								
								<option selected="selected" value=''>Pilih</option>
								<option value='1'>Lajang</option>
								<option value='2'>Menikah</option>
								<option value='3'>Janda/Duda</option>									
							  </select>
						 </div> 
					</div>
					</div>
				</div>
				
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Alamat Lengkap</h3>
				</div>
				<div class="card-body">
						<div class="form-group row px-2" >
						<label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
						<div class="col-sm-5">
						<input type="text" class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Alamat">
						</div>
						</div>					   
						<div class="form-group row px-2" >
						<label for="inputKecamatanID" class="col-sm-2 col-form-label">Kecamatan</label>
						<div class="col-sm-5">									
								<select class="form-control select2" style="width: 100%;" id="inputKecamatanID" name='inputKecamatanID'>
									<option value="">Pilih</option>
								<?php 
								//foreach ($data['dataKec']->getResult() as $row)		
								foreach ($listKecamatan as $row)				
								{?>
									<?php echo '<option value="'.$row->KecamatanID .'">'.$row->NamaKecamatan.'</option>'?>
														            
								<?php 								 
								}
								?>
							  </select>
				        </div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputKelurahanID" class="col-sm-2 col-form-label">Kelurahan</label>
						<div class="col-sm-5">
							  <select class="form-control select2" style="width: 100%;" id="inputKelurahanID" name="inputKelurahanID">								
									
									
							  </select>
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputRwID" class="col-sm-2 col-form-label">RwID</label>
						<div class="col-sm-5">
							<select id="inputRwID" name="inputRwID" class="form-control select2" style="width: 100%;">								
								<!-- <option selected="selected" value=''>Pilih</option>
								<option value='3'>1-2 Juta</option>
								<option value='2'>3-5 Juta</option>	
								<option value='1'>>5 Juta</option>	-->									
							</select>
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputRtID" class="col-sm-2 col-form-label">RtID</label>
						<div class="col-sm-5">
						<!--<input type="text" class="form-control"placeholder="RT" id="inputRtID" name="inputRtID">-->
							<select id="inputRtID" name="inputRtID" class="form-control select2" style="width: 100%;">								
								<!-- <option selected="selected" value=''>Pilih</option>
								<option value='3'>1-2 Juta</option>
								<option value='2'>3-5 Juta</option>	
								<option value='1'>>5 Juta</option>	-->									
							</select>
						</div>
						</div>
					</div>
					</div>
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Attachment File</h3>
				</div>				
				<div class="card-body">
				    <div class="form-group row px-2" >
                    <label for="inputScanKTP" class="col-sm-2 col-form-label">Scan KTP</label>
                    <div class="col-sm-5">
                    <input type="file" class="form-control "  placeholder="E-sign" id="inputScanKTP " name="inputScanKTP">
                    </div>
                    </div>
                    <div class="form-group row px-2" >
                    <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-5">
						 
						<input type="file" class="form-control "  placeholder="Pas Foto" id="inputFoto" name="inputFoto">
                    </div>
                    </div>
					
				</div>
			    </div>
				<div class="card card card-default" style="display:none;">
				<div class="card-header">
					<h3 class="card-title">Pekerjaan</h3>
				</div>				
				<div class="card-body">
                    <i>Note : Mohon diisi dengan data yang sebenar-benarnya.</i>
                    <div class="form-group row px-2" >
                    <label for="inputNamaPekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control" id="inputNamaPekerjaan" placeholder="Nama Pekerjaan" id="inputNamaPekerjaan" name ="inputNamaPekerjaan">
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputRentangGaji" class="col-sm-2 col-form-label">Rentang Gaji</label>
                    <div class="col-sm-5">
						<select id="inputRentangGaji" name="inputRentangGaji" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='3'>1-2 Juta</option>
							<option value='2'>3-5 Juta</option>	
							<option value='1'>>5 Juta</option>										
						</select>
                    </div>
                    </div>                   
                    
				</div>
				</div>
				<div class="card card card-default" style="display:none;">
				<div class="card-header">
					<h3 class="card-title">Type Rumah</h3>
				</div>				
				<div class="card-body">                    
                    <div class="form-group row px-2" >
                    <label for="inputStatusHuni" class="col-sm-2 col-form-label">Status Huni</label>
                    <div class="col-sm-5">
						<select id="inputStatusHuni" name="inputStatusHuni" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='L'>Rumah Kontrakan</option>
							<option value='P'>Rumah Sendiri</option>	
					    </select>
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputTypeRumah" class="col-sm-2 col-form-label">Type Rumah</label>
                    <div class="col-sm-5">
						<select id="inputTypeRumah" name="inputTypeRumah" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>							
							<option value='8'>Tipe 21 </option>	
							<option value='7'>Tipe 36 </option>	
							<option value='6'>Tipe 45 </option>	
							<option value='5'>Tipe 60 </option>	
							<option value='4'>Tipe 70 </option>	
							<option value='3'>Tipe 90 </option>	
							<option value='2'>Tipe 120</option>	
							<option value='1'>> Tipe 120</option>								
						</select> 
                    </div>
                    </div>                   
                  
				</div>
				</div>
				<div class="card card card-default" style="display:none;">
				<div class="card-header">
					<h3 class="card-title">Kepemilikan Kendaraan</h3>
				</div>				
				<div class="card-body">                   
                    <div class="form-group row px-2" >
                    <label for="inputKendaraan" class="col-sm-2 col-form-label">Kendaraan</label>
                    <div class="col-sm-5">
						<select id="inputKendaraan" name="inputKendaraan" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='3'>Tidak Ada</option>
							<option value='2'>Sepeda Motor</option>	
							<option value='1'>Mobil</option>	
					    </select>
                    </div>
                    </div>
					                
                  
				</div>
				</div>
				<div class="card card card-default" >
							
				<div class="card-body">
					<div class="form-group row px-2" >                   
                    <div class="col-sm-5">
						  <button type="submit" class="btn btn-info" return="<script>confirm('Anda yakin sudah mengisi data dengan benar?')</script>">Submit</button> &nbsp;
						  <button type="Button" class="btn btn-default" onClick="window.location.replace('../Login');">Cancel</button>
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

<?php//=$this->endSection() ?>


