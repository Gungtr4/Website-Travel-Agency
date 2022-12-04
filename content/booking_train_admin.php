<?php
	include("../koneksi.php");
?>

<p align="center">Data Booking Kereta</p>
<table align="center" width="600" border="1">
<thead>
		<th>No</th>
        <th>ID Train Booking</th>
        <th>ID Route</th>
        <th>Date</th>
        <th>Total Passenger</th>
        <th>Payment</th>
        <th>DETAIL</th>
        <th>DELETE</th>
</thead>
<tbody>
<?php
	$no	 = 1;
	$a	 = 'SELECT * FROM train_booking,train_fare WHERE train_booking.id_fare_train=train_fare.id_fare_train';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_train_booking	= $d['id_train_booking'];
			$id_route			= $d['id_route'];
			$date				= $d['date'];
			$passenger_total	= $d['passenger_total'];
			$payment			= $d['payment'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_train_booking.'</td>
					<td>'.$id_route.'</td>
					<td>'.$date.'</td>
					<td>'.$passenger_total.'</td>
					<td>'.$payment.'</td>	
					<td><a href="../content/detail_train_booking.php?kode='.$id_train_booking.'">DETAIL</a></td>	
					<td><a href="index.php?halaman=delete_booking_train&kode='.$id_train_booking.'">DELETE</a></td>		
				</tr>';
			$no++;
		}
	}else{
		echo'
			<tr align="center">
				<td colspan="7">Sorry, You Dont Have Data Booking Train</td>
			</tr>';
	}
?>
</tbody>
</table>