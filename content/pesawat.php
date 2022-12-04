<div class="banner-text"> 
<div class="book-form" id="register">
<p>Pick your destination</p>
<div class="testimonials" id="testimonials">
<div class="container">
<form method="post" enctype="multipart/form-data">
	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Travelling From</label>
	<?php
	$qsk = 'select * from airport';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="asal"class="form-control">
		 	<option value=>-</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_airport'];
				$kname = $rsk['airport_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">['.$kcode.']&nbsp;'.$kname.'&nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	</div>
	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Travelling To</label>
	<?php
	$qsk = 'select * from airport';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="tujuan"class="form-control">
		 	<option value=>-</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_airport'];
				$kname = $rsk['airport_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">['.$kcode.']&nbsp;'.$kname.'&nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	</div>
	<div class="col-md-3 form-date-w3-agileits">
	<label>Departure Date</label>
	<input type="date" name="waktu_berangkat" id="datepicker1">
	</div>
	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Class</label>
	 	<select name="class" class="form-control">
		 	<option value=>-</option>
<option value="Economy">Economy</option>
<option value="Business">Business</option>
			</select>
	</div>
	
<div class="clearfix"></div>
	<div class="banner-btm-agileits">
				<div class="col-md-4 bann-left-w3-agile">
					
				</div>
				<div class="col-md-4 button-agileits">
					<input type="submit" name="search" value="Search">
				</div>
				<div class="col-md-4 bann-right-wthree">
					
			
				</div>
			</div>
	</div>
		</div>
	
</form>

<?php
if(isset($_POST['search'])){
		$from	=$_POST['asal'];
		$desti	=$_POST['tujuan'];
		$time	=$_POST['waktu_berangkat'];
		$class	=$_POST['class'];
	
		$search	='select * from flight join flight_fare on flight.flight_no=flight_fare.flight_no where depart="'.$from.'" and arrive="'.$desti.'" and depart_date="'.$time.'" AND class="'.$class.'"';
		$exec = mysqli_query($koneksi,$search)or die(mysqli_error());
		$n	  = mysqli_num_rows($exec);		
	if ($n!=0){
	echo "<center>";
	echo "<h2> Search Result </h2>";
	echo "<table class='table table-hover'>";
	echo "
	<tr >
	 	<th>Flight Number</th>
		<th>Airplane</th>
		<th>Departure</th>
		<th>Departure Time</th>
		<th>Departure Date</th>
		<th>Arrival</th>
		<th>Arrival Time</th>
		<th>Arrival Date</th>
		<th>Class</th>
		<th>Fare /<sup>Seat</sup></th>
		<th>Action</th>
	</tr>";
while ($data = mysqli_fetch_array($exec)) { 
	$fn	=$data['flight_no'];
	$arr= airport($data['depart']);
	$dep= airport($data['arrive']);
	$arp= airplane($data['id_airplane']);
	$fr	= format_rupiah($data['fare']);
	$cl =$data['class'];
	echo '
	<tr>
	<td>'.$fn.'</td>
	<td>'.$arp.'</td>
	<td>'.$dep.'</td>
	<td>'.$data['depart_date'].'</td>
	<td>'.$data['depart_time'].'</td>
	<td>'.$arr.'</td>
	<td>'.$data['arrive_time'].'</td>
	<td>'.$data['arrive_date'].'</td>
	<td>'.$cl.'</td>
	<td>'.$fr.'</td>
	
	<td id="customers"><a href="content/detail.php?fn='.$fn.'&class='.$cl.'">Detail</a></td>
	</tr>';
}
echo "</table>";			
}
	else{
		echo "<center>";
		echo "<h2> Search Result </h2>";
		echo "<table class='table table-hover'>";
		echo "<tr bgcolor='orange'>
	 	<td>Flight Number</td>
		<td>Airplane</td>
		<td>Departure</td>
		<td>Departure Time</td>
		<td>Arrival</td>
		<td>Arrival Time</td>
		<td>Action</td>
		</tr>";
		echo'<tr>
		<td colspan=7 align=center>Sorry We Couldnt Find Any Plane For You</td> </tr>';
}
	echo "</table>";

}
?>

</div>
	</div>