<?php
	include("../koneksi.php");
?>

<p align="center">Data Booking Pesawat</p>
<table align="center" width="600" border="1">
<thead>
		<th>No</th>
        <th>ID Flight Booking</th>
        <th>Flight Number</th>
        <th>Date</th>
        <th>Total Passenger</th>
        <th>Payment</th>
        <th>DETAIL</th>
        <th>DELETE</th>
</thead>
<tbody>
<?php
	$no	 = 1;
	$a	 = 'SELECT * FROM flight_booking,flight_fare WHERE flight_booking.id_fare_flight=flight_fare.id_fare_flight';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_flight_booking	= $d['id_flight_booking'];
			$flight_no			= $d['flight_no'];
			$date				 = $d['date'];
			$passenger_total	  = $d['passenger_total'];
			$payment			  = $d['payment'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_flight_booking.'</td>
					<td>'.$flight_no.'</td>
					<td>'.$date.'</td>
					<td>'.$passenger_total.'</td>
					<td>'.$payment.'</td>
					<td><a href="../content/detail_flight_booking.php?kode='.$id_flight_booking.'">DETAIL</a></td>	
					<td><a href="index.php?halaman=delete_booking_flight&kode='.$id_flight_booking.'">DELETE</a></td>					
				</tr>';
			$no++;
		}
	}else{
		echo'
			<tr align="center">
				<td colspan="8" align="centre">Sorry, You Dont Have Data Booking Flight</td>
			</tr>';
	}
?>
</tbody>
</table>

