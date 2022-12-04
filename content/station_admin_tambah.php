<?php
	$LastID = IDOtomatis("station");
?>

<form method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
    	<td><h2>ADD STATION</h2></td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td>StationID</td>
        <td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $LastID;?>" />
        	<input type="hidden" name="id_station" value="<?php echo $LastID;?>">
        </td>
    </tr>
    
    <tr>
    	<td>City</td>
        <td>:</td>
        <td><input type="text" name="city" required></td>
    </tr>
    
    <tr>
    	<td>Station Name</td>
        <td>:</td>
        <td><input type="text" name="station_name" required></td>
    </tr>
	<tr>
    	<td>Gambar</td>
        <td>:</td>
        <td><input type="file" name="gambar" required="required"></td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td><input type="submit" name="submit" value="Save">
        <a href="index.php?halaman=station"><input type="button" value="Cancel"></a></td>
    </tr>
</table>
</form>

<?php
	if(isset($_POST['submit'])){
		if (isset($_POST['submit'])){
			$t_id_station    = $_POST['id_station'];
			$t_city 		 = $_POST['city'];
			$t_station_name  = $_POST['station_name'];
			$file			= $_FILES['gambar']['tmp_name'];
			if(!empty($file)){
				$gambar	=$t_id_station.''.$_FILES['gambar']['name'];
				$lokasi	='../images/'.$gambar.'';
			move_uploaded_file($file,$lokasi);
			}else{
				$gambar='';
			}
		
			$tambah= 'INSERT into station(id_station,city,station_name,gambar)value("'.$t_id_station.'","'.$t_city.'","'.$t_station_name.'","'.$gambar.'")';
			$tambah2= mysqli_query($koneksi,$tambah) or die (mysqli_error());
		
		if($tambah2){
			echo'
			<script>
				alert("You Successfuly Added Station Data");
				window.location="index.php?halaman=station";
			</script>';
			}
		}
	}
?>
</table>
</form>