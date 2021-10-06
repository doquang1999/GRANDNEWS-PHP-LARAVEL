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
            <a href="{{url('admin/videos/create')}}" class="btn btn-info">Thêm mới video</a>
          </div>
        <div class="table-responsive">
            <div class="card card-info">
              <div class="card-header">
                <h1 style="font-size:16px" class="card-title">Danh sách video</h1>
              </div>
                
              <table class="table table-bordered table-hover">
                   
                   <thead class="thead-light">
                   <th style="width: 200px;">Ảnh thumbnail</th>
                    <th style="width: 200px;">Title</th>
                     <th style="width: 150px;">Link</th>
                      <th style="width: 50px;text-align: center;">Chỉnh sửa</th>
                       <th style="width: 50px;text-align: center;">Xóa</th>

                   </thead>

    <tbody>
    @foreach($data as $rows)
     <tr>
         <td>
            @if(file_exists('upload/videos/'.$rows->photo) && $rows->photo != "")
            <img style="width: 150px;" src="{{asset('upload/videos/'.$rows->photo)}}">
            @endif
        </td>
    <td>{{$rows->title}}</td>
    <td>{{$rows->link}}</td>
     
       
         
        <td style="text-align: center;"><a href="{{url('admin/videos/update/'.$rows->id)}}"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></p></a></td>


            <td style="text-align:center;"><a href="{{url('admin/videos/delete/'.$rows->id)}}"onclick="return window.confirm('Are you sure?');"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></a></td>
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
