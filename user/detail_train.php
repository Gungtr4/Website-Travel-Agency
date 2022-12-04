<?php
	include("../koneksi.php");
	include("../function.php");
?>

<link rel="stylesheet" href="../css/css_detail.css" />
<link rel="stylesheet" href="../css/skeleton.css" />
<h3 align="center">DETAIL TRAIN BOOKING</h3>
<body background="../images/plane.jpg">
<table align="center" class="detail">
<?php
if(isset($_GET['kode'])){
	$q		= 'SELECT * FROM det_booking_train WHERE id_train_booking="'.$_GET['kode'].'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$r		= mysqli_fetch_array(($p));
					
	$id_train_booking	 = $r['id_train_booking'];
	$id_fare_train		 = $r['id_fare_train'];
 	$id_route		     = $r['id_route'];
	$date	  	   		 = $r['date'];
	$total_passenger	 = $r['passenger_total'];
	$class				 = $r['class'];
	$fare				 = $r['fare'];
	$payment	   		 = $r['payment'];
	$depart				 = $r['depart'];
	$depart_date		 = $r['depart_date'];
	$depart_time		 = $r['depart_time'];
	$arrive				 = $r['arrive'];
	$arrive_date		 = $r['arrive_date'];
	$arrive_time		 = $r['arrive_time'];
	$id_train		     = $r['id_train'];
	
echo'
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
	<td>'.format_rupiah($fare).'</td>
</tr>

<tr>
	<td>Total Passenger</td>
	<td>:</td>
	<td>'.$total_passenger.'</td>
</tr>
<tr>
	<td>Payment</td>
	<td>:</td>
	<td>'.format_rupiah($payment).'</td>
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
	<td>Train</td>
	<td>:</td>
	<td>'.train($id_train).'</td>
</tr>';
}
?>
<tr>
	<th colspan="3" align="center">Passanger</th>
	</tr>
	<?php
	$q		= 'SELECT * FROM train_passenger WHERE id_train_booking="'.$id_train_booking.'"';
  	$p		= mysqli_query($koneksi,$q) or die (mysqli_error());
	$c		= mysqli_num_rows($p);
	if($c !=0){
		while($d=mysqli_fetch_array($p))
	{
			$id_number			 = $d['id_number'];
			$name  	    		 = $d['name'];
echo'
     <tr >
	 	<td>NumberID</td>
		<td>:</td>
		<td>'.$id_number.'</td>
		
	 </tr>
	 <tr>
		<td>Name </td>
		<td>:</td>
		<td>'.$name.'</td>
	 </tr>';
	}
	}
?>
</table>

<table align="center">                   
 <tr>
   <td>
	<a href="../user/index_u.php?page=trans"><input type="button" value="Back"></a>
  </td>
 </tr>
</table>   
</body>