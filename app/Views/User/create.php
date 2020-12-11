<?=$this->extend('MainLayout.php') ?>
<?=$this->section('content') ?>

<div class="container-fluid">
    <div class="card-body">
    
      <!-- Horizontal Form -->
      <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Horizontal Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal">
                <div class="card-body">
                  <div class="form-group row px-3" >
                    <label for="inputEmail3" class="col-sm-1 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group row px-3">
                    <label for="inputPassword3" class="col-sm-1 col-form-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row px-3">
                    <div class="offset-sm-1 col-sm-5">
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2">
                        <label class="form-check-label" for="exampleCheck2">Remember me</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer col-sm-5">
                  <button type="submit" class="btn btn-info">Sign in</button> &nbsp;
                  <button type="submit" class="btn btn-default">Cancel</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
    </div>
</div>

<?=$this->endSection() ?>


