<?php require_once("nedmin/netting/baglan.php"); ?>
<?php
ob_start();
session_start();
$veri = $db->prepare("select * from ayar where ayar_id=?");
$veri->execute(array("1"));
$islem = $veri->fetch();
error_reporting(0);
$kullanicisor = $db->prepare("SELECT * from musteri where kullanici_mail= :mail");
$kullanicisor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));
$kulanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

$musterisor = $db->prepare("SELECT * from musteri");
$musterisor->execute(array());
$mustericek = $musterisor->fetch(PDO::FETCH_ASSOC);

$mailsor = $db->prepare("SELECT * from musteri where kullanici_mail= :mail");
$mailsor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));
$mailcek = $mailsor->fetch(PDO::FETCH_ASSOC);
	$tarihsor = $db->prepare("SELECT  * FROM tarih ");
					$tarihsor->execute(array(
	
						'tarih_id' => $tarih_id
					));
	
					
	
					$tarih1cek = $tarihsor->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $islem['ayar_title'] ?></title>
	<meta name="description" content="<?php echo $islem['ayar_description'] ?>">
	<meta name="keywords" content="<?php echo $islem['ayar_keywords'] ?>">
	<meta name="author" content="<?php echo $islem['ayar_author'] ?>">
	<!-- Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu:400,400italic,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	<link href='font-awesome\css\font-awesome.css' rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="shortcut icon" href="https://img.freepik.com/free-vector/barber-shop-icon-logo-vector-icon-template_598213-1562.jpg" type="image/x-icon">
	<script src="https://kit.fontawesome.com/38933d4f1e.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js "></script>
	<script type="text/javascript" src="sweetalert2.all.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $("#zaman").hide();
            $("#tarih").change(function() {
                var tarihid = $(this).val();
               
                $.ajax({
                    type: "POST",
                    url: "./ajax.php",
                    data: {
                        "tarih": tarihid
                    },
                    success: function(e) {
                        $("#zaman").show();
                        $("#zaman").html(e);
                    }
                });
            })
        });
    </script>
    	<script type="text/javascript">
       function ac() {
	document.getElementById("ac").style.display="block";
       }
       	   function popcart() {
		document.getElementById("sepetac").style.display="block";
}
    </script>
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

<body  >

	<div id="wrapper">
		<div class="header">
			<!--Header -->
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-md-4 main-logo">
						<a href="index.php">Fenomen Barbes Club </a>
					</div>
					<div class="col-md-8">
						<div class="pushright" onclick="ac()"  >
							<div class="top">
								<?php
								if (!isset($_SESSION['userkullanici_mail'])) { ?>
									<a href="#" id="btn" class="btn btn-default btn-dark">Giriş
										Yap<span>-- veya --</span>Kayıt Ol</a>
								<?php	} else { ?>
									<a href="#" onclick="document.location.reload(true);" class="btn btn-default btn-dark">Hoşgeldin
										<span>--</span> <?php echo $kulanicicek['kullanici_adsoyad'] ?></a>
								<?php	} ?>

								<div class="regwrap"id="ac"  >
									<div class="row"id="ac" >
										<div class="col-md-6 regform">
										 
										
											
											<div class="title-widget-bg">
												<div class="title-widget">Giriş Yap</div>
											</div>

											<form action="nedmin/netting/islem.php" method="POST" role="form">
												<div class="form-group">
													<input type="text" class="form-control" name="kullanici_mail" id="username" placeholder="kullanıcı adı">
												</div>
												<div class="form-group">
													<input type="password" class="form-control" name="kullanici_password" id="password" placeholder="şifre">
												</div>
												<div class="form-group">
													<button type="submit" name="kullanicigiris" class="btn btn-default btn-red btn-sm">Giriş Yap</button>
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
											<a href="register.php"><button class="btn btn-default btn-yellow">Kayıt OL</button></a>
										</div>
										
									</div><br>
											<button   type="submit" onclick="document.location.reload(true);" class="btn btn-default btn-red btn-sm" > Kapat</button>
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
		<div class="main-nav" >
			<!--end main-nav -->
			<div class="navbar navbar-default navbar-static-top">
				<div class="container">
					<div class="row">
						<div class="col-md-10">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="navbar-collapse collapse">
								<ul class="nav navbar-nav">
									<li><a href="index.php" class="active">Anasayfa</a>
										<div class="curve"></div>
									</li>

									<li><a href="about.php">Hakkımda</a></li>
									<li><a href="randevu.php">Randevu Al</a></li>
									<li><a href="iletisim.php">İletişim</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-2 machart">
							<button id="popcart" onclick="popcart()"  class="btn btn-default btn-chart btn-sm "><span class="mychart">Sepet</span>|<span class="allprice">$0.00</span></button>
							<div class="popcart">
								<table class="table table-condensed popcart-inner">
									<tbody>
									<?php
                $kullanici_id = $mailcek['kullanici_id'];
				$sepetsor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(

					'id' => $kullanici_id
				));

				
                if (isset($_SESSION['userkullanici_mail'])) {
				while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)){
					$urun_id = $sepetcek['urun_id'];
					$urunsor = $db->prepare("SELECT  * FROM urun where urun_id=:urun_id");
					$urunsor->execute(array(
	
						'urun_id' => $urun_id
					));
	
					
	
					

					if ($urun_id==15) {
						$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
						$tarih_id = $sepetcek['tarih'];
						$tarihsor = $db->prepare("SELECT  * FROM perma where tarih_id=:tarih_id");
						$tarihsor->execute(array(

							'tarih_id' => $tarih_id
						));
						$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
					 }
					 elseif ($urun_id==10) {
						$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
						$tarih_id = $sepetcek['tarih'];
						$tarihsor = $db->prepare("SELECT  * FROM renklendirme where tarih_id=:tarih_id");
						$tarihsor->execute(array(

							'tarih_id' => $tarih_id
						));
						$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
					 }
					 elseif ($urun_id==19) {
						$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
						$tarih_id = $sepetcek['tarih'];
						$tarihsor = $db->prepare("SELECT  * FROM damat where tarih_id=:tarih_id");
						$tarihsor->execute(array(

							'tarih_id' => $tarih_id
						));
						$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
					 }
				else{
					$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
					$tarih_id = $sepetcek['tarih'];
					$tarihsor = $db->prepare("SELECT  * FROM tarih where tarih_id=:tarih_id");
					$tarihsor->execute(array(

						'tarih_id' => $tarih_id
					));
					$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
				}
				
				
					$zaman_id = $sepetcek['zaman'];
					$zamansor = $db->prepare("SELECT  * FROM zaman1 where zaman_id=:zaman_id");
					$zamansor->execute(array(
	
						'zaman_id' => $zaman_id
					));
	
					
	
					$zamancek = $zamansor->fetch(PDO::FETCH_ASSOC);
				}
				
				?>

										<tr>
											<td>
												<a href="#"><img src="<?php echo $uruncek['urun_resim']?>" alt="" class="img-responsive"></a>
											</td>
											<td><a href="#"><?php echo $uruncek['urun_ad'] ?></a><br><span></span>
											</td>
											<td><?php echo $tarihcek['tarih'] ?></td>
											<td><?php echo $zamancek['zaman'] ?></td>
										

											<td><?php echo $uruncek['urun_fiyat'] ?> ₺</td>
											<!-- <td><a href=""><i class="fa fa-times-circle fa-2x"></i></a></td> -->
										</tr>
									<?php }?>
									</tbody>
								</table>
							<div class="btn-popcart">
								<a href="sepet.php" class="btn btn-default btn-red btn-sm">Sepete git</a>
							</div><br>
							<br>
									<button   type="submit" onclick="document.location.reload(true);" class="btn btn-default btn-red btn-sm" > Kapat</button>
								<div class="popcart-tot">
									<p>
										Toplam<br>
										<span><?php echo $uruncek['urun_fiyat'] ?> ₺</span>
									</p>
								</div>
								
								<div class="clearfix">
								    
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if (isset($_SESSION['userkullanici_mail'])) { ?>
			<div class="container">
				<ul class="small-menu">
					<li><a href="hesabim.php" class="myacc">Hesap Bilgilerim</a></li>
					<li><a href="siparislerim.php" class="myshop">Siparişlerim</a></li>
					<li><a href="logout.php" class="mycheck">Güvenli Çıkış</a></li>
				</ul>
			<?php 	}
			?>