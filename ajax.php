<?php require_once("nedmin/netting/baglan.php"); ?>
<?php 
error_reporting(0);
$urunsor=$db->prepare("SELECT  * FROM zaman where zaman_id=:zaman_id");
$urunsor-> execute(array(
	'zaman_id'=> 11
));
$tarihId = $_POST["tarih"];
$zamanlist = $db->query("select * from zaman where tarih_id='" . $tarihId . "'")->fetchAll(PDO::FETCH_ASSOC);




	foreach ($zamanlist as $key => $value) {
		echo '<option value="' . $value['zaman_id'] . '">' . $value['zaman'] . '</option>';
	}
		

	
		
?>
