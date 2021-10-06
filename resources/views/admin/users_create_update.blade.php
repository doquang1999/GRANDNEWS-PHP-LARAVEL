@extends("admin.layout")
@section("do-du-lieu")
      <div class="col-md-12">
     <?php 
     if(isset($_GET["notify"])&&$_GET["notify"]=="email-exists"): ?>
    <div class="alert alert-warning">Email đã tồn tại</div>
  <?php 
endif;
   ?>
 </div>
 <!-- Main content -->
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="">
                @csrf
               <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                   <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                   <input type="email" value="<?php echo isset($record->email)?$record->email:""; ?>" <?php if(isset($record->email)): ?> disabled <?php else: ?> required <?php endif; ?> name="email" class="form-control">
                  </div>

                   <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" @if(isset($record->email)) placeholder="Không đổi password thì không nhập thông tin vào ô textbox này" <?php else: ?> required @endif class="form-control">
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