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
					error_reporting(0);
                    if ($_GET['durum']=="ok") { ?>
                      
                        <div class="alert alert-success">
                         <strong>Başarılı!</strong> Başaralı şekilde güncellendi
                        </div>
                    <?php  }  elseif ($_GET['durum']="eskisifrehata") {?>
						<div class="alert alert-warning">
                         <strong>Uyarı!</strong> eski şifreniz eşleşmiyor.
                        </div>
						
						  
					 <?php  } elseif ($_GET['durum']="sifreleresitdegil") {?>
						<div class="alert alert-warning">
                         <strong>Uyarı!</strong>  şifreler eşleşmiyor.
                        </div>
						
					<?php } else {?>
						<div class="alert alert-danger">
                         <strong>Hata!</strong> Güncelleme başarısız.
                        </div>
						<?php	}?>
		<form action="../barber/nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Şifre Bilgileri </div>
					</div>
           
					<div class="form-group dob">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="password" class="form-control" name="kullanici_eskipass"  placeholder="Eski Şifrenizi giriniz">
						</div>
					</div>
					<div class="form-group dob">
						<div class="col-sm-6">
							<input type="password" class="form-control" name="kullanici_passwordone" placeholder="Şifrenizi Giriniz...">
						</div>
						<div class="col-sm-6">
							<input type="password" class="form-control" id="password" name="kullanici_passwordtwo"  placeholder="Şifrenizi Tekrar Giriniz...">
						</div>
					</div>
				
					<input type="hidden" name="kullanici_id"  value="<?php echo $kulanicicek['kullanici_id']?>">
					</div>
				
					<button name="sifreguncelle" class="btn btn-default btn-md btn-red">Güncelle</button> 
				
			
				
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
    <?php include 'footer.php'; ?>
	