<head>
	<link rel="stylesheet" href="../css/bootstrap.css">
	
</head>
<?php
	include("../koneksi.php");
	include("../function.php");
?>
<h3 align="center"> Detail <span> Flight Booking </span></h3>
<?php
if(isset($_GET['kode'])){
	$q		= 'SELECT * FROM flight_booking inner join (flight_fare inner join flight on flight_fare.flight_no=flight.flight_no) 		    on flight_fare.id_fare_flight=flight_booking.id_fare_flight WHERE id_flight_booking="'.$_GET['kode'].'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$r		= mysqli_fetch_array(($p));
					
	$id_flight_booking	 = $r['id_flight_booking'];
	$id_fare_flight		= $r['id_fare_flight'];
 	$flight_no		     = $r['flight_no'];
	$date	  	   		  = $r['date'];
	$total_passenger	   = $r['passenger_total'];
	$class				 = $r ['class'];
	$fare				  = $r ['fare'];
	$payment	   		   = $r['payment'];
	$depart				= $r['depart'];
	$depart_date		   = $r['depart_date'];
	$depart_time		   = $r['depart_time'];
	$arrive				= $r['arrive'];
	$arrive_date		   = $r['arrive_date'];
	$arrive_time		   = $r['arrive_time'];
	$id_airplane		   = $r['id_airplane'];
	
echo'

<table class="table table-hover">
<tr>
	<td>Flight No</td>
	<td>:</td>
	<td>'.$flight_no.'</td>
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
	<td>'.airport($depart).'</td>
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
	<td>'.airport($arrive).'</td>
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
	<td>'.airplane($id_airplane).'</td>
</tr>';
}

$q		= 'SELECT * FROM flight_passenger WHERE id_flight_booking="'.$id_flight_booking.'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$c		= mysqli_num_rows($p);
	if($c !=0){
		while($d=mysqli_fetch_array($p))
	{
			$id_flight_passenger  = $d['id_flight_passenger'];
			$name  	    		 = $d['name'];
echo'
	
     <tr >
	 	<td>Id Flight Passenger </td>
		<td>:</td>
		<td>'.$id_flight_passenger.'</td>
		
	 </tr>
	 <tr>
		<td>Name </td>
		<td>:</td>
		<td>'.$name.'</td>
	 </tr>
	 </table>';
	}
	}
?>
                  
 <tr>
   <td>
	<a href="../admin/index.php?halaman=booking_flight"><input type="button" value="Batal"></a>
  </td>
 </tr>
</table>   