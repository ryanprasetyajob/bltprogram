<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>
<body width='100%' Height='100%'>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <h2>Master User</h2>
            <table class="table table-bordered table-striped table-sm">
            <thead>
            <tr>
                <th>No</th>
                <th>User Name</th>
                <th>CreatedDate</th>
            </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
                foreach ($datauser as $row)
                
                {?>
                    <tr class="odd gradeX">
                    <td><?=$i;?></td>
                    <td><?=$row['Username'];?></td>
                    <td class="center"><?=$row['CreatedDate'];?></td>
                    
                </tr>                   
               <?php 
            $i+=1;   
            }
            ?>
           
           
            </tbody>
           
            </table>
            <?php 
            echo 'Total Row='.$config['total_rows'];
            ?>
        </div>
    </div>
</div>  
</body>

<?=$this->endSection() ?>


