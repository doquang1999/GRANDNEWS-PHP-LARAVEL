@extends("admin.layout")
@section("do-du-lieu")

 <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Banner Ads</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="">
                @csrf
               <div class="card-body">      

                    <div class="form-group">
                    <label for="exampleInputEmail1">Photo</label>
                   <input style="height: 45px;" type="file" name="photo" class="form-control" >
                  </div>
    
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Xong</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection