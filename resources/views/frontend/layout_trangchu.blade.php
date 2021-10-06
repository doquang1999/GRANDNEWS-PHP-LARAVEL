<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/trangchu2.css')}}">
	<link rel="stylesheet" href="{{asset('frontend/lity-2.4.1/dist/lity.css')}}">
	<script src="{{asset('admin/jquery/jquery.min.js')}}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.min.css"/>

	<title>Trang chủ</title>
</head>
<body>
	<!-- header -->

	@include("frontend.header")

	<!-- /endheader -->
		<!-- main -->
		<div class="main">
			<!-- xu hướng -->
			<div style="height:80px" class="xuhuong">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
							<div class="block-news box-product news-trending">
									<ul class="nav_title">
										<li>
											<a><i class="fa fa-bolt"></i> XU HƯỚNG</a>
										</li>
									</ul>

							</div>
							
<!-- Set up your HTML -->
<div class="owl-carousel owl-theme mt-5">
				<?php 
			$slider = DB::select("select * from news where hot = '1' order by id desc");
			 ?>
			 @foreach($slider as $rows)
        <div class="item">
        	<a href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
        </div>
        @endforeach
       

       
 </div>
  <script>
  jQuery(document).ready(function($){
    $('.owl-carousel').owlCarousel({
      margin:10,
      items:1,
      dots:false,
      nav:true,
      loop:true,
      autoplay:true,
      navText : ["<i class='fa fa-caret-left'></i>","<i class='fa fa-caret-right'></i>"],
    })
  })
  </script>



						
						
						</div>
					</div>
				</div>	
			</div>


			<!-- /xu hướng -->
			<?php 
			$xuhuongnews = DB::select("select * from news where hot = '1' order by id desc limit 0,1;");
			$xuhuongnews1 = DB::select("select * from news where hot = '1' order by id desc limit 1,2;");
			 ?>
			<!-- content xu hướng -->
			<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 col-xs-12">
			<div class="contentxuhuong">
					<div class="row">
						@foreach($xuhuongnews as $rows)
						<div class="col-sm-6 col-xs-12">
							<div class="xuhuong-left">
								<div class="img-left">
									
								<a class="img-news" href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
								</div>

								<div  class="info">
									
									<h2 style="width: 93%;" class="title-blogs-item">
										<a href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
									</h2>
										
									<p class="more-blogs">

										<span class="time">
									
											<span class="tacgia">{{$rows->tacgia}}</span>
									
											<i class="fa fa-clock-o"></i>
											 <?php 
											 echo date(" H:i - d/m/Y",strtotime($rows->date));
											  ?>
										</span>
									</p>
								</div>
							</div>	
						</div>
						@endforeach

						<div class="col-sm-6 col-xs-12">
							<div class="xuhuong-right">

								@foreach($xuhuongnews1 as $rows)
								<div class="col-sm-12 col-xs-12">
									<div class="xuhuong-right-img">
										<div class="img-right">
									<a class="img-news-right" href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
										</div>
										<div class="info">
								
									<h2 class="title-blogs-item">
										<a href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
									</h2>
										<p class="more-blogs">
										<span class="time">
												<span class="tacgia">{{$rows->tacgia}}</span>
											<i class="fa fa-clock-o"></i>
												 <?php 
											 echo date(" H:i - d/m/Y",strtotime($rows->date));
											  ?>
										</span>
									</p>
								</div>
									</div>
							
								</div>
								@endforeach


							</div>
						</div>
					</div>

			</div>
				</div>
				</div>
				</div>
			<!-- end content xu hướng -->
			<?php 
			$category = DB::select("select * from categories where id in(select categories_id from news where categories.id = news.categories_id) and display_home = '1' order by id desc");
			 ?>
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-xs-12">
					<div class="danhmuc">
						<div class="row">
							@foreach($category as $rows)
							<div class="col-sm-4 col-xs-12 danhmuc-toankhoi">
								<div class="title-danhmuc">
									<h3><i class="fa fa-bolt"></i><a style="color:white;text-decoration: none" href="{{url('/news/category/'.$rows->id)}}">&nbsp; {{$rows->name}}</a></h3>
								</div>

								<div class="danhmuc-content">
									<?php 
                        	// lấy 1 bản ghi
                        	$first_news = DB::table("news")->where("categories_id","=",$rows->id)->orderBy("id","desc")->offset(0)->take(1)->first();
                        	 ?>
									<div class="top-danhmuc">
										<div class="top-danhmuc-img">
											<div class="img-top-danhmuc">
											<a href="{{url('/news/detail/'.$first_news->id)}}"><img src="{{asset('upload/news/'.$first_news->photo)}}"></a>
										</div>
										<a style="padding: 1px 0px;" class="xuhuong-mini-title" href="{{url('/news/detail/'.$first_news->id)}}">{{$first_news->title}}</a>
											<p class="more-blogs danhmuc-blogs">
										<span class="time">
												<span class="tacgia">{{$first_news->tacgia}}</span>
											<i class="fa fa-clock-o"></i>
											 <?php 
											 echo date(" H:i - d/m/Y",strtotime($first_news->date));
											  ?>
										</span>
									</p>
										</div>
										
									</div>

									<?php 
                        	// lấy 1 bản ghi
                        	$other_news = DB::table("news")->where("categories_id","=",$rows->id)->orderBy("id","desc")->offset(1)->take(3)->get();
                        	 ?>
                        	@foreach($other_news as $rows)
									<div class="bottom-danhmuc">
											<div class="bottom-danhmuc-content">
												<div class="img-blog-small">
													<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
												</div>
												<div class="blog-info">

									<h2 class="bottom-title">
										<a href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
									</h2>
													<p class="more-blogs danhmuc-blogs">
										<span class="time">
											<i class="fa fa-clock-o"></i>
											<?php 
											 echo date(" H:i - d/m/Y",strtotime($first_news->date));
											  ?>
										</span>
									</p>
												</div>
											</div>
									</div>
									@endforeach
						



								</div>



							</div>
							@endforeach





						</div>
					</div>

					</div>
				</div>
			</div>



			<div style="padding-top: 20px;" class="bg-black">
			<div class="container-fluid">
					<div class="row">
							<?php 

							$video = DB::table('video')->orderBy("id","desc")->offset(0)->take(1)->first();
							$video1 = DB::table('video')->orderBy("id","desc")->offset(1)->take(3)->get();
							 ?>
							<div class="col-sm-12 col-xs-12">
								<div class="item-block">
									<div class="video-gallery">
								
									<a href="{{$video->link}}" data-lity>
											<div class="image-wrapper">
												<div class="img">
													<img id="image-video" src="{{asset('upload/videos/'.$video->photo)}}">
													<div class="image-title">{{$video->title}}</div>
													<div class="image-hover image-hover1">
														<i class="fa fa-play"></i>
													</div>

												</div>
											</div>
										</a>
									</div>
								</div>
							</div>


					</div>
			</div>
</div>
		
			<!-- other video -->

			<div style="padding-bottom:50px ;" class="bg-black">
			<div class="container">
					<div class="row">
							<div class="col-sm-12 col-xs-12">
								<div class="row">
									@foreach($video1 as $rows)
  									<div class="col-sm-4 col-xs-12">
										<div class="bottom-video">
												<div  class="item-block video-bottom-block">
									<div  class="video-gallery">
								
									<a href="{{$rows->link}}" data-lity>
											<div class="image-wrapper">
												<div class="img">
													<img id="image-video" src="{{asset('upload/videos/'.$rows->photo)}}">
													<div class="image-title">{{$rows->title}}</div>
													<div class="image-hover">
														<i class="fa fa-play"></i>
													</div>

												</div>
											</div>
										</a>
									</div>
										</div>
										</div>
									</div>
									
									@endforeach
								
								<div class="xemthem-div">
									<a class="xemthem" href="{{url('/news/videos')}}">Xem thêm >></a>
								</div>
								
									</div>
							</div>
					</div>
			</div>

			</div>
	<!-- endvideo -->

			<?php 
			$photo1 = DB::table("banner")->where("location","=","1")->first();
			 ?>
			<div class="container">
				<div style="padding-top: 50px;" class="hot-news">
							
							<img style="width: 100%;padding-bottom: 30px;height: 160px;object-fit: cover;" src="{{asset('upload/banners/'.$photo1->photo)}}">
						

						<div style="text-align: center;" class="hot-new-title">
							<h2><span>
								Tin tức mới nhất
							</span></h2>
							<span class="sub-title">Liều lượng cảm hứng hàng ngày của bạn</span>
						</div>
						<div class="row">
						<div class="col-sm-12 col-xs-12">
						<div style="margin-top:30px;" class="hot-news-content">
								<div class="row">
									<?php 
									$newsgannhat = DB::select("select * from news order by id desc limit 0,9");
									 ?>
									 @foreach($newsgannhat as $rows)
									<div class="col-sm-4 col-xs-12">
								<div class="top-danhmuc">
										<div class="top-danhmuc-img">
											<div class="img-top-danhmuc">
											<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}"></a>
										</div>
										<a class="xuhuong-mini-title" href="{{url('/news/detail/'.$rows->id)}}">{{$rows->title}}</a>
											<p class="more-blogs danhmuc-blogs">
										<span class="time">
											<span class="tacgia">{{$rows->tacgia}}</span>
											<i class="fa fa-clock-o"> </i>
											<?php 
											 echo date(" H:i - d/m/Y",strtotime($rows->date));
											  ?>
										</span>
									</p>
										</div>
										
									</div>
									</div>
									@endforeach

								



								


									</div>
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

		






	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script src="{{asset('frontend/lity-2.4.1/vendor/jquery.js')}}"></script>
	<script src="{{asset('frontend/lity-2.4.1/dist/lity.js')}}"></script>

</body>

</html>