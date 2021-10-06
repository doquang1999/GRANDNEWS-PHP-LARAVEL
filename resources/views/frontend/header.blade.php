	<div class="header">
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-xs-3">
						<div class="left">
							<a href="{{url('')}}" class="logo"><img style="height: 30px" src="{{asset('frontend/images/logo1.png')}}"></a>
						</div>
				</div>
				<div class="col-sm-9 col-xs-9">
					<div class="nav-menu pull-right">
							<div class="search">
							<form type="get" action="{{url('/news/search')}}">
								<input type="search" name="search" placeholder="Search" id="input-search">
								<button style="outline:none;" type="submit" id="search-btn"><i class="fa fa-search"></i></button>
							</form> 
							</div>
							<script type="text/javascript">
								$('#input-search').keypress(function(e){
     							 if(e.keyCode==13)
     							 $('#search-btn').click();
    						});
							</script>
						<div class="topnav" id="myTopnav">
							<ul>
								<li>
									<a href="{{url('')}}" class="active">Trang chủ</a>
								</li>
								<li>
										<a href="{{url('/news/about')}}">Giới thiệu</a>
								</li>
								<li class="main-menu">
										<a id="mainmenu" href="{{url('/news/tintuc')}}">Tin tức</a>
										<ul class="submenu">
											 <?php 
       									 $categories = DB::select("select * from categories where location = '1' order by id desc");
       									  ?>
       									  @foreach($categories as $rows)
											<li>
												<a href="{{url('/news/category/'.$rows->id)}}">{{$rows->name}}</a>
											</li>
												@endforeach

										</ul>
								</li>
								<li>
										<a href="{{url('/news/contact')}}">Liên hệ</a>
								</li>
								<li class="main-menu">
									<a href="#comit">Khác</a>
										<ul class="submenu">
										
											<li>
												<a href="{{url('/news/videos')}}">Video</a>
											</li>
											 <?php 
       									 $categories1 = DB::select("select * from categories where location = '2' order by id desc");
       									  ?>
       									    @foreach($categories1 as $rows)
												<li>
												<a href="{{url('/news/category/'.$rows->id)}}">{{$rows->name}}</a>
											</li>
											@endforeach
										</ul>
							</li>
						
							</ul>
						</div>

							<div class="button-nav">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <i id="icon-facebook" class="fa fa-bars"></i>
         </button>
 
         <!-- Navbar links -->
         <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
               <li class="nav-item">
                  <a class="nav-link" href="{{url('')}}">Trang chủ</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('/news/about')}}">Giới thiệu</a>
               </li>
               <li class="nav-item">
                  <a href="{{url('/news/tintuc')}}" class="dropdown-toggle nav-link" data-toggle="dropdown">Tin tức</a>
                     <ul class="dropdown-menu multi-level sub-mobile-menu">
                     @foreach($categories as $rows)
              			<li><a href="{{url('/news/category/'.$rows->id)}}">{{$rows->name}}</a></li>
                       @endforeach
           				 </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('/news/contact')}}">Liên hệ</a>
               </li>
               <li class="nav-item">
                  <a href="#comit" class="dropdown-toggle nav-link" data-toggle="dropdown">Khác</a>
                  <ul class="dropdown-menu multi-level sub-mobile-menu">
              			
                       <li><a href="{{url('/news/videos')}}">Video</a></li>
                        @foreach($categories1 as $rows)
               		<li><a href="{{url('/news/category/'.$rows->id)}}">{{$rows->name}}</a></li>
               		 @endforeach
           				 </ul>
               </li>
            </ul>
         </div>
			</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<style type="text/css">

	</style>