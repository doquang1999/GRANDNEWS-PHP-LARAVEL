@extends("admin.layout")
@section("do-du-lieu")
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | jsGrid</title>

<!------ Include the above in your HEAD tag ---------->

</head>
<body>
<div class="container-fluid">
  <div class="row">
    
        
        <div class="col-md-12">
          <div style="padding-bottom: 10px;">
            <a href="{{url('admin/news/create')}}" class="btn btn-info">Thêm mới bản tin</a>
          </div>
        <div class="table-responsive">
            <div class="card card-info">
              <div class="card-header">
                <h1 style="font-size:16px" class="card-title">Danh sách bản tin</h1>
              </div>
                
              <table class="table table-bordered table-hover">
                   
                   <thead class="thead-light">
                   <th style="width: 200px;">Photo</th>
                    <th style="width: 200px;">Title</th>
                     <th style="width: 150px;">Category</th>
                      <th style="width: 100px;">Date</th>
                      <th style="width: 100px;">Người đăng</th>
                      <th style="width: 50px;">Hot</th>
                      <th style="width: 50px;text-align: center;">Chỉnh sửa</th>
                       <th style="width: 50px;text-align: center;">Xóa</th>

                   </thead>

    <tbody>
    @foreach($data as $rows)
     <tr>
         <td>
            @if(file_exists('upload/news/'.$rows->photo) && $rows->photo != "")
            <img style="width: 150px;" src="{{asset('upload/news/'.$rows->photo)}}">
            @endif
        </td>
    <td>{{$rows->title}}</td>
            <td>
              <!-- có thể thực hiện truy vấn trực tiếp tại view -->
              <?php 
              $category = DB::table("categories")->where("id","=",$rows->categories_id)->first();


              echo isset($category->name)?$category->name:"";
               ?>
          </td>
          <td>
              <?php 
            echo date("H:i - d/m/Y",strtotime($rows->date));
             ?>
          </td>
          <td>
            {{$rows->tacgia}}
          </td>
                 <td>
                  @if($rows->hot == 1)
                  <span class="fa fa-check"></span>
                  @endif
                  </td>
        <td style="text-align: center;"><a href="{{url('admin/news/update/'.$rows->id)}}"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></p></a></td>


            <td style="text-align:center;"><a href="{{url('admin/news/delete/'.$rows->id)}}"onclick="return window.confirm('Are you sure?');"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></a></td>
</tr>

     @endforeach

    </tbody>
        
</table>

        
            </div>
            {{$data->links("pagination::bootstrap-4")}} 
            <style type="text/css">
         
            </style>  
        </div>
  </div>
</div>
</div>




</body>
</html>
@endsection
