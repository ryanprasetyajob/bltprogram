<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>
 <script src="<?php echo base_url('public/JS/jquery-3.5.1.js') ; ?>"></script>
<body width='100%' Height='100%'>
<div class="container-fluid">
<style>
tr th
{
font-size:10pt;

}

</style>
<?php
    $query=$data['query'];
	$listKecamatan=$data['dataKec']->getResult();
	$listKelurahan=$data['dataKel']->getResult();
?>
<script>
$(document).ready(function()
{
	
	//getKecamatan('64');	
	$("#inputKecamatanID").on('change', function() {
		alert($("#inputKecamatanID").val());
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
	$("#btnDialogList").on('click', function() {
		getRT($("#inputKecamatanID").val(),$("#inputKelurahanID").val(),$("#inputRwID").val());
	});
	 
});
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
<?php // $session = session(); print_r($_SESSION); echo $_SESSION['Username']?>
<div class="card card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Master Program</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                <thead >
                    <tr>
                        <th style='font-size:10pt;vertical-align: middle;'>No</th>
                        <th style='font-size:10pt;vertical-align: middle;'>Program Name</th>
						<th style='font-size:10pt;vertical-align: middle;'>Month <br/>Duration</th>
                        <th style='font-size:10pt;vertical-align: middle;'>Efective Date</th>
						<th style='font-size:10pt;vertical-align: middle;'>Expired Date</th>
						<th style='font-size:10pt;vertical-align: middle;'>Uang Tunai</th>
						<th style='font-size:10pt;vertical-align: middle;'>Non Tunai</th>
						<th style='font-size:10pt;vertical-align: middle;'>Kuota @RT</th>
						<th style='font-size:10pt;vertical-align: middle;'>Kecamatan</th>
						<th style='font-size:10pt;vertical-align: middle;'>Kelurahan</th>
						<th style='font-size:10pt;vertical-align: middle;'>RW Joined</th>
						<th style='font-size:10pt;vertical-align: middle;'>RT Joined</th>
						<th style='font-size:10pt;vertical-align: middle;'>Action</th>						
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                        foreach ($query->getResult() as $row)
                        
                        {?>
                            <tr class="odd gradeX">
                            <td><?=$i;?></td>
                            <td><?=$row->ProgramName;?>
								<input hidden type="text" value="<?=$row->ProgramID;?>"/>
								<input hidden type="text" value="<?=$row->ProgramName;?>"/>
								<input hidden type="text" value="<?=$row->KabupatenKotaID;?>"/>
								<input hidden type="text" value="<?=$row->KecamatanID;?>"/>
								<input hidden type="text" value="<?=$row->KelurahanID;?>"/>
							</td>
							<td><?=$row->MonthDuration;?></td>
							<td><?=$row->StartDate;?></td>
							<td><?=$row->EndDate;?></td>							
							<td><?=number_format($row->NominalTunai,0);?></td>
							<td><?=$row->BarangNonTunai;?></td>
							<td><?=$row->KuotaProgram;?></td>
                            <td><?=$row->NamaKecamatan;?></td>
							<td><?=$row->NamaKelurahan;?></td>
							<td><?=$row->RTJoined;?></td>
							<td><?=$row->RTJoined;?></td>
							<td>
								<!--<input type="button" value='get'  OnClick="msg(this)"/>-->
								<script>
								function msg(data) {
								  var ProgramID = $(data).parent().parent().find("input:eq(0)").val();
								  var PrograName = $(data).parent().parent().find("input:eq(1)").val();
								  var KabupatenKotaID = $(data).parent().parent().find("input:eq(2)").val();
								  var KecamatanID = $(data).parent().parent().find("input:eq(3)").val();
								  var KelurahanID = $(data).parent().parent().find("input:eq(4)").val();
								  getKecamatan(KabupatenKotaID);								  
								  getKelurahan(KecamatanID);
								  
								  $('#inputProgramName').val(PrograName);
								  $('#inputProgramID').val(ProgramID);
								  $('#inputKabupatenKotaID').val(KabupatenKotaID);
								  $('#inputKecamatanID').val(KecamatanID);
								  $('#inputKelurahanID').val(KelurahanID);
								  
								}
								</script>
								<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" OnClick="msg(this)" data-target="#myModal" id="btnDialogList" >Open</button>
							</td>
                        </tr>                   
                    <?php 
                    $i+=1;   
                    }
                    ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>

   
</div>  

<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <B>Mendaftarkan RT kedalam Program</B></br>
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2">Add</button>
		 <table class="table table-bordered">
                <thead >
                    <tr>
                        <th style='font-size:10pt;vertical-align: middle;'>No</th>
						<th style='font-size:10pt;vertical-align: middle;'>Proposal Number </th>
                        <th style='font-size:10pt;vertical-align: middle;'>Program Name</th>					
						<th style='font-size:10pt;vertical-align: middle;'>Kecamatan</th>
						<th style='font-size:10pt;vertical-align: middle;'>Kelurahan</th>
						<th style='font-size:10pt;vertical-align: middle;'>RW</th>
						<th style='font-size:10pt;vertical-align: middle;'>RT</th>
						<th style='font-size:10pt;vertical-align: middle;'>Action</th>						
                    </tr>
                </thead>
				<tbody>
							<td></td>
							<td></td>
							<td></td>
							<td></td><td></td><td></td>
							<td></td>
							<td><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal2">Delete</button></td>
							
				</tbody>
         </table>
                <tbody>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>	
</div>
</div>
<div id="myModal2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
	  <div class="card card card-default" >
				<div class="card-header">
					<h3 class="card-title">Alamat Lengkap</h3>
				</div>
				<div class="card-body">
						<div class="form-group row px-2" >
						<label for="inputAlamat" class="col-sm-2 col-form-label">Program Name</label>
						<div class="col-sm-5">
						<input type="text" readonly class="form-control" id="inputProgramName" name="inputProgramName" placeholder="">
						<input type="text" hidden class="form-control" id="inputProgramID" name="inputProgramID" placeholder="">
						<input type="text" hidden class="form-control" id="inputKabupatenKotaID" name="inputKabupatenKotaID" placeholder="">
						
						</div>
						</div>	
											   
						<div class="form-group row px-2" >
						<label for="inputKecamatanID" class="col-sm-2 col-form-label">Kecamatan</label>
						<div class="col-sm-5">									
								<select class="form-control select2" style="width: 100%;" id="inputKecamatanID" name='inputKecamatanID'>
									
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
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
   </div>
  </div>
<?php 


?>
</body>

<?=$this->endSection() ?>


