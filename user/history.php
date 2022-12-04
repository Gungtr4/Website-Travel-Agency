<div class="testimonials" id="testimonials">
	<div class="container">
	<h3 class="title-agileits-w3layouts">Your Plane Booking History </h3>
<div class="w3_testimonials_grids">
<section class="slider_test_monials">
<div class="flexslider">
<table  class='table table-hover'>
<thead>
		<th>No</th>
        <th>ID Flight Booking</th>
        <th>Flight Number</th>
        <th>Date</th>
        <th>Total Passenger</th>
        <th>Payment</th>
        <th>Detail</th>
</thead>
<tbody>
<?php
	$no	 = 1;
	$a	 = 'SELECT * FROM flight_booking,flight_fare WHERE flight_booking.id_fare_flight=flight_fare.id_fare_flight AND id_user="'.$_SESSION['iduser'].'"';
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
					<td><a href="detail_flight.php?kode='.$id_flight_booking.'">Detail</a></td>						
				</tr>';
			$no++;
		}
	}else{
		echo'
			<tr align="center">
				<td colspan="7">Sorry, You Dont Have Data Booking Flight</td>
			</tr>';
	}
?>
</tbody>
</table>
</div>
</div>
</div>
</div>



<div class="testimonials" id="testimonials">
	<div class="container">
	<h3 class="title-agileits-w3layouts">Your Train Booking History </h3>
<div class="w3_testimonials_grids">
<section class="slider_test_monials">
<div class="flexslider">
<table  class='table table-hover'>
<thead>
		<th>No</th>
        <th>ID Train Booking</th>
        <th>ID Route</th>
        <th>Date</th>
        <th>Total Passenger</th>
        <th>Payment</th>
        <th>Detail</th>
</thead>
<tbody>
<?php
	$no	 = 1;
	$a	 = 'SELECT * FROM train_booking,train_fare WHERE train_booking.id_fare_train=train_fare.id_fare_train AND id_user="'.$_SESSION['iduser'].'"';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_train_booking	= $d['id_train_booking'];
			$id_route			= $d['id_route'];
			$date				= $d['date'];
			$passenger_total	 = $d['passenger_total'];
			$payment			 = $d['payment'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_train_booking.'</td>
					<td>'.$id_route.'</td>
					<td>'.$date.'</td>
					<td>'.$passenger_total.'</td>
					<td>'.$payment.'</td>	
					<td><a href="detail_train.php?kode='.$id_train_booking.'">Detail</a></td>			
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
</div>
</div>
</div>
</div>