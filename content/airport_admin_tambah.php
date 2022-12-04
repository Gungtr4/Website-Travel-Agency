<?php
	$LastID =IDOtomatis("airport");
?>

<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h2>ADD AIRPORT</h2></td>
    </tr>
</table>
<table align="center">
	<tr>
    	<td>AirportID</td>
		<td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $LastID;?>">
            <input type="hidden" name="id_airport" value="<?php echo $LastID;?>">
        </td>
    </tr>
    <tr>
    	<td>Airport Name</td>
        <td>:</td>
        <td><input type="text" name="airport_name" required="required"></td>
    </tr>
    <tr>
    	<td>City</td>
        <td>:</td>
        <td><input type="text" name="city" required="required"></td>
    </tr>
	<tr>
    	<td>Gambar</td>
        <td>:</td>
        <td><input type="file" name="gambar" required="required"></td>
    </tr>
<table align="center">
	<tr>
    	<td><input type="submit" name="submit" value="Simpan">
        	<a href="index.php?halaman=airport"><input type="button" value="Batal"></a></td>
    </tr>
</table>
<?php
	if(isset($_POST['submit'])){
		$id_airport	    = $_POST['id_airport'];
		$airport_name	= $_POST['airport_name'];
		$city			= $_POST['city'];
		$file			= $_FILES['gambar']['tmp_name'];
			
		if(!empty($file)){
				$gambar	=$id_airport.''.$_FILES['gambar']['name'];
				$lokasi	='../images/'.$gambar.'';
			move_uploaded_file($file,$lokasi);
			}else{
				$gambar='';
			}
		$tambah		  = 'insert into airport(id_airport,airport_name,city,gambar)value
		("'.$id_airport.'","'.$airport_name.'","'.$city.'","'.$gambar.'")';
		$tambah2	     = mysqli_query($koneksi,$tambah) or die (mysqli_error());
		if($tambah2){
			echo'
			<script>
				alert("You Successfuly Added Airport Data");
				window.location="index.php?halaman=airport";	
			</script>';
		}
	}
?>
</table>
</form>