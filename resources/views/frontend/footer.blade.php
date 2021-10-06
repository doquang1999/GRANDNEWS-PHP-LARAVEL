<?php 
$photo2 = DB::table("banner")->where("location","=","2")->first();
 ?>
<div class="container">
			<div class="banner-quangcao">
			<img style="width: 100%;height: 130px;object-fit: cover;" src="{{asset('upload/banners/'.$photo2->photo)}}">
			</div>
		</div>


		<div style="background: rgba(17,17,17,1);" class="bg-gray">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
					<div style="margin-top: 20px;padding-bottom: 20px;" class="footer">
						<div class="row">
							<div class="col-sm-4 col-xs-12">
									<div class="bottom-content">
										<div class="bottom-logo">
											<img src="{{asset('frontend/images/logo1.png')}}">
										</div>
										<p>Mauris elementum accumsan leo vel tempor. Sit amet cursus nisl aliquam. Lorem ipsum dosectetur adipisicing elit, sed do.Lorem ipsum dolor sit amet, consectetur Nulla fringilla</p>
										<div class="bottom-social-icon">
												<a href=""><i class="fa fa-facebook active"></i></a>
												<a href=""><i class="fa fa-instagram"></i></a>
												<a href=""><i class="fa fa-google-plus"></i></a>
												<a href=""><i class="fa fa-pinterest"></i></a>
										</div>
										<div class="addthis_tipjar_inline"></div>
									</div>
							</div>

							<div class="col-sm-4 col-xs-12">
									<div class="bottom-title">
										<h2>BÀI ĐĂNG GẦN ĐÂY</h2>
									</div>
									<?php 
									$newsgannhat1 = DB::select("select * from news order by id desc limit 0,3");
									 ?>
									 @foreach($newsgannhat1 as $rows)
									<div class="content-bottom">
										<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}">
											<p>{{$rows->title}}</p></a>

									</div>
									@endforeach


							</div>


					<div class="col-sm-4 col-xs-12">
									<div class="bottom-title titlephotbien">
										<h2>BÀI VIẾT PHỔ BIẾN</h2>
									</div>
									<?php 
									$newsgannhat2 = DB::select("select * from news where hot = 1 order by id desc limit 0,3");
									 ?>
									 @foreach($newsgannhat2 as $rows)	
									<div class="content-bottom">
										<a href="{{url('/news/detail/'.$rows->id)}}"><img src="{{asset('upload/news/'.$rows->photo)}}">
												<p>{{$rows->title}}</p></a>

									</div>
									@endforeach

								

							</div>

						</div>
				</div>

				<div class="footer-bottom">
					<div class="row">
						<div class="col-sm-5">
								<div class="copyrightbox">
									<p>Copyright by Đỗ Vinh Quang</p>
								</div>
						</div>
							<div class="col-sm-7">
								<div class="copyrightbox pull-right atm-img">
									<img src="{{asset('frontend/images/custom-footer-payment.png')}}">
								</div>
						</div>
				</div>
				</div>

		</div>
		</div>
		</div>
		</div>
