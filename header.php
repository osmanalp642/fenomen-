<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Shopping Theme</title>

	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
	integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/38933d4f1e.js" crossorigin="anonymous"></script>
	<!-- Bootstrap -->
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet">

	<!-- Main Style -->
	<link rel="stylesheet" href="style.css">

	<!-- owl Style -->
	<link rel="stylesheet" href="css\owl.carousel.css">
	<link rel="stylesheet" href="css\owl.transitions.css">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div id="wrapper">
		<div class="header">
			<!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index-1.htm">Fenomen Barbes Club </a>
					</div>
					<div class="col-md-8">
						<div class="pushright">
							<div class="top">
								<a href="#" id="reg"  z-index: 3;"  class="btn btn-default btn-dark">Giriş
									Yap<span>-- veya --</span>Kayıt Ol</a>
								<div class="regwrap">
									<div class="row">
										<div class="col-md-6 regform">
											<div class="title-widget-bg">
												<div class="title-widget">Giriş Yap</div>
											</div>
											<form role="form">
												<div class="form-group">
													<input type="text" class="form-control" id="username"
														placeholder="kullanıcı adı">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" id="password"
														placeholder="şifre">
												</div>
												<div class="form-group">
													<button class="btn btn-default btn-red btn-sm">Giriş Yap</button>
												</div>
											</form>
										</div>
										<div class="col-md-6">
											<div class="title-widget-bg">
												<div class="title-widget">Kayıt Ol</div>
											</div>
											<p>
												Yeni kullanıcı? Hesap oluşturarak daha hızlı alışveriş yapabilir, sipariş durumundan haberdar olabilirsiniz...
											</p>
											<button class="btn btn-default btn-yellow">Kayıt OL</button>
										</div>
									</div>
								</div>

								<div class="srchwrap">
									<div class="row">
										<div class="col-md-12">
											<form class="form-horizontal" role="form">
												<div class="form-group">
													<label for="search" class="col-sm-2 control-label">Search</label>
													<div class="col-sm-10">
														<input type="text" class="form-control" id="search">
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dashed"></div>
		</div>
		<button onclick="topFunction()" id="onlyJSyc">&uarr;</button>
		<!--Header -->
		<div class="main-nav">
			<!--end main-nav -->
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse"
									data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index-1.htm" class="active">Anasayfa</a>
										<div class="curve"></div>
									</li>

									<li><a href="page-sidebar.htm">Hakkımda</a></li>
									<li><a href="category.htm">Randevu Al</a></li>
									<li><a href="contact.htm">İletişim</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2 machart">
							<button id="popcart" class="btn btn-default btn-chart btn-sm "><span
									class="mychart">Cart</span>|<span class="allprice">$0.00</span></button>
							<div class="popcart">
								<table class="table table-condensed popcart-inner">
									<tbody>
										<tr>
											<td>
												<a href="product.htm"><img src="images\dummy-1.png" alt=""
														class="img-responsive"></a>
											</td>
											<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
											</td>
											<td>1X</td>
											<td>$138.80</td>
											<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
										</tr>
										<tr>
											<td>
												<a href="product.htm"><img src="images\dummy-1.png" alt=""
														class="img-responsive"></a>
											</td>
											<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
											</td>
											<td>1X</td>
											<td>$138.80</td>
											<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
										</tr>
										<tr>
											<td>
												<a href="product.htm"><img src="images\dummy-1.png" alt=""
														class="img-responsive"></a>
											</td>
											<td><a href="product.htm">Casio Exilim Zoom</a><br><span>Color: green</span>
											</td>
											<td>1X</td>
											<td>$138.80</td>
											<td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td>
										</tr>
									</tbody>
								</table>
								<span class="sub-tot">Sub-Total : <span>$277.60</span> | <span>Vat (17.5%)</span> :
									$36.00 </span>
								<br>
								<div class="btn-popcart">
									<a href="checkout.htm" class="btn btn-default btn-red btn-sm">Checkout</a>
									<a href="cart.htm" class="btn btn-default btn-red btn-sm">More</a>
								</div>
								<div class="popcart-tot">
									<p>
										Total<br>
										<span>$313.60</span>
									</p>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>