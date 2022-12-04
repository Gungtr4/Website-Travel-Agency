<?php
	$lastID = IDOtomatis ("train");
?>
<form method="post" enctype="multipart/form-data">

<table >
	<tr align="center">
		<td>ADD TRAIN</td>
	</tr>
</table>

<table width="500px">
	<tr>
		<td>TrainID</td>
		<td>:</td>
		<td><input type="text" disabled="disabled" value="<?php echo $lastID;?>" />
			<input type="hidden" name="id_train" value="<?php echo $lastID;?>"></td>
	</tr>

	<tr>
		<td>Train Name</td>
		<td>:</td>
		<td><input type="text" name="train_name" required></td>
	</tr>

	<tr>
		<td>Economy Seat</td>
		<td>:</td>
		<td><input type="text" name="eco_seat" required></td>
	</tr>

	<tr>
		<td>Business Seat</td>
		<td>:</td>
		<td><input type="text" name="business_seat" required></td>
	</tr>

	<tr>
		<td>Executive Seat</td>
		<td>:</td>
		<td><input type="text" name="exec_seat" required></td>
	</tr>
</table>

<table align="center">
	<tr>
		<td colspan="3" align="center"><input type="submit" name="submit" value="Save">
		<a href="index.php?halaman=train"><input type="button" value="Cancel" /></a></td>
	</tr>
</table>
</form>

<?php
if(isset($_POST['submit'])){
	$a  = $_POST['id_train'];
	$b  = $_POST['train_name'];
	$c	= $_POST['eco_seat'];
	$d  = $_POST['business_seat'];
	$e  = $_POST['exec_seat'];
	
	$q_tambah = 'INSERT into train(id_train,train_name,eco_seat,business_seat,exec_seat) value ("'.$a.'","'.$b.'","'.$c.'","'.$d.'","'.$e.'")';
	$p_tambah = mysqli_query ($koneksi,$q_tambah) or die (mysqli_error());
	if ($p_tambah){
		echo ' <script>
		alert("You Successfuly Edded Train Data");
		window.location="index.php?halaman=train";
		</script>';
	}
}
?>