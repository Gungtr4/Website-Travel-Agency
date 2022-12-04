<form method="post" enctype="multipart/form-data">
	<div>From</div>
	<?php
	$qsk = 'select * from station';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="asal">
		 	<option value=>-</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_station'];
				$kname = $rsk['station_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">['.$kcode.']&nbsp;'.$kname.'&nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	<div>Destination</div>
	<?php
	$qsk = 'select * from station';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="tujuan">
		 	<option value=>-</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_station'];
				$kname = $rsk['station_name'];
				$kcity = $rsk['city'];
				echo'<option value="'.$kcode.'">['.$kcode.']&nbsp;'.$kname.'&nbsp;'.$kcity.'</option>';	
				}
			}
			echo "</select>"
			?>
	<div>Depart Time</div>
	<input type="date" name="waktu_berangkat">
	<div>Class Seat</div><select name="class">
		 	<option value=>-</option>
<option value="Economy">Economy</option>
<option value="Bussines">Bussines</option>
<option value="Executive">Executive</option>
			</select>
	<div><input type="submit" name="search" value="Search"></div>
</form>

<?php
if(isset($_POST['search'])){
		$from	=$_POST['asal'];
		$desti	=$_POST['tujuan'];
		$time	=$_POST['waktu_berangkat'];
		$class	=$_POST['class'];
	
		$search	='select * from train_route join train_fare on train_route.id_route=train_fare.id_route where depart="'.$from.'" and arrive="'.$desti.'" and depart_date="'.$time.'" AND class="'.$class.'"';
		$exec = mysqli_query($koneksi,$search)or die(mysqli_error());
		$n	  = mysqli_num_rows($exec);		
	if ($n!=0){
	echo "<center>";
	echo "<h2> Search Result </h2>";
	echo "<table border='1' cellpadding='5' cellspacing='8'>";
	echo "
	<tr bgcolor='orange'>
	 	<td>Route Number</td>
		<td>Airplane</td>
		<td>Departure</td>
		<td>Departure Time</td>
		<td>Depature Date</td>
		<td>Arrival</td>
		<td>Arrival Time</td>
		<td>Arrival Date</td>
		<td>Class</td>
		<td>Fare</td>
		<td>Action</td>
	</tr>";
while ($data = mysqli_fetch_array($exec)) { 
	$fn	=$data['id_route'];
	$arr= station($data['depart']);
	$dep= station($data['arrive']);
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
	
	<td><a href="#">Detail</a></td>
	</tr>';
}
echo "</table>";			
}
	else{
		echo "<center>";
		echo "<h2> Search Result </h2>";
		echo "<table border='1' cellpadding='5' cellspacing='8'>";
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

if(isset($_GET['fn']) && isset($_GET['fr'])){
	$LastID 	= IDOtomatis("train_booking");
	$id_booking	= $LastID;
	$id_user	= $_SESSION['iduser'];
	$id_fare  	= $_GET['fr'];
	$fare		= flightfare($id_fare);
	$passenger	= $_SESSION['psg'];
	date_default_timezone_set('Asia/Jakarta');
	$tgl		= mktime(date("d"),date("m"),date("Y"));
	$date		= date("Y-m-d", $tgl);
	$pay		= ($passenger * $fare);
	
	$i	= 'insert into train_booking(id_train_booking,id_user,id_fare_train,passenger_total,date,payment)value
		("'.$id_booking.'","'.$id_user.'","'.$id_fare.'","'.$passenger.'","'.$date.'","'.$pay.'")';
	
	$ins2   = mysqli_query($koneksi,$i)or die(mysqli_error());
	
?>
	<form enctype="multipart/form-data" method="post" action="../content/multi_insert_flight_passenger.php">
	<?php
   		for($i=0;$i<$_SESSION['psg'];$i++){
		$LastID 	= IDOtomatis("flight_passenger");
  	?>
  		<table align="center">   
   			<tr>
            	<td colspan="3">Passenger <?php echo $i+1?></td>
            </tr>
            <tr>
            	<td>ID Number</td>
                <td>:</td>
                <td>
                	<input type="hidden" name="id_flight_booking<?php echo $i?>" value="<?php echo $id_booking?>"/>
                    <input type="text" name="id_number<?php echo $i?>" placeholder="id_number"/>
                </td>
            </tr>
            <tr>
            	<td>Passenger Name</td>
                <td>:</td>
                <td>
                	<input type="text" name="name<?php echo $i?>" placeholder="passenger name"/>
                </td>
            </tr>
  			
  	<?php
   		}
 	?>
    		<tr>
            	<td colspan="3">
  				<input type="hidden" name="jumlah" value="<?php echo $passenger?>"/>
  				<input type="submit" value="Simpan Data Booking"/>
                </td>
            </tr>
	</form>
    </table>
<?php
	/*
	
		
	*/
?>
	
	
	
<?php	
}
?>