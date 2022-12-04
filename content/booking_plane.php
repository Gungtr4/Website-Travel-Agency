<div class="banner-text"> 
<div class="book-form" id="register">
<p>Pick your destination</p>
<form method="post" enctype="multipart/form-data">

	<div class="col-md-3 form-left-agileits-w3layouts ">
	<label>Travelling To</label>
	<?php
	$qsk = 'select * from airport';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="asal" class="form-control">
		 	<option>From 	:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_airport'];
				$kname = $rsk['airport_name'];
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
	$qsk = 'select * from airport';
	$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
	$nsk = mysqli_num_rows($psk);
	echo '<select name="tujuan" class="form-control">
		 	<option>Destination		:</option>';
			if ($nsk!=0)
			{
				while($rsk = mysqli_fetch_array($psk)){
				$kcode = $rsk['id_airport'];
				$kname = $rsk['airport_name'];
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
			<option value="Business">Business</option>
			<option value="Economy">Economy</option>
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
	
</form>

<?php
if(isset($_POST['search'])){
		$from	=$_POST['asal'];
		$desti	=$_POST['tujuan'];
		$time	=$_POST['waktu_berangkat'];
		$psg	=$_POST['jumlah_penumpang'];
		$class	=$_POST['clas'];
		//session
		$_SESSION['psg']=$psg;
	
		$search	='select * from flight join flight_fare on flight.flight_no=flight_fare.flight_no where depart="'.$from.'" and arrive="'.$desti.'" and depart_date="'.$time.'" AND class="'.$class.'"';
		$exec = mysqli_query($koneksi,$search)or die(mysqli_error());
		$n	  = mysqli_num_rows($exec);		
	if ($n!=0){
	echo "<center>";
	echo "<p> Search Result </p>";
	echo "<table  class='table table-hover'>";
	echo "
	<tr>
	 	<th>Flight Number</th>
		<th>Airplane</th>
		<th>Departure</th>
		<th>Departure Time</th>
		<th>Arrival</th>
		<th>Arrival Time</th>
		<th>Class</th>
		<th>Fare</th>
		<th>Action</th>
	</tr>";
while ($data = mysqli_fetch_array($exec)) { 
	$fn	= $data['flight_no'];
	$dep= airport($data['depart']);
	$arr= airport($data['arrive']);
	$arp= airplane($data['id_airplane']);
	$fr	= format_rupiah($data['fare']);
	$stok  = stok("airplane",$data['class'],$data['id_airplane']);
	$book  = booking($fn,$data['class']);
	$sisa  = $stok-$book;
	echo '
	<tr>
	<td>'.$fn.'</td>
	<td>'.$arp.'</td>
	<td>'.$dep.'</td>
	<td>'.$data['depart_time'].'</td>
	<td>'.$arr.'</td>
	<td>'.$data['arrive_time'].'</td>
	<td>'.$data['class'].'</td>
	<td>'.$fr.'</td>
	<td>';
	if ($sisa>=$_SESSION['psg']){
			echo'<a href="../content/pplane.php?fn='.$fn.'&fr='.$data['id_fare_flight'].'">Booking</a>';
	}else if($sisa==0){
			echo'No Available Seat';
	}else{
			echo'Available Seat only &nbsp;'.$sisa.'';
		}
	echo'</td>
	</tr>';
}
echo "</table>";			
}
	else{
		echo "<center>";
		echo "<h2> Search Result </h2>";
		echo "<table  class='table table-hover'>";
		echo "<tr>
	 	<td>Flight Number</td>
		<td>Airplane</td>
		<td>Departure</td>
		<td>Departure Time</td>
		<td>Arrival</td>
		<td>Arrival Time</td>
		<td>Action</td>
		<td>Fare</td>
		
		</tr>";
		echo'<tr>
		<td colspan=7 align=center>Sorry We Couldnt Find Any Plane For You</td> </tr>';
}
	echo "</table>";

}

if(isset($_GET['fn']) && isset($_GET['fr'])){
	$LastID 	= IDOtomatis("flight_booking");
	$id_booking	= $LastID;
	$id_user	= $_SESSION['iduser'];
	$id_fare  	= $_GET['fr'];
	$fare		= flightfare($id_fare);
	$passenger	= $_SESSION['psg'];
	date_default_timezone_set('Asia/Jakarta');
	$tgl		= mktime(date("d"),date("m"),date("Y"));
	$date		= date("Y-m-d", $tgl);
	$pay		= ($passenger * $fare);
	
	$i	= 'insert into flight_booking(id_flight_booking,id_user,id_fare_flight,passenger_total,date,payment)value
		("'.$id_booking.'","'.$id_user.'","'.$id_fare.'","'.$passenger.'","'.$date.'","'.$pay.'")';
	
	$ins2   = mysqli_query($koneksi,$i)or die(mysqli_error());
	
?>
<div class="container">
  <h2>Passenger Form</h2>
	<form enctype="multipart/form-data" method="post" class="form-horizontal" action="../content/multi_insert_flight_passenger.php">
	<?php
   		for($i=0;$i<$_SESSION['psg'];$i++){
		$LastID 	= IDOtomatis("flight_passenger");
  	?>
  		<div class="form-group">
     	<label class="control-label col-sm-2">Passenger <?php echo $i+1?></label>
		</div>
              <div class="form-group">	
              <label class="control-label col-sm-2">Pasport </label>
              <div class="col-sm-10">
                	<input type="hidden" name="id_flight_booking<?php echo $i?>" value="<?php echo $id_booking?>"/>
                    <input type="text" class="form-control" name="id_number<?php echo $i?>" placeholder="Id Number"/>
               </div>
    		</div>
           		<div class="form-group">	
            	<label class="control-label col-sm-2">Passenger Name </label>
           		<div class="col-sm-10">
                	<input type="text" class="form-control" name="name<?php echo $i?>" placeholder="Passenger Name"/>
                </div>
    		</div>
  			
  	<?php
   		}
 	?>
     		<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
  				<input type="hidden" name="jumlah" value="<?php echo $passenger?>"/>
  				<input type="submit" class="btn btn-default" value="Simpan Data Booking"/>
             </div>
    </div>
	</form>
	</div>
    </div>
</div>
<?php
	/*
	
		
	*/
?>
	
	
	
<?php	
}
?>