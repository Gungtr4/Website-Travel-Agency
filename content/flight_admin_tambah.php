<?php
	$LastID = IDOtomatis("flight");
	$LastIDfare = IDOtomatis("flight_fare");
?>

<form method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
    	<td>ADD FLIGHT</td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td>FlightNO</td>
        <td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $LastID;?>" />
        	<input type="hidden" name="flight_no" value="<?php echo $LastID;?>">
        </td>
    </tr>
    
    <tr>
    	<td>Depart</td>
        <td>:</td>
        <td>
			<?php
				$qsk = 'select * from airport';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="depart">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airport'];
						 $name	 = $rsk['airport_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
					echo "</select>"
			?>
           </td>
    </tr>
    
    <tr>
    	<td>Arrive</td>
        <td>:</td>
        <td>
        	<?php
				$qsk = 'select * from airport';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="arrive">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airport'];
						 $name	 = $rsk['airport_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
					echo "</select>"
			?>
        </td>
    </tr>
    
    <tr>
    	<td>Depart Date</td>
        <td>:</td>
        <td><input type="date" name="depart_date" required></td>
    </tr>
    
    <tr>
    	<td>Depart Time</td>
        <td>:</td>
        <td><input type="time" name="depart_time" required></td>
    </tr>
    
    <tr>
    	<td>Arrive Date</td>
        <td>:</td>
        <td><input type="date" name="arrive_date" required></td>
    </tr>
    
    <tr>
    	<td>Arrive Time</td>
        <td>:</td>
        <td><input type="time" name="arrive_time" required></td>
    </tr>
    
    <tr>
    	<td>AirplaneID</td>
        <td>:</td>
        <td>
        <?php
				$qsk = 'select * from airplane';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="id_airplane">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airplane'];
						 $name	 = $rsk['airplane_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
					echo "</select>"
			?>
          </td>
    </tr>
    <tr>
    	<td>Fare Economy</td>
        <td>:</td>
        <td><input type="text" name="eco_fare" required></td>
    </tr>
    <tr>
    	<td>Fare Business</td>
        <td>:</td>
        <td><input type="text" name="bus_fare" required></td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td><input type="submit" name="submit" value="Simpan">
        <a href="index.php?halaman=flight"><input type="button" value="Batal"></a></td>
    </tr>
</table>
</form>

<?php
	if (isset($_POST['submit'])){
			$t_flight_no 	  = $_POST['flight_no'];
			$t_depart 	      = $_POST['depart'];
			$t_arrive 	      = $_POST['arrive'];
			$t_depart_date	  = $_POST['depart_date'];
			$t_depart_time    = $_POST['depart_time'];
			$_t_arrive_date   = $_POST['arrive_date'];
			$t_arrive_time    = $_POST['arrive_time'];
			$t_id_airplane	  = $_POST['id_airplane'];
			$classeco		  = "Economy";
			$eco_fare		  = $_POST['eco_fare'];
			$classbus		  = "Business";
			$bus_fare		  = $_POST['bus_fare'];
			
			//tambah flight
			$tambah= 'insert into flight
	(flight_no,depart,arrive,depart_date,depart_time,arrive_date,arrive_time,id_airplane)value("'.$t_flight_no.'","'.$t_depart.'",
	"'.$t_arrive.'","'.$t_depart_date.'","'.$t_depart_time.'","'.$_t_arrive_date.'","'.$t_arrive_time.'","'.$t_id_airplane.'")';
			$exec= mysql_query($tambah) or die (mysql_error());
			
			//tambah fare economy
			$tambah1='INSERT INTO flight_fare (id_fare_flight,flight_no,class,fare)value("'.$LastIDfare.'","'.$t_flight_no.'","'.$classeco.'","'.$eco_fare.'")';
			$exec1= mysql_query($tambah1) or die (mysql_error());
			
			//tambah fare business
			$LastIDfare2 = IDOtomatis("flight_fare");
			$tambah2='INSERT INTO flight_fare (id_fare_flight,flight_no,class,fare)value("'.$LastIDfare2.'","'.$t_flight_no.'","'.$classbus.'","'.$bus_fare.'")';
			$exec2= mysql_query($tambah2) or die (mysql_error());
		
		if($exec){
			echo'
			<script>
				alert("You Successfuly Added Flight Data");
				window.location="index.php?halaman=flight";
			</script>';
		}
	}
?>
</table>
</form>