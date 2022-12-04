<?php
	$lastID = IDOtomatis ("train_route");
	$LastIDfare = IDOtomatis("train_fare");
?>
<form method="post" enctype="multipart/form-data">

<table >
	<tr align="center">
		<td>ADD TRAIN ROUTE</td>
	</tr>
</table>

<table width="500px">
	<tr>
		<td>RouteID</td>
		<td>:</td>
		<td><input type="text" disabled="disabled" value="<?php echo $lastID;?>" />
			<input type="hidden" name="id_route" value="<?php echo $lastID;?>"></td>
	</tr>

	<tr>
		<td>Depart</td>
		<td>:</td>
		<td><?php
				$qsk = 'select * from station';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="depart">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode = $rsk['id_station'];
						 $nama = $rsk['station_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']'.$nama.'</option>';
				    }
				}
					echo "</select>"
			?>
        </td>
	</tr>

	<tr>
		<td>Arrive</td>
		<td>:</td>
		<td><?php
				$qsk = 'select * from station';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="arrive">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode = $rsk['id_station'];
						 $nama = $rsk['station_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']'.$nama.'</option>';
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
		<td>TrainID</td>
		<td>:</td>
		<td><?php
				$qsk = 'select * from train';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="id_train">
						 ';
					if ($nsk !=0)
					{
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode = $rsk['id_train'];
						 $nama = $rsk['train_name'];
					echo'<option value="'.$kkode.'">['.$kkode.']'.$nama.'</option>';
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
    
    <tr>
    	<td>Fare Executive</td>
        <td>:</td>
        <td><input type="text" name="exec_fare" required></td>
    </tr>
    
</table>

<table align="center">
	<tr>
		<td colspan="3" align="center"><input type="submit" name="submit" value="Save">
		<a href="index.php?halaman=train_route"><input type="button" value="Cancel" /></a></td>
	</tr>
</table>
</form>

<?php
if(isset($_POST['submit'])){
	$a  	  = $_POST['id_route'];
	$b  	  = $_POST['depart'];
	$c		  = $_POST['arrive'];
	$d 	      = $_POST['depart_time'];
	$e  	  = $_POST['arrive_time'];
	$f 		  = $_POST['id_train'];
	$g		  = $_POST['depart_date'];
	$h		  = $_POST['arrive_date'];
	$classeco = "Economy";
	$eco_fare = $_POST['eco_fare'];
	$classbus = "Business";
	$bus_fare = $_POST['bus_fare'];
	$classexec = "Executive";
	$exec_fare = $_POST['exec_fare'];
	
	//tambah train route
	$q_tambah = 'INSERT into train_route(id_route,depart,arrive,depart_time,arrive_time,id_train,depart_date,arrive_date) value ("'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$e.'","'.$f.'","'.$g.'","'.$h.'")';
	$p_tambah  = mysqli_query ($koneksi,$q_tambah) or die (mysqli_error());
	
	//tambah fare economy
			$tambah1='INSERT INTO train_fare (id_fare_train,id_route,class,fare)value("'.$LastIDfare.'","'.$a.'","'.$classeco.'","'.$eco_fare.'")';
			$exec1= mysqli_query($koneksi,$tambah1) or die (mysqli_error());
			
	//tambah fare business
			$LastIDfare2 = IDOtomatis("train_fare");
			$tambah2='INSERT INTO train_fare (id_fare_train,id_route,class,fare)value("'.$LastIDfare2.'","'.$a.'","'.$classbus.'","'.$bus_fare.'")';
			$exec2= mysqli_query($koneksi,$tambah2) or die (mysqli_error());
			
	//tambah fare executive
			$LastIDfare3 = IDOtomatis("train_fare");
			$tambah3='INSERT INTO train_fare (id_fare_train,id_route,class,fare)value("'.$LastIDfare3.'","'.$a.'","'.$classexec.'","'.$exec_fare.'")';
			$exec3= mysqli_query($koneksi,$tambah3) or die (mysqli_error());

	if ($p_tambah){
		echo ' <script>
		alert("You Successfuly Added Train Route Data");
		window.location="index.php?halaman=train_route";
		</script>';
	}
}
?>