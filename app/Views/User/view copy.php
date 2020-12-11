
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

<section class="panel panel-default">
    <header class="panel-heading">
        <div class="row">
            <div class="col-md-8 col-xs-3">                
                <?php
                      echo anchor(
                               site_url('u_user/add'),
                                '<i class="glyphicon glyphicon-plus"></i> Tambah',
                                'class="btn btn-success btn-sm" data-tooltip="tooltip" data-placement="top" title="Tambah Data"'
                              );
                ?>
            </div>
            <div class="col-md-4 col-xs-9">
                                           
                 <?php echo form_open(site_url('u_user/search'), 'role="search" class="form"') ;?>       
                           <div class="input-group pull-right">                      
                                 <input type="text" class="form-control input-sm" placeholder="Cari data" name="q" autocomplete="off"> 
                                 <span class="input-group-btn">
                                      <button class="btn btn-primary btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i> Cari</button>
                                 </span>
                           </div>
                           
               </form> 
                <?php echo form_close(); ?>
            </div>
        </div>
    </header>
    
    
    <div class="panel-body">
         <?php if ($u_users) : ?>
          <table class="table table-hover table-condensed">
              
            <thead>
              <tr>
                <th class="header">#</th>
                
                    <th>Username</th>   
                
                    <th>Password</th>   
                
                    <th>RoleID</th>   
                
                    <th>IsDeleted</th>   
                
                    <th>CreatedDate</th>   
                
                    <th>CreatedBy</th>   
                
                    <th>UpdatedDate</th>   
                
                    <th>UpdatedBy</th>   
                
                <th class="red header" align="right" width="120">Aksi</th>
              </tr>
            </thead>
            
            
            <tbody>
             
               <?php foreach ($u_users as $u_user) : ?>
              <tr>
              	<td><?php echo $number++;; ?> </td>
               
               <td><?php echo $u_user['Username']; ?></td>
               
               <td><?php echo $u_user['Password']; ?></td>
               
               <td><?php echo $u_user['RoleID']; ?></td>
               
               <td><?php echo $u_user['IsDeleted']; ?></td>
               
               <td><?php echo $u_user['CreatedDate']; ?></td>
               
               <td><?php echo $u_user['CreatedBy']; ?></td>
               
               <td><?php echo $u_user['UpdatedDate']; ?></td>
               
               <td><?php echo $u_user['UpdatedBy']; ?></td>
               
                <td nowrap>    
                    
                    <?php
                                  echo anchor(
                                          site_url('u_user/show/' . $u_user['UserID']),
                                            '<i class="glyphicon glyphicon-eye-open"></i>',
                                            'class="btn btn-sm btn-info" data-tooltip="tooltip" data-placement="top" title="Detail"'
                                          );
                   ?>
                    
                    <?php
                                  echo anchor(
                                          site_url('u_user/edit/' . $u_user['UserID']),
                                            '<i class="glyphicon glyphicon-edit"></i>',
                                            'class="btn btn-sm btn-success" data-tooltip="tooltip" data-placement="top" title="Edit"'
                                          );
                   ?>
                   
                   <?php
                                  echo anchor(
                                          site_url('u_user/destroy/' . $u_user['UserID']),
                                            '<i class="glyphicon glyphicon-trash"></i>',
                                            'onclick="return confirm(\'Apakah anda yakin ingin menghapus?\');" class="btn btn-sm btn-danger" data-tooltip="tooltip" data-placement="top" title="Hapus"'
                                          );
                   ?>   
                                 
                </td>
              </tr>     
               <?php endforeach; ?>
            </tbody>
          </table>
          <?php else: ?>
                <?php  echo notify('Data u_user belum tersedia','info');?>
          <?php endif; ?>
    </div>
    
    
    <div class="panel-footer">
        <div class="row">
           <div class="col-md-3">
               U User
               <span class="label label-info">
                    <?php echo $total; ?>
               </span>
           </div>  
           <div class="col-md-9">
                 <?php echo $pagination; ?>
           </div>
        </div>
    </div>
</section>