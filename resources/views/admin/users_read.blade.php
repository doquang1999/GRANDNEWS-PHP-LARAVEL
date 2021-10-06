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
            <a href="{{url('admin/users/create')}}" class="btn btn-info">Thêm mới người dùng</a>
          </div>
        <div class="table-responsive">
            <div class="card card-info">
              <div class="card-header">
                <h1 style="font-size:16px" class="card-title">Danh sách người dùng</h1>
              </div>
                
              <table class="table table-bordered table-hover">
                   
                   <thead class="thead-light">
                   <th>Tên người dùng</th>
                     <th>Email</th>
                      <th style="width: 100px;text-align: center;">Chỉnh sửa</th>
                       <th style="width: 100px;text-align: center;">Xóa</th>

                   </thead>

    <tbody>
    @foreach($data as $rows)
     <tr>

    <td>{{$rows->name}}</td>
    <td>{{$rows->email}}</td>

        <td style="text-align: center;"><a href="{{url('admin/users/update/'.$rows->id)}}"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></p></a></td>


            <td style="text-align:center;"><a href="{{url('admin/users/delete/'.$rows->id)}}"onclick="return window.confirm('Are you sure?');"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></a></td>
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
