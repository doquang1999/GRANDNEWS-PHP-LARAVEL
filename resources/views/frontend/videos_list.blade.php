@extends("frontend.layout_trangba")
@section("do-du-lieu")
<?php 
	$categories = DB::table("video")->orderBy("id","desc")->paginate(8);
 ?>
 <style type="text/css">
 	.content-img img
 	{
 		position: relative;
 	}
 	.image-hover1
{
	position: absolute;
	top: 0px;
	color: white;
	font-size: 28px;
	top: 33%;
	left: 45%;
	padding: 5px 12px 5px 17px;
	background: #ff3c36;
	border-radius: 150px;
}
 </style>
<div class="content-danhmuc">

<div class="row">
		@foreach($categories as $rows)
		<div class="col-sm-6 col-xs-12">
			
	
		<div class="detail-content-danhmuc">
		<div class="content-img">
			<a href="{{$rows->link}}" data-lity><img src="{{asset('upload/videos/'.$rows->photo)}}">
				<div class="image-hover image-hover1">
					<i class="fa fa-play"></i>
				</div>
			</a>
		</div>

		<h2 class="title-blogs-item">
			<a style="text-align:left;margin-top: 10px;" href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
		</h2>
		

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