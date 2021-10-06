<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/danhmuctintuc1.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/trangchu2.css')}}">
	<title>Trang chủ</title>
</head>
<body>
	<!-- header -->

	@include("frontend.header")

	<!-- /endheader -->

		<!-- main -->
		<div class="bg-gray" style="background: #f2f2f2;border-bottom: 1px solid #e1e1e1;border-top: 1px solid #e1e1e1;">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
						<div class="link-breadcrumb">
							<ol>
								<li>
									<a href="{{url('')}}">Trang chủ</a>
								</li>
								<li>
									<a class="bre-active">>> Toàn bộ tin tức</a>
								</li>
							</ol>
						</div>
						<div class="title-danhmuc">
							<h1><span><i class="fa fa-newspaper-o"></i> <i class="fa fa-newspaper-o"></i> Toàn bộ tin tức <i class="fa fa-newspaper-o"></i> <i class="fa fa-newspaper-o"></i></span></h1>
						</div>

					</div>
				</div>
			</div>
		</div>	

		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<div class="row">
						<div class="col-sm-8">
							
					<!-- load lay out vào đây -->
					
<?php 
	$categories = DB::table("news")->orderBy("id","desc")->paginate(8);
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
		<div style="font-size:12px;" class="content-desc">
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

							<!-- load lay out vào đây -->
					</div>
					<?php 
					$photo3 = DB::table("banner")->where("location","=","3")->first();
					 ?>
					<div class="col-sm-4">
							<div class="right-danhmuc">
								<img style="width: 100%;object-fit: cover;" src="{{asset('upload/banners/'.$photo3->photo)}}">
								
							</div>

							<div class="category">
								<div class="category-title">
									<a href=""><i class="fa fa-list-alt"></i> DANH MỤC TIN TỨC</a>
									<div class="category-list">
										<?php 
										$categories = DB::select("select * from categories order by id desc");
										?>
								 			
										<ul>
											 @foreach($categories as $rows)
											<li>
												<a href="{{url('/news/category/'.$rows->id)}}"><i class="fa fa-angle-double-right"></i> {{$rows->name}}</a>
											</li>
											@endforeach

										</ul>
									</div>
								</div>
							</div>

							<div class="hot-news">
									<div class="title-widget">
										<h2>
											<span>
												Bài viết phổ biến
											</span>
										</h2>
										<span class="sub-title"></span>
									</div>
									<?php 
									$newsgannhat2 = DB::select("select * from news where hot = 1 order by id desc limit 0,10");
						 			?>
						 			@foreach($newsgannhat2 as $rows)
									<div class="mini-hotnew">
											<div class="mini-hot-new-img">
								
												<a href="{{url('/news/detail/'.$rows->id)}}"><img style="height: 70px" src="{{asset('upload/news/'.$rows->photo)}}"><p>{{$rows->title}}</p></a>
										
													<p style="color:black;font-size: 12px;padding-left:2px;" class="more-blogs">
													<span class="time">
											<i class="fa fa-clock-o"></i>
													 <?php 
											 echo date(" H:i - d/m/Y",strtotime($rows->date));
											  ?> 
											</span>
													</p>
											</div>

									</div>
									@endforeach

									

									




							</div>


					</div>
					</div>
				</div>
			</div>
		</div>	
		<!-- end main -->




		<!-- footer -->

		@include("frontend.footer")

		<!-- /footer -->



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>