@extends("frontend.layout_trangthu")
@section("do-du-lieu")
<?php 
	$categories = DB::table("news")->where("categories_id","=",$categories_id)->paginate(8);
 ?>
<div class="content-danhmuc">

<div class="row">
		@foreach($categories as $rows)
		<div class="col-sm-6 col-xs-12">
			
	
		<div class="detail-content-danhmuc">
		<div class="content-img">
			<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
		</div>
			<p style="color: black;font-size: 12px;padding-top: 10px;" class="more-blogs">
			<span class="time">
				<span class="tacgia">{{$rows->tacgia}}</span>
				<i class="fa fa-clock-o"></i>
				 	<?php 
					 echo date(" H:i - d/m/Y",strtotime($rows->date));
				 	 ?>
			</span>
		</p>
		<h2 class="title-blogs-item">
			<a style="text-align:justify;" href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
		</h2>
		<div class="content-desc">
				{!! $rows->description !!}
		</div>

		</div>
		</div>
		@endforeach




		</div>


		<div class="phantrang">
			<div class="phan-trang">
			{{$categories->links("pagination::bootstrap-4")}}
		</div>
		</div>
		<style type="text/css">
			.page-item.active .page-link
			{
				
				font-size: 12px;

			}
			.page-item.disabled .page-link
			{
				font-size: 12px;
			}
			.title-blogs-item
			{
				margin-top: -10px;
			}
			.title-blogs-item a
			{
				padding: 2.5px 0px;
			}
		

		</style>


</div>
@endsection