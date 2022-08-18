<?php include 'header.php' ?>
<?php
$kullanicisor = $db->prepare("SELECT * from musteri");
$kullanicisor->execute(array());
$kulanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

$mailsor = $db->prepare("SELECT * from musteri where kullanici_mail=:mail");
$mailsor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));
$mailcek = $mailsor->fetch(PDO::FETCH_ASSOC);

$durumsor = $db->prepare("SELECT * from sepet");
$durumsor->execute(array());
$durumcek = $durumsor->fetch(PDO::FETCH_ASSOC);

$kullanici_id = $mailcek['kullanici_id'];
$sepetsor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
$sepetsor->execute(array(

	'id' => $kullanici_id
));
$sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC);

// $zaman_id = $sepetcek['zaman'];
// $zaman1sor = $db->prepare("SELECT  * FROM zaman where zaman_id=:zaman_id");
// $zaman1sor->execute(array(

// 	'zaman_id' => $zaman_id
// ));



// $zaman1cek = $zaman1sor->fetch(PDO::FETCH_ASSOC);




$kullanici_id = $mailcek['kullanici_id'];
$sepet1sor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
$sepet1sor->execute(array(

	'id' => $kullanici_id
));

$sepet1cek = $sepet1sor->fetch(PDO::FETCH_ASSOC);

$urun1_id = $sepet1cek['urun_id'];
							$urun1sor = $db->prepare("SELECT  * FROM urun where urun_id=:urun_id");
							$urun1sor->execute(array(

								'urun_id' => $urun1_id
							));

$urun1cek = $urun1sor->fetch(PDO::FETCH_ASSOC);


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
		<div class="title">Sepetim</div>
	</div>
	<input type="text" value="<?php echo $sepetcek['kullanici_id'] ?>">


	<div class="table-responsive">
		<table class="table table-bordered chart">
			<thead>
				<tr>
					<th>Remove</th>
					<th>Ürün Resim</th>
					<th>Ürün Ad</th>
					<th>Tarih</th>
					<th>Zaman</th>


					<th>Toplam</th>
				</tr>
			</thead>
			<tbody>
				<input type="hidden" value="<?php echo $tarihcek['tarih']; ?>">
				<?php

				$kullanici_id = $mailcek['kullanici_id'];
				$sepetsor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
				$sepetsor->execute(array(

					'id' => $kullanici_id
				));



				if (isset($_SESSION['userkullanici_mail'])) {
					if ($mailcek['kullanici_id'] == $sepet1cek['kullanici_id']) {
						while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
							$urun_id = $sepetcek['urun_id'];
							$urunsor = $db->prepare("SELECT  * FROM urun where urun_id=:urun_id");
							$urunsor->execute(array(

								'urun_id' => $urun_id
							));



						


							$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
                             if ($urun_id==15) {
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
							$zamansor = $db->prepare("SELECT  * FROM zaman where zaman_id=:zaman_id");
							$zamansor->execute(array(

								'zaman_id' => $zaman_id
							));



							$zamancek = $zamansor->fetch(PDO::FETCH_ASSOC);
							$sepet_id = $sepetcek['sepet_id'];

							$silsor = $db->prepare("SELECT * from sepet where sepet_id=:sepet_id");
							$silsor->execute(array(
								'sepet_id' => $sepet_id
							));
							$silcek = $silsor->fetch(PDO::FETCH_ASSOC);
						}
					}


				?>



					<tr>
						<td>
							<center><a href="nedmin/netting/islem.php?sepet=<?php echo $sepet1cek['sepet_id'] ?>&sepetsil=ok">
									<button class="btn btn-danger btn-xs">Sil</button></a></center>
						</td>
						<td><img src="<?php
										echo $urun1cek['urun_resim'];
										?>" width="100" height="70" alt=""></td>
						<td><?php
							echo $urun1cek['urun_ad'];
							?></td>
						<td><?php echo $tarihcek['tarih']; ?></td>
						<td ><?php echo $zamancek['zaman']; ?></td>

						<td><?php echo $urun1cek['urun_fiyat'] ?> ₺</td>

					</tr>
					<input type="text" name="zaman" value="<?php echo $zamancek['zaman']; ?>" id="">
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">


		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">

				<div class="total">Toplam : <span class="bigprice"><?php echo $urun1cek['urun_fiyat'] ?> ₺</span></div>

				<div class="clearfix"></div>
				<a href="odeme.php" class="btn btn-default btn-yellow">Ödeme Sayfası</a>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>