<?php
$exp_date="2024/06/23";
$today_date=date('Y/m/d');



$exp_date=strtotime($exp_date);
$td = strtotime($today_date);


if ($td>=$exp_date) {
	echo header("Location:expire.php");

 }else{
	//echo "<script type='text/javascript'>alert('Welcome to QRv!! ')</script>";
	 // header( "Refresh:0.01; url=../QRv/index.php", true, 303);
}


?>