<?php include 'header.php' ?>

<?php
$tarihlist = $db->query("select * from tarih")->fetchAll(PDO::FETCH_ASSOC);
$permatarihlist = $db->query("select * from perma")->fetchAll(PDO::FETCH_ASSOC);
$renklendirmmetarihlist = $db->query("select * from renklendirme")->fetchAll(PDO::FETCH_ASSOC);
$damattarihlist = $db->query("select * from damat")->fetchAll(PDO::FETCH_ASSOC);

$tarihsor = $db->prepare("SELECT * from urun");
$tarihsor->execute(array());
$Tarihcek = $tarihsor->fetch(PDO::FETCH_ASSOC)

?>
<?php

ob_start();
session_start();
$urunsor = $db->prepare("SELECT  * FROM urun where urun_id=:urun_id");
$urunsor->execute(array(

	'urun_id' => $_GET['urun']
));

$say = $urunsor->rowCount();

$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
// echo $uruncek['urun_id'];
//echo $uruncek['urun_ad'];
$kullanicisor = $db->prepare("SELECT * from musteri");
$kullanicisor->execute(array());
$kulanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);

$sepetsor = $db->prepare("SELECT * from sepet");
$sepetsor->execute(array());
$say - 3;
// echo $say = $kullanicisor->rowCount();
$sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC);

$mailsor = $db->prepare("SELECT * from musteri where kullanici_mail= :mail");
$mailsor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));

$mail1sor = $db->prepare("SELECT * from musteri where kullanici_mail=:kullanici_mail");
$mail1sor->execute(array(

	'kullanici_mail' => $_SESSION['userkullanici_mail']

));

$mail1cek = $mail1sor->fetch(PDO::FETCH_ASSOC);

$kullanici_id = $mailcek['kullanici_id'];
$sepet1sor = $db->prepare("SELECT  * FROM sepet where kullanici_id=:id");
$sepet1sor->execute(array(

	'id' => $kullanici_id
));
// $say1=$sepet1sor->rowCount();
$sepet1cek = $sepet1sor->fetch(PDO::FETCH_ASSOC);
?>



<div class="container">
	<div class="row">
		<div class="col-md-12">

			<div class="row">

			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<!--Main content-->
			<div class="title-bg">
				<div class="title"><?php echo $uruncek['urun_ad'] ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="dt-img">

						<a class="fancybox" href="#" data-fancybox-group="gallery" title="Cras neque mi, semper leon"><img src="<?php echo $uruncek['urun_resim'] ?>" style="height: 450px; width: 350px;" alt="" class="img-responsive"></a>
					</div>

				</div>
				<?php
                     
                     
				?>
				<?php
				echo $say1;
                  if ($mail1cek['kullanici_id']==$sepet1cek['kullanici_id']) {
					$durum = $sepet1cek['sepet_durum'];
				  }
				  else {
					$durum==0;
				  }
			
				
				
				
				?>

				<hr>
				<div class="col-md-6 det-desc">
					<div class="productdata">

						<form role="form">

						</form>
					</div>
					<?php if ($durum == 1) { ?>
						<div class="alert alert-danger deneme1" style="width: 390px;">
							<strong>Hata!</strong> Sepetinizde randevu var bir daha randevu eklenemez !!
						</div>
					<?php	}
					if ($_GET['durum'] == "no") { ?>
						<div class="alert alert-warning" style="width: 390px;">
							<strong>Uyarı!</strong> Lütfen Tarih ve Zaman seçiniz!!
						</div>

					<?php  } ?>
					<h4>Tarih ve Zaman</h4>

					<form class="form-horizontal ava" role="form" method="POST" action="../barber/nedmin/netting/islem.php">
						<div class="form-group">
							<label for="mem" class="col-sm-2 control-label">Tarih</label>
							<div class="col-sm-10">
								<select class="form-control" name="tarih" id="tarih"">
								<option value=" 0">Tarih seçiniz</option>
									<?php
									if ($Tarihcek['tarih_durum'] == 0 and $uruncek['urun_id'] == 15) {
										foreach ($permatarihlist as $key => $value) {
											echo '<option value="' . $value['tarih_id'] . '">' . $value['tarih'] . '</option>';
										}
									} elseif ($uruncek['urun_id'] == 10) {
										foreach ($renklendirmmetarihlist as $key => $value) {
											echo '<option value="' . $value['tarih_id'] . '">' . $value['tarih'] . '</option>';
										}
									} elseif ($uruncek['urun_id'] == 19) {
										foreach ($damattarihlist as $key => $value) {
											echo '<option value="' . $value['tarih_id'] . '">' . $value['tarih'] . '</option>';
										}
									} else {
										foreach ($tarihlist as $key => $value) {
											echo '<option value="' . $value['tarih_id'] . '">' . $value['tarih'] . '</option>';
										}
									}
									?>

								</select>
							</div>
							<div class="clearfix"></div>
							<div class="dash"></div>
						</div>

						<div class="form-group">
							<label for="color" class="col-sm-2 control-label">Zaman</label>
							<div class="col-sm-10">
								<select class="form-control" name="zaman" id="zaman">
									<!-- <option value="0">İlçe Seç</option> -->
								</select>
							</div>
							<div class="clearfix"></div>
							<div class="dash"></div>
						</div>
						<div class="form-group">

							<div class="col-sm-4">



								<?php if (isset($_SESSION['userkullanici_mail'])) {
									if ($durum == 1) { ?>
										<button name="randevu" disabled type="submit" class="btn btn-default btn-red btn-sm"><span class="addchart">Randevu al</span></button>


									<?php } else { ?>
										<button name="randevu" type="submit" class="btn btn-default btn-red btn-sm"><span class="addchart">Randevu al</span></button>

									<?php	} ?>

									<!-- <button name="randevu" disabled  type="submit" class="btn btn-default btn-red btn-sm"><span class="addchart">Randevu Al</span></button> -->
								<?php } else { ?>
									<button name="randevu" disabled type="submit" class="btn btn-default btn-red btn-sm"><span class="addchart"> Giriş Yap</span></button>

								<?php } ?>


							</div>
							<input type="hidden" name="durum" value="<?php echo $durum; ?>">
							<input type="hidden" name="kullanici_id" value="<?php  echo $mail1cek['kullanici_id']; ?>">
							<input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>">
							<div class="clearfix"></div>
						</div>
					</form>

				</div>

			</div>
		</div>
	</div>
	<br>
	<br>
	<hr>


	<div class="row prdct"></div>
	<div class="row prdct"></div>
	<div class="row prdct"></div>

	<div class="spacer"></div>
</div>
<!--Main content-->

</div>
</div>

<?php include 'footer.php'; ?>