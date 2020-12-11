<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>
<body width='100%' Height='100%'>
<div class="container-fluid">
<style>
tr th
{
font-size:10pt;

}

</style>
<?php // $session = session(); print_r($_SESSION); echo $_SESSION['Username']?>
 <form class="form-horizontal" autocomplete="off" action="<?php echo base_url('public/Penduduk/VerifiedAction');?>" method="post" enctype="multipart/form-data">
<div class="card card card-secondary">
              <div class="card-header">
                <h3 class="card-title">List Need Verified</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                <thead >
                    <tr>
					    <th style='font-size:10pt;'>Select</th>
                        <th style='font-size:10pt;'>No</th>
                        <th style='font-size:10pt;'>NIK</th>
                        <th style='font-size:10pt;'>Nama Warga</th>
						<th style='font-size:10pt;'>Kecamatan</th>
						<th style='font-size:10pt;'>Kelurahan</th>
						<th style='font-size:10pt;'>RW</th>
						<th style='font-size:10pt;'>RT</th>
						<th style='font-size:10pt;'>Sign Up Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=1;
                        foreach ($query->getResult() as $row)
                        
                        {?>
                            <tr class="odd gradeX">
							<td><input type="checkbox" name="pilihPendudukID[]" value="<?=$row->PendudukID;?>" /></td>
                            <td><?=$i;?></td>
                            <td><?=$row->NIK;?></td>
							<td><?=$row->NamaWarga;?></td>
							<td><?=$row->NamaKecamatan;?></td>
							<td><?=$row->NamaKelurahan;?></td>
							<td><?=$row->NomorRW;?></td>
							<td><?=$row->NomorRT;?></td>
							<td class="center"><?=$row->CreatedDate;?></td>
                            
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
<input type="submit" id="ApproveButton" class="btn btn-primary" value="Approve" onclick="return confirm('Anda yakin melakukan approval ?');"/>
   
</div>  

</form>
<?php 


?>
</body>

<?=$this->endSection() ?>


