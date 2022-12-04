<div class="banner-text"> 
<div class="book-form" id="register">
<p>Pick your destination</p>
<form method="post" enctype="multipart/form-data">

	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Travelling From</label>
	<?php
	$qsk = 'select * from station';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="asal" class="form-control">
		 	<option>From 	:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_station'];
				$kname = $rsk['station_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">'.$kname.'&nbsp;|&nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	</div>
	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Travelling To</label>
	<?php
	$qsk = 'select * from station';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="tujuan" class="form-control">
		 	<option>Destination		:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_station'];
				$kname = $rsk['station_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">'.$kname.'&nbsp;| &nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	</div>
	<div class="col-md-3 form-date-w3-agileits">
	<label>Departure Date</label>
	<input type="date" id="datepicker1" required="" name="waktu_berangkat">
	</div>
	<div class="col-md-3 form-time-w3layouts">
	<label>Passanger</label>
	<input type="text" id="datepicker1" name="jumlah_penumpang">
	</div>
	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Class</label>
	<select class="form-control" name="clas">
			<option>Class:</option>
			<option value="Economy">Economy</option>
			<option value="Business">Business</option>
			<option value="Executive">Executive</option>
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
		$class	=$_POST['clas'];
		$psg	=$_POST['jumlah_penumpang'];
		//session
		$_SESSION['psg']=$psg;	
	
		$search	='select * from train_route join train_fare on train_route.id_route=train_fare.id_route where depart="'.$from.'" and arrive="'.$desti.'" and depart_date="'.$time.'" AND class="'.$class.'"';
		$exec = mysqli_query($koneksi,$search)or die(mysqli_error());
		$n	  = mysqli_num_rows($exec);		
	if ($n!=0){
	echo "<center>";
	echo "<h2> Search Result </h2>";
	echo "<table  class='table table-hover'>";
	echo "
	<tr>
	 	<th>Route Number</th>
		<th>Train</th>
		<th>Departure</th>
		<th>Departure Time</th>
		<th>Depature Date</th>
		<th>Arrival</th>
		<th>Arrival Time</th>
		<th>Arrival Date</th>
		<th>Class</th>
		<th>Fare</th>
		<th>Action</th>
	</tr>";
while ($data = mysqli_fetch_array($exec)) { 
	$fn	=$data['id_route'];
	$dep= station($data['depart']);
	$arr= station($data['arrive']);
	$arp= train($data['id_train']);
	$fr	= format_rupiah($data['fare']);
	echo '
	<tr>
	<td>'.$fn.'</td>
	<td>'.$arp.'</td>
	<td>'.$dep.'</td>
	<td>'.$data['depart_time'].'</td>
	<td>'.$data['depart_date'].'</td>	
	<td>'.$arr.'</td>
	<td>'.$data['arrive_time'].'</td>
	<td>'.$data['arrive_date'].'</td>
	<td>'.$data['class'].'</td>
	<td>'.$fr.' / <sup>Seat</sup></td>
	
	<td><a href="../content/ptrain.php?fn='.$fn.'&fr='.$data['id_fare_train'].'">Booking</a></td>
	</tr>';
}
echo "</table>";			
}
	else{
		echo "<center>";
		echo "<h2> Search Result </h2>";
		echo "<table  class='table table-hover'>";
		echo "
	<tr>
	 	<th>Route Number</th>
		<th>Train</th>
		<th>Departure</th>
		<th>Departure Time</th>
		<th>Depature Date</th>
		<th>Arrival</th>
		<th>Arrival Time</th>
		<th>Arrival Date</th>
		<th>Class</th>
		<th>Fare</th>
		<th>Action</th>
	</tr>";
		echo'<tr>
		<td colspan=7 align=center>Sorry We Couldnt Find Any Train For You</td> </tr>';
}
	echo "</table>";

}
