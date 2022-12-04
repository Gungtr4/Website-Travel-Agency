<head>
	<link rel="stylesheet" href="../css/skeleton.css">
	
</head>
<?php
	include("../koneksi.php");
	include("../function.php");
?>
<h3 align="center"> Detail <span> Train Booking </span></h3>
<?php
if(isset($_GET['kode'])){
	$q		= 'SELECT * FROM train_booking inner join (train_fare inner join train_route on train_fare.id_route=train_route.id_route) on train_booking.id_fare_train=train_fare.id_fare_train WHERE id_train_booking="'.$_GET['kode'].'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$r		= mysqli_fetch_array(($p));
					
	$id_train_booking	 = $r['id_train_booking'];
	$id_fare_train		= $r['id_fare_train'];
 	$id_route		     = $r['id_route'];
	$date	  	   		 = $r['date'];
	$total_passenger	  = $r['passenger_total'];
	$class				= $r ['class'];
	$fare				 = $r ['fare'];
	$payment	   		  = $r['payment'];
	$depart			   = $r['depart'];
	$depart_date		  = $r['depart_date'];
	$depart_time		  = $r['depart_time'];
	$arrive			   = $r['arrive'];
	$arrive_date		  = $r['arrive_date'];
	$arrive_time		  = $r['arrive_time'];
	$id_train			 = $r['id_train'];
	
echo'

<table border="0"  align="center">
<tr>
	<td>Train Route </td>
	<td>:</td>
	<td>'.$id_route.'</td>
</tr>
<tr>
	<td>Date Booking</td>
	<td>:</td>
	<td>'.$date.'</td>
</tr>
<tr>
	<td>Class</td>
	<td>:</td>
	<td>'.$class.'</td>
</tr>
<tr>
	<td>Fare class</td>
	<td>:</td>
	<td>'.$fare.'</td>
</tr>

<tr>
	<td>Total Passenger</td>
	<td>:</td>
	<td>'.$total_passenger.'</td>
</tr>
<tr>
	<td>Paymen</td>
	<td>:</td>
	<td>'.$payment.'</td>
</tr>

<tr>
	<td>Depart</td>
	<td>:</td>
	<td>'.station($depart).'</td>
</tr>
<tr>
	<td>Depart Date	</td>
	<td>:</td>
	<td>'.$depart_date.'</td>
</tr>
<tr>
	<td>Depart Time</td>
	<td>:</td>
	<td>'.$depart_time.'</td>
</tr>
<tr>
	<td>Arrive</td>
	<td>:</td>
	<td>'.station($arrive).'</td>
</tr>
<tr>
	<td>Arrive Date</td>
	<td>:</td>
	<td>'.$arrive_date.'</td>
</tr>
<tr>
	<td>Arrive Time	</td>
	<td>:</td>
	<td>'.$arrive_time.'</td>
</tr>
<tr>
	<td>Airplane</td>
	<td>:</td>
	<td>'.train($id_train).'</td>
</tr>';
}
?>
<tr>
	<th colspan="3">Passenger :</th>
</tr>
<?php
$q		= 'SELECT * FROM train_passenger WHERE id_train_booking="'.$id_train_booking.'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$c		= mysqli_num_rows($p);
	if($c !=0){
		while($d=mysqli_fetch_array($p))
	{
			$id_train_passenger  = $d['id_train_passenger'];
			$name  	    		 = $d['name'];
echo'
	
     <tr >
	 	<td>Id Train Passenger </td>
		<td>:</td>
		<td>'.$id_train_passenger.'</td>
		
	 </tr>
	 <tr>
		<td>Name </td>
		<td>:</td>
		<td>'.$name.'</td>
	 </tr>
	 ';
	}
	}
?>                  
 <tr>
   <td colspan="3" align="center">
	<a href="../admin/index.php?halaman=booking_train"><input type="button" value="Batal"></a>
  </td>
 </tr>
</table>   