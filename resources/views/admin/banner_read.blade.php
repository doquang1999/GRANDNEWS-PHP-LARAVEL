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
                <h1 style="font-size:16px" class="card-title">Danh sách Banner</h1>
              </div>
                
              <table class="table table-bordered table-hover">
                   
                   <thead class="thead-light">
                   <th style="width: 300px;">Ảnh</th>
                    <th style="width: 50px;">Vị trí</th>
                      <th style="width: 50px;text-align: center;">Chỉnh sửa</th>
            

                   </thead>

    <tbody>
    @foreach($data as $rows)
     <tr>
         <td>
            @if(file_exists('upload/banners/'.$rows->photo) && $rows->photo != "")
            <img style="width: 300px;" src="{{asset('upload/banners/'.$rows->photo)}}">
            @endif
        </td>
    <td>
            
            @if(isset($rows->location) && $rows->location == 1)
            <?php 
            echo "Banner Ads 1 (Height : 135px)";
             ?>
             @elseif(isset($rows->location) && $rows->location == 2)
              <?php 
            echo "Banner Ads 2 (Height : 135px)";
                ?>
              @elseif(isset($rows->location) && $rows->location == 3)
               <?php 
            echo "Banner Ads 3 (Height : 350px)";
             ?>
            @endif

    </td>
     
       
         
        <td style="text-align: center;"><a href="{{url('admin/banners/update/'.$rows->id)}}"><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="fa fa-edit"></span></button></p></a></td>


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
