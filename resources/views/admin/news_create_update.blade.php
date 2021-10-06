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
                <h3 class="card-title">Tin tức</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form method="post" enctype="multipart/form-data" action="">
                @csrf
               <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                   <input type="text" value="<?php echo isset($record->title)?$record->title:""; ?>" name="title" class="form-control" required>
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                     <select name="category_id" class="form-control" style="width: 300px;">
                    <?php 
                    // có thể dụng full sql để truy vấn
                    $category = DB::select("select * from categories order by id desc");

                     ?>
                     <option value=""></option>
                     @foreach($category as $rows)
                    <option @if(isset($record->categories_id)&&$record->categories_id == $rows->id) selected @endif value="{{$rows->id}}">{{$rows->name}}</option>        
                    @endforeach
                    </select>
                  </div>

                     <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea name="description"><?php echo isset($record->description)?$record->description:""; ?></textarea>
                    <script type="text/javascript">
                      CKEDITOR.replace("description");
                    </script>
                  </div>

                         <div class="form-group">
                    <label for="exampleInputEmail1">Content</label>
                    <textarea name="content"><?php echo isset($record->content)?$record->content:""; ?></textarea>
                    <script type="text/javascript">
                      CKEDITOR.replace("content",{
                        height:500
                      });
                    </script>
                  </div>

                   <div class="form-group">
                    <input type="checkbox" name="hot" @if(isset($record->hot)&&$record->hot == 1) checked @endif>&nbsp;&nbsp;&nbsp; <strong>Hot</strong>
                  </div>

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