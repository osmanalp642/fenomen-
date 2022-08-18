<?php include'header.php'?>

<?php $mailsor = $db->prepare("SELECT * from musteri where kullanici_mail= :mail");
$mailsor->execute(array(

	'mail' => $_SESSION['userkullanici_mail']

));
$kulanicicek = $mailsor -> fetch(PDO::FETCH_ASSOC);?>

	
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="page-title-wrap" style="margin-top: 50px;">
					<div class="page-title-inner">
					<div class="row">
						<div class="col-md-4">
						
							<div class="bigtitle">Kullanıcı Kaydı</div>
                            <br>
                        <p class="col-xs-12">Kullanıcı kayıt işlemlerini aşağıdaki ki form ile gerçekleştirebilirsiniz.</p>

						</div>
					
					</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		if ($_GET['durum']=="ok") { ?>
                      
					  <div class="alert alert-success">
					   <strong>Başarılı!</strong> Başaralı şekilde güncellendi
					  </div>
				  <?php  }  elseif($_GET['durum']=="no")  {?>
					  <div class="alert alert-danger">
					   <strong>Hata!</strong> Başarısız.
					  </div>
					  
						
				   <?php  }?>
		<form action="../barber/nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kayıt Bilgileri </div>
					</div>
           
					<div class="form-group dob">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kullanici_adsoyad" value="<?php echo $kulanicicek['kullanici_adsoyad']?>" placeholder="Ad ve Soyadınızı Giriniz...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="email" class="form-control"  name="kullanici_mail" value="<?php echo $kulanicicek['kullanici_mail']?>" id="email" placeholder="Dikkat ! E-Mail adresiniz kullanıcı adınız olacaktır.">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="tel" class="form-control" value="<?php echo $kulanicicek['kullanici_telefon']?>"  name="kullanici_telefon"  placeholder="Telefon Numaranız">
						</div>
					</div>
					<input type="hidden" name="kullanici_id"  value="<?php echo $kulanicicek['kullanici_id']?>">
					</div>
				
					<button name="musteriguncelle" class="btn btn-default btn-md btn-red">Kaydet</button> 
					<button  class="btn btn-default btn-md btn-warning"><a href="sifre-guncelle.php" style="color: #fff; text-decoration: none;">Şifrenizim unuttunuz?</a></button>
			
				
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
    <?php include 'footer.php'; ?>
	