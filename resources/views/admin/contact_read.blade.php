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
         
          </div>
        <div class="table-responsive">
            <div class="card card-info">
              <div class="card-header">
                <h1 style="font-size:16px" class="card-title">Danh sách liên hệ</h1>
              </div>
                
              <table class="table table-bordered table-hover">
                   
                   <thead class="thead-light">
                   <th style="width: 80px;">Họ tên</th>
                    <th style="width: 150px;">Tiêu đề</th>
                    <th style="width: 30px;">Ngày liên hệ</th>
                    <th style="width: 50px;">Trạng thái</th>
                    <th style="width: 50px;text-align: center;">Chi tiết</th>
                     <th style="width: 50px;text-align: center;">Xóa</th>

                   </thead>

    <tbody>
    @foreach($data as $rows)
     <tr @if($rows->active == 0)
         style="background:#ddd;font-weight:bold;"
      @endif >
    <td>{{$rows->name}}</td>
        <td>{{$rows->title}}</td>
    
          <td>
            <?php 
            echo date("H:i - d/m/Y",strtotime($rows->date));
             ?>
          </td>
          <td>
            @if($rows->active == 0)
            <?php 
            echo "Chưa đọc";
             ?>
            @elseif($rows->active == 1)
            <?php 
            echo "Đã đọc";
             ?>
            @endif
          </td>
      <td style="text-align:center;">
          <a href="{{url('admin/contact/detail/'.$rows->id)}}" class="badge badge-info">Chi tiết</a>
        </td>




            <td style="text-align:center;"><a href="{{url('admin/contact/delete/'.$rows->id)}}"onclick="return window.confirm('Are you sure?');"><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="fa fa-trash"></span></button></p></a></td>
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
