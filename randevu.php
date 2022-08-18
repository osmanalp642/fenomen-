<?php include 'header.php' ?>
<?php
$urunsor = $db->prepare("SELECT * from urun");
$urunsor->execute(array());
?>
<?php require_once("nedmin/production/function.php"); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!--Main content-->

				<div class="title-bg">
					<div class="title">Randevu Al</div>
				</div>


				<div class="row prdct">
					<?php
					while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>

						<div class="col-md-4 deneme" >
							<div class="productwrap meet2 res " style="margin-left:75px;  width: 300px;">
                        <div class=" pr-img">
								<a href="urun-detay.php?urun=<?php echo $uruncek['urun_id'] ?>" class="link" style="width: 200px;"><img src="<?php echo $uruncek['urun_resim'] ?>" alt="" class="img-responsive meet"></a>
							</div>
							<span class="smalltitle" style="width: 220px;"><a href="urun-detay.php?urun=<?php echo $uruncek['urun_id'] ?>&" style="width: 500px; "><?php echo $uruncek['urun_ad'] ?></a></span>
							<button href="#" class="buton"><a href="urun-detay.php?urun=<?php echo $uruncek['urun_id'] ?>" style="color: #fff;  text-decoration: none;">Randevu</a> </button>
							<p style="margin-top: -40px; padding: 10px; width: 70px;"><?php echo $uruncek['urun_fiyat'] ?> ₺</p>

						</div>
				</div>

			<?php
					} ?>


			</div>

			<!--Products-->
			<!-- <ul class="pagination shop-pag">
		
			<li><a href="#"><i class="fa fa-caret-left"></i></a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
		</ul>
	 -->

		</div>

	</div>
	<div class="spacer"></div>
</div>
<?php include 'footer.php'; ?>