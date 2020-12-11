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
	//dd($dataQuery);

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
			.col-form-label{
				font-size:12pt;
				
			}
        </style>
<body width='100%' Height='100%'>
<div class="container-fluid  col-md-12">
    <div class="card-body  col-md-12">    
      <!-- Horizontal Form -->
      <div class="card card-secondary">
              <div class="card-header" >
                <h3 class="card-title"><center>User Profile</center></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="<?php echo base_url('public/Register/SimpanRegister');?>" method="post" enctype="multipart/form-data">
			  </br>
			  
			  <div  class="col-md-12 row">
				<div  class="col-md-6">
					<div class="card card-secondary" >
					<div class="card-header">
						<h4 class="card-title">Biodata</h4>
					</div>				 
					<div class="card-body row">
					  <div class="col-md-4">
					   <img src="<?php echo base_url('Attachment/'.$dataQuery->Foto);?>" width="180" height="240"><br/><br/><br/>
					  </div>
					   <div class="col-md-8">
						<div class="form-group row px-1" >
							<label for="inputNIK" class="col-sm-4 col-form-label ">NIK KTP</label>
							<div class="col-sm-8">
							<label   id="inputNIK" name="inputNIK" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->NIK?></label>
							</div>
							</div>                    
							<div class="form-group row px-1" >
							<label for="inputNamaWarga" class="col-sm-4 col-form-label">Nama Warga</label>
							<div class="col-sm-8">
							<label   id="inputNamaWarga"  name="inputNamaWarga" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->NamaWarga?></label>
							
							</div>
							</div>
							<div class="form-group row px-1" >
							<label for="inputTempatLahir" class="col-sm-4 col-form-label">Tempat Lahir</label>
							<div class="col-sm-8">
							<label id="inputTempatLahir" name="inputTempatLahir"class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->TempatLahir?></label>
							</div>
							</div>
							<div class="form-group row px-1" >
							<label for="inputTanggalLahir" class="col-sm-4 col-form-label">Tanggal Lahir</label>
							<div class="col-sm-8">
							<label  id="inputTanggalLahir" name="inputTanggalLahir" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->TanggalLahir?></label>
							
							</div>
							</div>
							<div class="form-group row px-1" >
							<label for="inputGender" class="col-sm-4 col-form-label">Gender</label>
							<div class="col-sm-8">
								<label  id="inputGender" name="inputGender" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->Gender?></label>
							</div>
							</div>
					  </div>
					   <div class="col-md-12">
						<div class="form-group row px-2" >
							<label for="inputGolDarah" class="col-sm-4 col-form-label">Gol Darah</label>
							<div class="col-sm-5">
							<label  id="inputGolDarah" name="inputGolDarah" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->GolDarah?></label>
							
							</div>
							</div>
							 <div class="form-group row px-2" >
							<label for="inputAgama" class="col-sm-4 col-form-label">Agama</label>
							<div class="col-sm-5">
							
							<label  id="inputAgama" name="inputAgama" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->Agama?></label>
							</div>
							</div>
						
							<div class="form-group row px-2" >
							<label for="inputKewarganegaraan" class="col-sm-4 col-form-label  ">Kewarganegaraan</label>
							<div class="col-sm-5">
							<label  id="inputKewarganegaraan" name="inputKewarganegaraan" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->Kewarganegaraan?></label>
							
							</div>
							</div>
							<br/>
							<br/><br/><br/>
							
					  </div>
					  						
					   </div>
					</div>
					<div >
						<div class="card card card-secondary" >
							<div class="card-header">
								<h3 class="card-title">Data Pernikahan</h3>
							</div>				
							<div class="card-body">
								
								<div class="form-group row px-2" >
									<label for="inputStatusKawin" class="col-sm-3 col-form-label">Status Nikah</label>
									<div class="col-sm-5">
									<label  id="inputStatusKawin" name="inputStatusKawin" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->PointStatusPernikahanName?></label>
										
									</div>
								</div>
											
								
							</div>
							</div>
							
							<div class="card card card-secondary" >
							<div class="card-header">
								<h3 class="card-title">Pekerjaan</h3>
							</div>				
							<div class="card-body">
							
								<div class="form-group row px-2" >
								<label for="inputNamaPekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
								<div class="col-sm-5">
									<label  id="inputNamaPekerjaan" name="inputNamaPekerjaan" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->Pekerjaan?></label>
								</div>
								</div>
								<div class="form-group row px-2" >
								<label for="inputRentangGaji" class="col-sm-3 col-form-label">Rentang Gaji</label>
								<div class="col-sm-5">
									<label  id="inputRentangGaji" name="inputRentangGaji" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->PointPendapatanName?></label>
									
								</div>
								</div>                   
								
							</div>
							</div> 
						  </div>	
				  </div>
				<div  class="col-md-6">
				 <div class="card card card-secondary" >
				<div class="card-header">
					<h3 class="card-title">Alamat Lengkap</h3>
				</div>
				<div class="card-body">
						<div class="form-group row px-2" >
						<label for="inputAlamat" class="col-sm-3 col-form-label">Alamat</label>
						<div class="col-sm-9">
						    <label  id="inputAlamat" name="inputAlamat" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->Alamat?></label>
							
						</div>
						</div>					   
						<div class="form-group row px-2" >
						<label for="inputKecamatanID" class="col-sm-3 col-form-label">Kecamatan</label>
						<div class="col-sm-9">				
							<label  id="inputKecamatanID" name="inputKecamatanID" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->KecamatanID?></label>
							  
				        </div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputKelurahanID" class="col-sm-3 col-form-label">Kelurahan</label>
						<div class="col-sm-9">
						<label  id="inputKelurahanID" name="inputKelurahanID" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->KelurahanID?></label>
							  
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputRwID" class="col-sm-3 col-form-label">RW</label>
						<div class="col-sm-9">						
							<label  id="inputRwID" name="inputRwID" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->RwID?></label>
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputRtID" class="col-sm-3 col-form-label">RW</label>
						<div class="col-sm-9">
							<label  id="inputRtID" name="inputRtID" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->RtID?></label>
						
						</div>
						</div>
					</div>
					</div>
					<div class="card card card-secondary" >
				<div class="card-header">
					<h3 class="card-title">Attachment File</h3>
				</div>				
				<div class="card-body">
				    <div class="form-group row px-2" >
                    <label for="inputScanKTP" class="col-sm-2 col-form-label">Scan KTP</label>
					<img src="<?php echo base_url('Attachment/'.$dataQuery->ScanKTP);?>" width="220" height="120">
                    <div class="col-sm-5" style="Display:none;" >
					
                    <input type="file" class="form-control "  placeholder="E-sign" id="inputScanKTP" name="inputScanKTP">
                    </div>
                    </div>
				</div>
			    </div>
					<div class="card card card-secondary" >
				<div class="card-header">
					<h3 class="card-title">Kepemilikan Kendaraan</h3>
				</div>				
				<div class="card-body">                   
                    <div class="form-group row px-2" >
                    <label for="inputKendaraan" class="col-sm-3 col-form-label">Kendaraan</label>
                    <div class="col-sm-5">
						<label  id="inputKendaraan" name="inputKendaraan" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->PointKendaraanName?></label>
                    </div>
                    </div>
				</div>
				</div>
				<div class="card card card-secondary" >
				<div class="card-header">
					<h3 class="card-title">Type Rumah</h3>
				</div>				
				<div class="card-body">                    
                    <div class="form-group row px-2" >
                    <label for="inputStatusHuni" class="col-sm-3 col-form-label">Status Huni</label>
                    <div class="col-sm-5">
						<label  id="inputStatusHuni" name="inputStatusHuni" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->PointStatusHunianName?></label>
					</div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputTypeRumah" class="col-sm-3 col-form-label">Type Rumah</label>
                    <div class="col-sm-5">
					<label  id="inputTypeRumah" name="inputTypeRumah" class="col-form-label" >:&nbsp;&nbsp;<?php echo $dataQuery->PointTypeRumahName?></label>
						
                    </div>
                    </div>                   
                  
				</div>
				</div>
			
			  </div>
			  </div>
				
				
				<div class="card card card-default"style="display:none;" >							
				<div class="card-body">                   
                   
					<div class="form-group row px-2" >                   
                    <div class="col-sm-5">
						  <button type="submit" class="btn btn-info">Sign in</button> &nbsp;
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






   
</div>  
</body>

<?=$this->endSection() ?>


