<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/trangchu2.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/chitiet1.css')}}">

	<title>Trang chủ</title>
</head>
<body>
	<!-- header -->

	@include("frontend.header")

	<!-- /endheader -->
		<?php 

		$news = DB::table("news")->where("id","=",$id)->first();
		$category = DB::table("categories")->where("id","=",$news->categories_id)->first();
	 	?>
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
									<a href="{{url('/news/category/'.$news->categories_id)}}">>> {{$category->name}}</a>
								</li>
								<li>
								<li>
									<a href="" class="bre-active">>> {{$news->title}}</a>
								</li>
								 
							</ol>
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
					
						<div class="content-chitiet">
									<div class="chitiet-title">
										<p class="title-chitiet">{{$news->title}}</p>

										<p style="font-size: 12px;font-weight: 0px;" class="more-blogs">

											<span class="time">
												<span style="display: inline;" class="tacgia">{{$news->tacgia}}</span> 
									<i class="fa fa-clock-o"></i>
									 <?php 
									 echo date(" H:i - d/m/Y",strtotime($news->date));
	 									?>
									</span>

									</p>

									</div>
									<div style="margin-bottom: 20px;" class="fb-like pull-right" data-href="https://grandnews-devpro.000webhostapp.com/public/" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="true"></div>
									<div class="chitiet-share">
											
              						  <!-- Go to www.addthis.com/dashboard to customize your tools -->
               					 <div class="addthis_inline_share_toolbox_o2ct"></div>
            					
									</div>

									<div class="chitiet-img">
										<img src="{{asset('upload/news/'.$news->photo)}}">
									</div>

									<div class="short-desc">
									<p>{!! $news->description !!}</p>
									</div>
									<div class="chitiet-detail-desc">
										<p>
										{!! $news->content !!}	
										</p>
									</div>
									<div class="addthis_tipjar_inline"></div>
									<div style="margin-top:30px;border-top: 1px solid #e9ebee;" class="binhluan">
									<div class="fb-comments" data-href="http://hermer.byethost7.com/" data-width="100%" data-numposts="5"></div>
									</div>
									

							</div>
							<?php 
							$xuhuongnews1 = DB::select("select * from news where hot = '1' order by id desc limit 0,2;");
							 ?>
							<div class="xuhuong">
								<div class="xuhuong-title">
									<h1>Xu hướng mới</h1>
								</div>
								<div class="content-xuhuong">
									<div class="row">
									@foreach($xuhuongnews1 as $rows)
									<div class="col-sm-6 col-xs-12">
											<div class="top-danhmuc-img">
											<div class="img-top-danhmuc">
											<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
										</div>
										<a class="short-desc-xuhuong" href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
											<p class="more-blogs danhmuc-blogs">
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


							<!-- load lay out vào đây -->
					<?php 
					$photo3 = DB::table("banner")->where("location","=","3")->first();
					 ?>
					</div>
					<div class="col-sm-4">
							<div class="right-danhmuc">
								
									<img style="width: 100%;height: 350px;object-fit: cover;" src="{{asset('upload/banners/'.$photo3->photo)}}">
							
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
								
												<a href="{{url('/news/detail/'.$rows->id)}}"><img style="height: 70px" src="{{asset('upload/news/'.$rows->photo)}}"><p class="deobiet">{{$rows->title}}</p></a>
										
													<p style="color: black;font-size: 12px;" class="more-blogs">
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
		<style type="text/css">
		.chitiet-detail-desc p img
		{
			width: 100%;
			object-fit: cover;
			
		}
		.chitiet-detail-desc p img
		{
			max-width: 100%;
			max-height: 730px;

		
			
		}
		.chitiet-detail-desc p a
		{
			text-decoration: none;
			color: #ff3d36;
		}
		</style>
		<!-- end main -->




		<!-- footer -->

		@include("frontend.footer")

		<!-- /footer -->


	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=369019758274807&autoLogAppEvents=1" nonce="Yd8Fc0XY"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>

</html>