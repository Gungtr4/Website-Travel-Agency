<?php
session_start();
if (!isset($_SESSION['admin']) && $_SESSION['admin']!='admin'){
	header("location:login.php");}
	else {
		include("../koneksi.php");
		include("../function.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>UKK TRAVEL</title>
<link rel="stylesheet" href="../css/skeleton.css" />
</head>

<body>
	<div align="center">
	        <a href="index.php?halaman=airplane">Airplane</a>
            <a href="index.php?halaman=airport">Airport</a>
            <a href="index.php?halaman=bookingpl">Booking Plane</a>
            <a href="index.php?halaman=bookingtr">Booking Train</a>
            <a href="index.php?halaman=flight">Flight</a>
            <a href="index.php?halaman=station">Station</a>
            <a href="index.php?halaman=train">Train</a>
            <a href="index.php?halaman=train_route">Train Route</a>
            <a href="index.php?halaman=user">User</a>
            <a href="index.php?halaman=backup">Backup</a>            
            <a href="logout.php">Logout</a>

        	<?php
				if(isset($_GET['halaman'])){
					$hal = $_GET['halaman'];
				if ($hal == 'airplane'){
					include ("../content/airplane_admin.php");}
				else if ($hal == 'airport'){
					include ("../content/airport_admin.php");}
				else if ($hal == 'bookingpl'){
					include ("../content/booking_flight_admin.php");}
				else if ($hal == 'bookingtr'){
					include ("../content/booking_train_admin.php");}
				else if ($hal == 'flight'){
					include ("../content/flight_admin.php");}
				else if ($hal == 'backup'){
					include ("backup.php");}
				else if ($hal == 'flight_fare'){
					include ("../content/flight_fare_admin.php");}
				else if ($hal == 'station'){
					include ("../content/station_admin.php");}
				else if ($hal=='train'){
					include ("../content/train_admin.php");}
				else if ($hal == 'train_fare'){
					include ("../content/train_fare_admin.php");}
				else if ($hal == 'train_route'){
					include ("../content/train_route_admin.php");}
				else if ($hal == 'user'){
					include ("../content/user_admin.php");}
				}
			?>
 
       		<div align="center">Copyright@2018 by SMKN1 Sukawati</div>
	  </div>
</body>
</html>
<?php } ?>