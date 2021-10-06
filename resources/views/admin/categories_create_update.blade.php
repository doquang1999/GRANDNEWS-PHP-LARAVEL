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
                <h3 class="card-title">Danh mục</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="">
                @csrf
               <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                   <input type="text" value="<?php echo isset($record->name)?$record->name:""; ?>" name="name" class="form-control" required>
                  </div>

                    <div class="form-group">
                    <label for="exampleInputEmail1">Hiển thị trên trang chủ &nbsp;&nbsp;&nbsp;</label>
                   <input type="checkbox" name="display_home" @if(isset($record->display_home) && $record->display_home == 1) checked @endif> 

                  </div>

                   <div class="form-group">
                    <label for="exampleInputEmail1">Vị trí danh mục</label>
                   <select name="location" class="form-control" required>
                     <option value="1" <?php if (isset($record->location)&&$record->location == 1): ?>
                       selected
                     <?php endif ?>>Danh mục chính</option>
                     <option value="2" <?php if (isset($record->location)&&$record->location == 2): ?>
                       selected
                     <?php endif ?>>Danh mục phụ</option>
                   </select>
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