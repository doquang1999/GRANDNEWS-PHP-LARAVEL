
@extends("admin.layout")
@section("do-du-lieu")
              <div class="container-fluid">
  <div class="row">

<?php 
        $query = DB::table('contact')->where("id",'=',$record->id)->first();
      
 ?>
        <div class="table-responsive">
            <div class="card card-success">
              <div class="card-header">
                <h1 style="font-size:16px" class="card-title">Thông tin liên hệ</h1>
              </div>
                
                <table class="table table-bordered">
                <tr>
                    <th style="width:150px;">Họ tên</th>
                    <th><?php echo $query->name; ?></th>
                </tr>
               
                <tr>
                    <th style="width:150px;">Số điện thoại</th>
                    <th><?php echo $query->sdt; ?></th>
                </tr>
                  <tr>
                    <th style="width:150px;">Email</th>
                    <th><?php echo $query->email; ?></th>
                </tr>
                 <tr>
                    <th style="width:150px;">Tiêu đề</th>
                    <th><?php echo $query->title; ?></th>
                </tr>
                <tr>
                    <th style="width:150px;">Ghi chú</th>
                    <th><textarea name="ghichu"><?php echo $query->content; ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("ghichu");
                        </script></th>
                </tr>
            </table>
            <div class="card-footer">
                  <div style="padding-bottom: 10px;padding-right:20px ;float: left;">
            <a href="{{url('admin/contact')}}" class="btn btn-success"><i class="fa fa-arrow-left"></i> Trở lại</a>
          </div>
     
            </div> 
           </div>
       </div>


        





                
            </div>
            
        </div>
  @endsection