<?php include 'header.php' ?>
<?php
$kullanicisor = $db->prepare("SELECT * from musteri");
$kullanicisor->execute(array());
$kulanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);


$mailsor = $db->prepare("SELECT * from musteri where kullanici_mail= :mail");
$mailsor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));
$mailcek = $mailsor->fetch(PDO::FETCH_ASSOC);
$kullanici_id = $mailcek['kullanici_id'];
$sepet1sor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
$sepet1sor->execute(array(

	'id' => $kullanici_id
));
$sepet1cek = $sepet1sor->fetch(PDO::FETCH_ASSOC);
$tarih1sor = $db->prepare("SELECT  * FROM tarih");
$tarih1sor->execute(array(
	'tarih_id' => $tarih_id


));



$tarih1cek = $tarih1sor->fetch(PDO::FETCH_ASSOC);
?>


<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- <div class="page-title-wrap"> -->
			<!-- <div class="page-title-inner"> -->
			<!-- <div class="row"> -->
			<!-- <div class="col-md-4">
							<div class="bread"><a href="#">Home</a> &rsaquo; Shopping Cart</div>
							<div class="bigtitle">Shopping Cart</div>
						</div>
						<div class="col-md-3 col-md-offset-5">
							<button class="btn btn-default btn-red btn-lg">Purchase Theme</button>
						</div> -->
			<!-- </div> -->
			<!-- </div> -->
			<!-- </div> -->
		</div>
	</div>
	<div class="title-bg">
		<div class="title">Ödeme Sayfası</div>
	</div>



	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>

					<th>Ürün Resim</th>
					<th>Ürün Ad</th>
					<th>Tarih</th>
					<th>Zaman</th>


					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$kullanici_id = $mailcek['kullanici_id'];
				$sepetsor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(

					'id' => $kullanici_id
				));


				if (isset($_SESSION['userkullanici_mail'])) {
					while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
						$urun_id = $sepetcek['urun_id'];
						$urunsor = $db->prepare("SELECT  * FROM urun where urun_id=:urun_id");
						$urunsor->execute(array(

							'urun_id' => $urun_id
						));



						
						
						if ($urun_id == 15) {
							$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
							$tarih_id = $sepetcek['tarih'];
							$tarihsor = $db->prepare("SELECT  * FROM perma where tarih_id=:tarih_id");
							$tarihsor->execute(array(

								'tarih_id' => $tarih_id
							));
							$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
						} elseif ($urun_id == 10) {
							$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
							$tarih_id = $sepetcek['tarih'];
							$tarihsor = $db->prepare("SELECT  * FROM renklendirme where tarih_id=:tarih_id");
							$tarihsor->execute(array(

								'tarih_id' => $tarih_id
							));
							$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
						} elseif ($urun_id == 19) {
							$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
							$tarih_id = $sepetcek['tarih'];
							$tarihsor = $db->prepare("SELECT  * FROM damat where tarih_id=:tarih_id");
							$tarihsor->execute(array(

								'tarih_id' => $tarih_id
							));
							$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
						} else {
							$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
							$tarih_id = $sepetcek['tarih'];
							$tarihsor = $db->prepare("SELECT  * FROM tarih where tarih_id=:tarih_id");
							$tarihsor->execute(array(

								'tarih_id' => $tarih_id
							));
							$tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC);
						}
						// $zaman_id = $sepetcek['zaman'];
						// $zamansor = $db->prepare("SELECT  * FROM zaman where zaman_id=:zaman_id");
						// $zamansor->execute(array(

						// 	'zaman_id' => $zaman_id
						// ));

						// $zaman_id = $sepetcek['zaman'];
						// $zamansor = $db->prepare("SELECT  * FROM zaman where zaman_id=:zaman_id");
						// $zamansor->execute(array(

						// 	'zaman_id' => $zaman_id
						// ));



						// $zamancek = $zamansor->fetch(PDO::FETCH_ASSOC);
					
					}

				?>

					<tr>

						<td><img src="<?php echo $uruncek['urun_resim'] ?>" width="100" height="75" alt=""></td>
						<td><?php echo $uruncek['urun_ad'] ?></td>
						<td><?php echo $tarihcek['tarih'] ?></td>
						<td name="zaman"><?php echo $_POST['zaman']; ?></td>

						<td><?php echo $uruncek['urun_fiyat'] ?> ₺</td>

					</tr>

				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">


		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">

				<div class="total">Toplam : <span class="bigprice"><?php echo $uruncek['urun_fiyat'] ?> ₺</span></div>

				<div class="clearfix"></div>
				<!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="tab-review">
		<ul id="myTab" class="nav nav-tabs shop-tab">
			<li class="active"><a href="#desc" data-toggle="tab">Kredi Kartı</a></li>
			<li class=""><a href="#rev" data-toggle="tab">Banka Havalesi</a></li>
		</ul>
		<div id="myTabContent" class="tab-content shop-tab-ct">
			<div class="tab-pane fade active in" id="desc">
				<?php include 'iyzico/buyer.php'; ?>
				<div id="iyzipay-checkout-form" class="responsive"></div>

			</div>
			<div class="tab-pane fade" id="rev">
				<form action="nedmin/netting/islem.php" method="POST">
					<p>Ödeme yapacağınız hesap numarısını seçip işlemi tamamlayınız...</p>


					<?php $bankasor = $db->prepare("SELECT * from banka order by banka_id ASC ");
					$bankasor->execute(array());
					while ($bankacek = $bankasor->fetch(PDO::FETCH_ASSOC)) {
					?>
						<input type="radio" name="siparis_banka" value="<?php echo $bankacek['banka_id']; ?>" id="">
						<?php echo $bankacek['banka_ad']; ?> <br>
					<?php } ?>
					<hr>
					<input type="text" name="tarih1" value="<?php echo $tarih1cek['tarih'] ?> " id="">

					<input type="hidden" name="siparis_toplam" value="<?php echo $uruncek['urun_fiyat'] ?> " id="">
					<input type="hidden" name="kullanici_id" value="<?php echo $mailcek['kullanici_id'] ?> " id="">
					<input type="hidden" name="sepet_id" value="<?php echo $sepet1cek['sepet_id'] ?> " id="">
					<input type="hidden" name="zaman_id" value="<?php echo $zamancek['zaman_id'] ?> " id="">

					<button class="btn btn-success" type="submit" name="bankasipariskaydet">Siparişi Ver</button>
				</form>
			</div>
		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>