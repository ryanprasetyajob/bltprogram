<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>
 <script src="<?php echo base_url('public/JS/jquery-3.5.1.js') ; ?>"></script>
 
<link rel="stylesheet" href="<?php echo base_url('public/themes/HTML/css/fullcalendar.css') ; ?>" />

<?php 
	$listKecamatan=$data['dataKec']->getResult();
	$listKelurahan=$data['dataKel']->getResult();
	$dataQuery=$data['query']->getFirstRow();
	$dataUserQuery=$data['dataUser']->getFirstRow();
	
	//dd($dataQuery);

?>
 
<script>
  $(function () {
               $('#datetimepicker4').datetimepicker({
                    format: 'yyyy-MM-DD'
                });
            });
	
	getKecamatan('64');	
	getKelurahan('<?php echo $dataQuery->KelurahanID?>');
	getRW('<?php echo $dataQuery->KecamatanID?>','<?php echo $dataQuery->KelurahanID?>');
	getRT('<?php echo $dataQuery->KecamatanID?>','<?php echo $dataQuery->KelurahanID?>','<?php echo $dataQuery->RwID?>');
$(document).ready(function()
{
	//LOAD Wilayah
	$('#inputKecamatanID').val('<?php echo $dataQuery->KecamatanID?>');	
	$('#inputKelurahanID').val('<?php echo $dataQuery->KelurahanID?>');
	 $('#inputTanggalLahir').val('<?php echo $dataQuery->TanggalLahir?>');
	 
	 $('#inputKendaraanID').val('<?php echo $dataQuery->PointKendaraanID?>');
	 $('#inputRentangGajiID').val('<?php echo $dataQuery->PointPendapatanID?>');
	 $('#inputStatusHuniID').val('<?php echo $dataQuery->PointStatusHunianID?>');
	 $('#inputStatusKawinID').val('<?php echo $dataQuery->PointStatusPernikahanID?>');
	 $('#inputTypeRumahID').val('<?php echo $dataQuery->PointTypeRumahID?>');
	
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
	
	
	
});
function read1URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#srcScanKTP')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
function read2URL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#srcFoto')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

function getKecamatan(kabKotaID)
{
	//alert("tepilih "+kabKotaID);	
	var kabKotaSelectID = 'kabKotaSelectID='+ kabKotaID;
	$('#inputKecamatanID').html('');
	$('#inputKecamatanID').append('<option value="">Pilih</option>');
	$.ajax({
		type: 'GET',
		url: '../Register/getKecamatanByKabKotaID',
		data: kabKotaSelectID,	
		dataType: 'JSON',		
		success: function (response) {		
			var len = response.length;
			//alert("jumlah "+len);				
            for(var i=0; i<len; i++){              
                var NamaKecamatan = response[i].NamaKecamatan;
				var KecamatanID = response[i].KecamatanID;
				
				$('#inputKecamatanID').append('<option value="'+KecamatanID+'">'+NamaKecamatan+'</option>');
				
				
			} 
		}
	});	
}
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
<body width='100%' Height='100%'>

<div class="container-fluid  col-md-12">
    <div class="card-body  col-md-12">    
      <!-- Horizontal Form -->
      <div class="card card-secondary ">
              <div class="card-header" >
                <h3 class="card-title"><center>Edit Profile</center></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" autocomplete="off" action="<?php echo base_url('public/Register/UpdateProfile');?>" method="post" enctype="multipart/form-data">
			  </br>
			 
			<div class="card card-default" >
				<div class="card-header">
					<h4 class="card-title">Biodata</h4>
				</div>				 
                <div class="card-body">				
                  <!--StartFormHTML-->                   
						<div class="form-group row px-2" >
						<label for="inputNIK" class="col-sm-2 col-form-label">NIK KTP</label>
						<div class="col-sm-5">
						<input type="text" hidden value="<?php echo $dataUserQuery->Username?>" class="form-control" id="inputUsername" name="inputUsername">
						<input type="text" hidden value="<?php echo $dataQuery->PendudukID?>" class="form-control" id="inputPendudukID" name="inputPendudukID">
						<input type="text" value="<?php echo $dataQuery->NIK?>" class="form-control" id="inputNIK" name="inputNIK" placeholder="Nomor KTP">
						</div>
						</div>                    
						<div class="form-group row px-2" >
						<label for="inputNamaWarga" class="col-sm-2 col-form-label">Nama Warga</label>
						<div class="col-sm-5">
						<input type="text"  value="<?php echo $dataQuery->NamaWarga?>" class="form-control" id="inputNamaWarga"  name="inputNamaWarga" placeholder="Nama Lengkap">
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputTempatLahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
						<div class="col-sm-5">
						<input type="text"   value="<?php echo $dataQuery->TempatLahir?>"class="form-control" id="inputTempatLahir" name="inputTempatLahir" placeholder="Nama Kota Lahir">
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
						<div class="col-sm-5">
						<!--<input type="text" class="form-control" id="inputTanggalLahir" name="inputTanggalLahir" placeholder="Tanggal Lahir">-->
								
								  <div class="input-group date" id="datetimepicker4" data-target-input="nearest">
									<input   type="text" class="form-control datetimepicker-input" id="inputTanggalLahir" name="inputTanggalLahir"data-target="#datetimepicker4"/>
									<div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputGender" class="col-sm-2 col-form-label">Gender</label>
						<div class="col-sm-5">
						     
								 <select id="inputGender" name="inputGender" style="width: 100%" class="form-control select2" style="-moz-background-clip: padding;-webkit-background-clip: padding-box;">								
									<option <?php  if($dataQuery->Gender=='') echo 'selected="selected"'?> value=''>Pilih</option>
									<option value='L'  <?php  if($dataQuery->Gender=='L') echo 'selected="selected"'?>>Laki-laki</option>
									<option value='P'  <?php  if($dataQuery->Gender=='P') echo 'selected="selected"'?>>Perempuan</option>									
							    </select>
							
						</div>
						</div>
						<div class="form-group row px-2" >
						<label for="inputGolDarah" class="col-sm-2 col-form-label">Gol Darah</label>
						<div class="col-sm-5">
						<input type="text" value="<?php echo $dataQuery->GolDarah?>" class="form-control" id="inputGolDarah" name="inputGolDarah" placeholder="Gol Darah">
						</div>
						</div>
						 <div class="form-group row px-2" >
						<label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
						<div class="col-sm-5">
						<input type="text"  value="<?php echo $dataQuery->Agama?>" class="form-control" id="inputAgama" name="inputAgama" placeholder="Agama">
						</div>
						</div>
						
						<div class="form-group row px-2" >
						<label for="inputKewarganegaraan" class="col-sm-2 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-5">
						<input type="text" class="form-control"  value="<?php echo $dataQuery->Kewarganegaraan?>" id="inputKewarganegaraan" name="inputKewarganegaraan" placeholder="Kewarganegaraan">
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
						<input type="text"  value="<?php echo $dataQuery->Alamat?>" class="form-control" id="inputAlamat" name="inputAlamat" placeholder="Alamat">
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
					<!-- <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div> -->
					<img id="srcScanKTP" name="srcScanKTP" src="<?php echo base_url('Attachment/'.$dataQuery->ScanKTP);?>" width="350" height="240"><br/>
                    <input type="file" onchange="read1URL(this);"  class="form-control "  placeholder="E-sign" id="inputScanKTP " name="inputScanKTP">
					<i>pilih browse jika akan diganti.</i><br/>
                    </div>
                    </div>
                    <div class="form-group row px-2" >
                    <label for="inputFoto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-5">
						 <img id="srcFoto" name="srcFoto"  src="<?php echo base_url('Attachment/'.$dataQuery->Foto);?>" width="180" height="240"><br/>
						<input type="file" onchange="read2URL(this);"  class="form-control "  placeholder="Pas Foto" id="inputFoto" name="inputFoto">
						<i>pilih browse jika akan diganti.</i>
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
					<label for="inputStatusKawinID" class="col-sm-2 col-form-label">Status Kawin</label>
					<div class="col-sm-5">
						<div class="form-group clearfix">
						<input type="text" hidden value="4" class="form-control" id="inputKriteriaStatusKawinID" name="inputKriteriaStatusKawinID">
							  <select id="inputStatusKawinID" name="inputStatusKawinID" class="form-control select2" style="width: 100%;">								
								<option selected="selected" value=''>Pilih</option>
								<option value='1'>Lajang</option>
								<option value='2'>Menikah</option>
								<option value='3'>Janda/Duda</option>									
							  </select>
						 </div> 
					</div>
					</div>
				</div>
				</div>
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Data Pekerjaan</h3>
				</div>				
				<div class="card-body">
                    <div class="form-group row px-2" >
                    <label for="inputNamaPekerjaan" class="col-sm-2 col-form-label">Nama Pekerjaan</label>
                    <div class="col-sm-5">
                    <input type="text" class="form-control"  value="<?php echo $dataQuery->Pekerjaan?>" placeholder="Nama Pekerjaan" id="inputNamaPekerjaan" name ="inputNamaPekerjaan">
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputRentangGajiID" class="col-sm-2 col-form-label">Rentang Gaji</label>
                    <div class="col-sm-5">
					<input type="text" hidden value="2" class="form-control" id="inputKriteriaGajiID" name="inputKriteriaGajiID">
						<select id="inputRentangGajiID" name="inputRentangGajiID" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='7'>1-2 Juta</option>
							<option value='8'>3-5 Juta</option>	
							<option value='9'>5 Juta  </option>										
						</select>
                    </div>
                    </div>                   
                    
				</div>
				</div>
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Kondisi Rumah</h3>
				</div>				
				<div class="card-body">                    
                    <div class="form-group row px-2" >
                    <label for="inputStatusHuniID" class="col-sm-2 col-form-label">Status Huni</label>
                    <div class="col-sm-5">
					    <input type="text" hidden value="3" class="form-control" id="inputStatusKriteriaHuniID" name="inputStatusKriteriaHuniID">
						<select id="inputStatusHuniID" name="inputStatusHuniID" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='10'>Rumah Kontrakan</option>
							<option value='11'>Rumah Sendiri</option>	
					    </select>
                    </div>
                    </div>
					<div class="form-group row px-2" >
                    <label for="inputTypeRumah" class="col-sm-2 col-form-label">Type Rumah</label>
                    <div class="col-sm-5">
					    <input type="text" hidden value="5" class="form-control" id="inputKriteriaTypeRumahID" name="inputKriteriaTypeRumahID">
						<select id="inputTypeRumahID" name="inputTypeRumahID" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>							
							<option value='12'>Tipe 21 </option>	
							<option value='13'>Tipe 36 </option>	
							<option value='14'>Tipe 45 </option>	
							<option value='15'>Tipe 60 </option>	
							<option value='16'>Tipe 70 </option>	
							<option value='17'>Tipe 90 </option>	
							<option value='18'>Tipe 120</option>	
							<option value='19'>Tipe 120</option>								
						</select> 
                    </div>
                    </div>                   
                  
				</div>
				</div>
				<div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Kepemilikan Kendaraan</h3>
				</div>				
				<div class="card-body">                   
                    <div class="form-group row px-2" >
                    <label for="inputKendaraanID" class="col-sm-2 col-form-label">Kendaraan</label>
                    <div class="col-sm-5">
					    <input type="text" hidden value="1" class="form-control" id="inputKriteriaKendaraanID" name="inputKriteriaKendaraanID">
						<select id="inputKendaraanID" name="inputKendaraanID" class="form-control select2" style="width: 100%;">								
							<option selected="selected" value=''>Pilih</option>
							<option value='6'>Tidak Punya</option>
							<option value='5'>Sepeda Motor</option>	
							<option value='4'>Mobil</option>	
					    </select>
                    </div>
                    </div>
					                
                  
				</div>
				</div>
				<div class="card card card-default" >
							
				<div class="card-body">
					<div class="form-group row px-2" >                   
                    <div class="col-sm-5">
						  <button type="submit" class="btn btn-info" return="<script>confirm('Anda yakin sudah mengisi data dengan benar?')</script>">Update</button> &nbsp;
						  <button type="Button" class="btn btn-default" onClick="window.location.replace('../User/Dashboard');">Cancel</button>
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

<?=$this->endSection() ?>



