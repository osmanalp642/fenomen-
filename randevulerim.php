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



				</tr>
			</thead>
			<tbody>

           <?php if (isset($_SESSION['userkullanici_mail'])) {?>

					<tr>

						<td><img src="" width="100" height="75" alt=""></td>
						<td></td>
						<td></td>
						<td name="zaman"></td>



					</tr>
<?php }?>
				
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col-md-6">


		</div>
		<div class="col-md-3 col-md-offset-3">
			<div class="subtotal-wrap">


				<div class="clearfix"></div>
				<!-- <a href="" class="btn btn-default btn-yellow">Ödeme Sayfası</a> -->
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

		</div>
	</div>
	<div class="spacer"></div>
</div>

<?php include 'footer.php'; ?>