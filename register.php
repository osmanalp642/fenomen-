<?php include'header.php'?>



	
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
		
		<form action="../barber/nedmin/netting/islem.php" method="POST" class="form-horizontal checkout" role="form">
			<div class="row">
				<div class="col-md-6">
					<div class="title-bg">
						<div class="title">Kayıt Bilgileri </div>
					</div>
                    <?php 
					error_reporting(0);
                    if ($_GET['durum']=="farklisifre") { ?>
                      
                        <div class="alert alert-danger">
                         <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor
                        </div>
                    <?php  }  elseif ($_GET['durum']="eksiksifre") {?>
						<div class="alert alert-warning">
                         <strong>Uyarı!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                        </div>
						
						  
					 <?php  }  elseif ($_GET['durum']="mukerrerkayit") {?>
						<div class="alert alert-danger">
                         <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
					   
						</div>
						<?php  }  elseif ($_GET['durum']="basarisiz") {?>
							<div class="alert alert-danger">
                         <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yönetecisine Danışınız.
                        </div>
						<?php  }   elseif ($_GET['durum']="ok") { ?>
							<div class="alert alert-success">
                         <strong>Başarılı!</strong> Kayıt oldunuz.
                        </div>
						<?php  }    ?>
					<div class="form-group dob">
					<div class="form-group">
						<div class="col-sm-12">
							<input type="text" class="form-control" name="kullanici_adsoyad" placeholder="Ad ve Soyadınızı Giriniz...">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="email" class="form-control"  name="kullanici_mail"  id="email" placeholder="Dikkat ! E-Mail adresiniz kullanıcı adınız olacaktır.">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-12">
							<input type="tel" class="form-control"  name="kullanici_telefon"  placeholder="Telefon Numaranız">
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
					<div class="col-sm-12">
						
						<input type="checkbox" id="deneme"  name="deneme" style="font-size: 25px; width: 20px; height: 20px; padding-top: 20px; position: relative; top: 20px;"  ><br>
				<label for="deneme"  style="font-size: 15px; width: 270px; margin-left: 40px; margin-top: -200px;">Web sitesinin şartlar ve koşulları okudum ve kabul ediyorum *</label> 
						</div>
					</div>
				
					<button name="kullanicikaydet" class="btn btn-default btn-red">Kayıt İşlemi Yap</button>
			
				
					</div>
				</div>
			</div>
		</form>
		<div class="spacer"></div>
	</div>
    <?php include 'footer.php'; ?>
	