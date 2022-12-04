<?php
include "../koneksi.php";
include "../function.php";

	//data booking
	$id_flight_booking	= $_POST['id_flight_booking'];
	$id_user			= $_POST['id_user'];
	$id_fare_flight		= $_POST['id_fare_flight'];
	$passenger_total	= $_POST['passenger_total'];
	$date				= $_POST['date'];
	$payment			= $_POST['payment'];
	
	$ins	= 'insert into flight_booking(id_flight_booking,id_user,id_fare_flight,passenger_total,date,payment)value
		("'.$id_flight_booking.'","'.$id_user.'","'.$id_fare_flight.'","'.$passenger_total.'","'.$date.'","'.$payment.'")';
	$ins2   = mysqli_query($koneksi,$ins) or die (mysqli_error());
	
	if($ins2){
	for($i=0;$i<$_POST['passenger_total'];$i++){
	//data passenger
	$id_flight_passenger= IDOtomatis("flight_passenger");
 	$id_flight_booking	= $_POST['id_flight_booking'.$i];
	$name				= $_POST['name'.$i];
	$id_number			= $_POST['id_number'.$i];
	
	$tambah	= 'insert into flight_passenger(id_flight_passenger,id_flight_booking,name,id_number) value
		("'.$id_flight_passenger.'","'.$id_flight_booking.'","'.$name.'","'.$id_number.'")';
	$tambah2   = mysqli_query($koneksi,$tambah) or die (mysqli_error());
	
	if($tambah2){
		echo'<script>
			alert("You Successfuly Added Data Booking Flight");
			window.location="../user/index_u.php?page=trans";
		</script>';
	}
	}
	}
?>