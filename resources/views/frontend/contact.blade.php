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
									<a class="bre-active">>> Liên hệ</a>
								</li>
							</ol>
						</div>
						<div class="title-danhmuc">
							<h1><span><i class="fa fa-phone"></i> Liên hệ <i class="fa fa-location-arrow"></i></span></h1>
						</div>

					</div>
				</div>
			</div>
		</div>	

		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-xs-12">
				
					<div class="form-contact">
						<p style="margin-top: 20px;font-weight: bold;font-size: 24px;color: #ff3c36;">THÔNG TIN LIÊN HỆ</p>
					
									
							
							<form class="form-contactt" method="post" action="">
								@csrf
								<div class="row">
								<div class="col-sm-4 col-xs-12">
									<input style="width: 100%;margin-bottom: 20px;" type="text" name="full_name" placeholder=" Họ và tên" required>
								</div>
								<div class="col-sm-4 col-xs-12">
									<input style="width: 100%;margin-bottom: 20px;" type="number" name="sdt" placeholder=" Số điện thoại" required>
								</div>
								<div class="col-sm-4 col-xs-12">
									<input style="width: 100%;margin-bottom: 20px;" type="email" name="email" placeholder=" Email" required>
								</div>
								<div class="col-sm-12 col-xs-12">
									<input style="width: 100%;margin-bottom: 20px;" type="text" name="title" placeholder=" Tiêu đề" required>
								</div>
								<div class="col-sm-12 col-xs-12">
									<textarea name="content" placeholder=" Ghi chú" style="width:100%;margin-bottom: 20px;" required></textarea>
								</div>
								</div>
							

							
						
					</div>

					<div class="button-submit pull-right">
						<button type="submit" style="outline: none;background: #ff3c36;border:1px solid #ff3c36;color: white; font-size: 18px;">Gửi yêu cầu</button>
					</div>
					</form>
					

					<div class="bando">
						<iframe style="margin-top: 50px;" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14895.235486079115!2d105.7744665!3d21.0403322!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x70d71b071349fa94!2zQ8O0bmcgVHkgQ-G7lSBQaOG6p24gRGV2cHJvIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1632734505021!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
				
					</div>

			</div>
		</div>	
	</div>

		<!-- end main -->
		<style type="text/css">
			.form-contactt
			{
				font-size: 18px;
			}
			.form-contactt input , textarea
			{
				border: 1px solid #ddd;
				outline: none;
			}
			input::-webkit-outer-spin-button,
			input::-webkit-inner-spin-button {
 			 -webkit-appearance: none;
 			margin: 0;
			}

/* Firefox */
			input[type=number] {
  			-moz-appearance: textfield;
			}
		
		</style>



		<!-- footer -->

		@include("frontend.footer")

		<!-- /footer -->



	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>

</html>
