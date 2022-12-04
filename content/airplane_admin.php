<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("../content/airplane_admin_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("../content/airplane_admin_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("../content/airplane_admin_hapus.php");
}
?>

<h5>Content Airplane Admin</h5>
<p align="center"><a href="index.php?halaman=airplane&form=tambah">
<input type="button" value="ADD Airplane"></a></p>

<table align="center" width="600" border="1">
<thead>
		<th>No</th>
        <th>AirplaneID</th>
        <th>Airplane Name</th>
        <th>Type</th>
        <th>Eco Seat</th>
        <th>Business Seat</th>
        <th>EDIT</th>
        <th>DELETE</th>
</thead>
<tbody>
<?php
	$no	 =1;
	$a	 ='SELECT * FROM airplane';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_airplane	= $d['id_airplane'];
			$airplane_name	= $d['airplane_name'];
			$type			= $d['type'];
			$eco_seat	    = $d['eco_seat'];
			$business_seat	= $d['business_seat'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_airplane.'</td>
					<td>'.$airplane_name.'</td>
					<td>'.$type.'</td>
					<td>'.$eco_seat.'</td>
					<td>'.$business_seat.'</td>
					<td><a href="index.php?halaman=airplane&form=edit&kode='.$id_airplane.'">EDIT</td>
					<td><a href="index.php?halaman=airplane&form=hapus&kode='.$id_airplane.'">DELETE</td>				
				</tr>';
			$no++;
		}
	}
?>
</tbody>
</table>
