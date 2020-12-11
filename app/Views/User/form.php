
<h2>U User</h2>

<?php 
    echo $this->session->flashdata('notify');
?>


<!-- <div class="row">
    <div class="col-lg-12 col-md-12">        
        <?php 
                
                echo create_breadcrumb();        
                echo $this->session->flashdata('notify');
                
    ?>
    </div>
</div> -->

<?php echo form_open(site_url('u_user/' . $action),'role="form" class="form-horizontal" id="form_u_user" parsley-validate'); ?>               
<div class="panel panel-default">
    <div class="panel-heading"><i class="glyphicon glyphicon-edit"></i> </div>
     
      <div class="panel-body">
         
                       
               <div class="form-group">
                   <label for="Username" class="col-sm-2 control-label">Username</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'Username',
                                 'id'           => 'Username',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Username',
                                 'maxlength'=>'50'
                                 ),
                                 set_value('Username',$u_user['Username'])
                           );             
                  ?>
                 <?php echo form_error('Username');?>
                </div>
              </div> <!--/ Username -->
                          
               <div class="form-group">
                   <label for="Password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'Password',
                                 'id'           => 'Password',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'Password',
                                 'maxlength'=>'100'
                                 ),
                                 set_value('Password',$u_user['Password'])
                           );             
                  ?>
                 <?php echo form_error('Password');?>
                </div>
              </div> <!--/ Password -->
                          
               <div class="form-group">
                   <label for="RoleID" class="col-sm-2 control-label">RoleID</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'RoleID',
                                 'id'           => 'RoleID',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'RoleID',
                                 'maxlength'=>'11'
                                 ),
                                 set_value('RoleID',$u_user['RoleID'])
                           );             
                  ?>
                 <?php echo form_error('RoleID');?>
                </div>
              </div> <!--/ RoleID -->
                          
               <div class="form-group">
                   <label for="CreatedDate" class="col-sm-2 control-label">CreatedDate</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'CreatedDate',
                                 'id'           => 'CreatedDate',                       
                                 'class'        => 'form-control input-sm tanggal ',
                                 'placeholder'  => 'CreatedDate',
                                 
                                 ),
                                 set_value('CreatedDate',$u_user['CreatedDate'])
                           );             
                  ?>
                 <?php echo form_error('CreatedDate');?>
                </div>
              </div> <!--/ CreatedDate -->
                          
               <div class="form-group">
                   <label for="CreatedBy" class="col-sm-2 control-label">CreatedBy</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'CreatedBy',
                                 'id'           => 'CreatedBy',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'CreatedBy',
                                 'maxlength'=>'20'
                                 ),
                                 set_value('CreatedBy',$u_user['CreatedBy'])
                           );             
                  ?>
                 <?php echo form_error('CreatedBy');?>
                </div>
              </div> <!--/ CreatedBy -->
                          
               <div class="form-group">
                   <label for="UpdatedDate" class="col-sm-2 control-label">UpdatedDate</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'UpdatedDate',
                                 'id'           => 'UpdatedDate',                       
                                 'class'        => 'form-control input-sm tanggal ',
                                 'placeholder'  => 'UpdatedDate',
                                 
                                 ),
                                 set_value('UpdatedDate',$u_user['UpdatedDate'])
                           );             
                  ?>
                 <?php echo form_error('UpdatedDate');?>
                </div>
              </div> <!--/ UpdatedDate -->
                          
               <div class="form-group">
                   <label for="UpdatedBy" class="col-sm-2 control-label">UpdatedBy</label>
                <div class="col-sm-6">                                   
                  <?php                  
                   echo form_input(
                                array(
                                 'name'         => 'UpdatedBy',
                                 'id'           => 'UpdatedBy',                       
                                 'class'        => 'form-control input-sm ',
                                 'placeholder'  => 'UpdatedBy',
                                 'maxlength'=>'20'
                                 ),
                                 set_value('UpdatedBy',$u_user['UpdatedBy'])
                           );             
                  ?>
                 <?php echo form_error('UpdatedBy');?>
                </div>
              </div> <!--/ UpdatedBy -->
               
           
      </div> <!--/ Panel Body -->
    <div class="panel-footer">   
          <div class="row"> 
              <!-- <div class="col-md-10 col-sm-12 col-md-offset-2 col-sm-offset-0"> -->
              <div class="col-md-12 col-sm-12 col-lg-12 text-right">

                   <a href="<?php echo site_url('u_user'); ?>" class="btn btn-default">
                       <i class="glyphicon glyphicon-chevron-left"></i> Kembali
                   </a> 
                    <button type="submit" class="btn btn-primary" name="post">
                        <i class="glyphicon glyphicon-floppy-save"></i> Simpan 
                    </button>                  
              </div>
          </div>
    </div><!--/ Panel Footer -->       
</div><!--/ Panel -->
<?php echo form_close(); ?>  