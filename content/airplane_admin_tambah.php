<?php
	$LastID = IDOtomatis("airplane");
?>
<form method="post" enctype="multipart/form-data">
<table align="center">
	<tr>
    	<td>ADD AIRPLANE</td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td>AirplaneID</td>
		<td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $LastID;?>" />
        	<input type="hidden" name="id_airplane" value="<?php echo $LastID;?>" />
        </td>
    </tr>
    <tr>
    	<td>Airplane Name</td>
        <td>:</td>
        <td><input type="text" name="airplane_name" required="required" /></td>
    </tr>
    <tr>
    	<td>Type</td>
        <td>:</td>
        <td><input type="text" name="type" required="required" /></td>
    </tr>
    <tr>
    	<td>Eco Seat</td>
        <td>:</td>
        <td><input type="text" name="eco_seat" required="required" /></td>
    </tr>
    <tr>
    	<td>Business Seat</td>
        <td>:</td>
        <td><input type="text" name="business_seat" required="required" /></td>
    </tr>
<table align="center">
    <tr>
    	<td><input type="submit" name="submit" value="Save" />
            <a href="index.php?halaman=airplane"><input type="button" value="Cancel" /></a>
        </td>
    </tr>
</table>

<?php
	if(isset($_POST['submit'])){
		$id_airplane	= $_POST['id_airplane'];
		$airplane_name  = $_POST['airplane_name'];
		$type		    = $_POST['type'];
		$eco_seat	    = $_POST['eco_seat'];
		$business_seat  = $_POST['business_seat'];
		
		$tambah	= 'insert into airplane(id_airplane,airplane_name,type,eco_seat,business_seat)value
		("'.$id_airplane.'","'.$airplane_name.'","'.$type.'","'.$eco_seat.'","'.$business_seat.'")';
		$tambah2   = mysqli_query($koneksi,$tambah) or die (mysqli_error());
		
		if($tambah2){
			echo'
			<script>
				alert("You Successfuly Added Airplane Data");
				window.location="index.php?halaman=airplane";
			</script>';
		}
	}
?>
</table>
</form>