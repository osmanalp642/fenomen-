<?php include'header.php'?>
<?php 
$urunsor = $db->prepare("SELECT * from urun where urun_id limit 6");
$urunsor->execute(array());
$slidersor = $db->prepare("SELECT * from slider order by slider_id ASC");
$slidersor->execute(array());
$kategorisor = $db->prepare("SELECT * from urun order by urun_id ASC");
$kategorisor->execute(array());
?>
<div class="container">

<div class="clearfix"></div>
<div class="lines"></div>
<div class="main-slide">
    <div id="sync1" class="owl-carousel" style="display: block;">
        <div class="item">
            <div class="slide-desc">
                <div class="inner">

                </div>
                <div class="inner">
                    
                    </div>
                </div>
                <?php while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="slide-type-1">
                <img src="<?php echo $slidercek['slider_resim']?>" alt="" class="img-responsive slider-img ">
            </div>
        </div>
            <?php }?>
    
           
        </div>


    </div>
</div>

<div class="f-widget featpro">
    <div class="container">
        <div class="title-widget-bg">
            <div class="title-widget">Kategoriler</div>
            <div class="carousel-nav">
                <a class="prev"></a>
                <a class="next"></a>
            </div>
        </div>
        <div id="product-carousel" class="owl-carousel owl-theme">
        <?php while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
            <div class="item">
                <div class="productwrap">
                    <div class="pr-img">
                      
                        <a href="#"><img src="<?php echo $kategoricek['urun_resim']?>" alt=""class="img-responsive meet1"></a>
                    </div>
                    
                </div>
            </div>
            <?php }?>
           
            </div>
        </div>
    </div>
</div>



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!--Main content-->
            <div class="title-bg">
                <div class="title">Hakkımda</div>
            </div>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            <p class="ct">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
            

            <div class="title-bg">
                <div class="title">Randevu Al</div>
            </div>
            <div class="container">
            <div class="row prdct">
                <!--Products-->
                <?php
			while ($uruncek = $urunsor->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="col-md-4">
                    <div class="productwrap meet2" style="margin-left: -5px">
                        <div class="pr-img">
                            <a href="urun-detay.php?urun=<?php echo $uruncek['urun_id']?>"><img src="<?php echo $uruncek['urun_resim']?>" alt=""
                                class="img-responsive meet"></a>
                            </div>
                            <span class="smalltitle" style="width: 220px;"><a href="urun-detay.php?urun=<?php echo $uruncek['urun_id']?>"><?php echo $uruncek['urun_ad']?></a></span>
                            <button href="#" class="buton"><a href="urun-detay.php?urun=<?php echo $uruncek['urun_id']?>" style="color: #fff; text-decoration: none;" >Randevu</a>  </button>
                        <p style="margin-top: -40px; padding: 10px;"><?php echo $uruncek['urun_fiyat']?> ₺</p>
                            
                        </div>
                    </div>
                    <?php
			} ?>
            </div>
            </div>
            <!--Products-->
            <div class="spacer"></div>
        </div>
            <?php include 'footer.php'; ?>