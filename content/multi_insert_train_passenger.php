<?php
include("../koneksi.php");
include("../function.php");

//data booking
	$id_train_booking	= $_POST['id_train_booking'];
	$id_user			= $_POST['id_user'];
	$id_fare_train		= $_POST['id_fare_train'];
	$passenger_total	= $_POST['passenger_total'];
	$date				= $_POST['date'];
	$payment			= $_POST['payment'];
	
	$ins	= 'insert into train_booking(id_train_booking,id_user,id_fare_train,passenger_total,date,payment)value
		("'.$id_train_booking.'","'.$id_user.'","'.$id_fare_train.'","'.$passenger_total.'","'.$date.'","'.$payment.'")';
	$ins2   = mysqli_query($koneksi,$ins) or die (mysqli_error());
	
if($ins2){	
for($i=0;$i<$_POST['passenger_total'];$i++){
	
	$id_train_passenger  = IDOtomatis("train_passenger");
 	$id_train_booking	= $_POST['id_train_booking'.$i];
	$name				= $_POST['name'.$i];
	$id_number		   = $_POST['id_number'.$i];
	
	$tambah	= 'insert into train_passenger(id_train_passenger,id_train_booking,name,id_number) value
		("'.$id_train_passenger.'","'.$id_train_booking.'","'.$name.'","'.$id_number.'")';
	$tambah2   = mysqli_query($koneksi,$tambah) or die (mysqli_error());
	
	if($tambah2){
		echo'<script>
			alert("You Successfuly Added Data Booking Train");
			window.location="../user/index_u.php?page=trans";
		</script>';
	}
}
}

?>