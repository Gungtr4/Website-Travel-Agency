<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("../content/train_admin_tambah.php");}
else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("../content/train_admin_edit.php");}
else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("../content/train_admin_hapus.php");}
?>

<h5>Content Train Admin</h5>
<p align="center"><a href="index.php?halaman=train&form=tambah">
<input type="button" value="ADD Train"></a></p>

<table align="center" width="600" border="1">
<thead>
	<th>No.</th>
    <th>TrainID</th>
    <th>Train Name</th>
    <th>ECO Seat</th>
    <th>Business Seat</th>
    <th>Exec Seat</th>
    <th>EDIT</th>
    <th>DELETE</th>
</thead>

<tbody>
<?php
	$no = 1;
	$a  = 'SELECT * FROM train';
	$b  = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c  = mysqli_num_rows($b);
	if ($c !=0){
		while ($r=mysqli_fetch_array($b))
	{
	$it  = $r['id_train'];
	$tn  = $r['train_name'];
	$es  = $r['eco_seat'];
	$bs  = $r['business_seat'];
	$est = $r['exec_seat'];
	echo'
		<tr align="center">
			<td>'.$no.'</td>
			<td>'.$it.'</td>
			<td>'.$tn.'</td>
			<td>'.$es.'</td>
			<td>'.$bs.'</td>
			<td>'.$est.'</td>
			<td><a href="index.php?halaman=train&form=edit&kode='.$it.'">EDIT</td>
			<td><a href="index.php?halaman=train&form=hapus&kode='.$it.'">DELETE</td>
		</tr>';
		$no++;
	}
}
?>
</tbody>
</table>