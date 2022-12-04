<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("../content/airport_admin_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("../content/airport_admin_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("../content/airport_admin_hapus.php");
}
?>

<h5>Content Airport Admin</h5>
<p align="center"><a href="index.php?halaman=airport&form=tambah">
<input type="button" value="ADD Airport"></a></p>
<table align="center" width="600" border="1">
<thead>
	<th>No</th>
    <th>AirportID</th>
    <th>Airport Name</th>
    <th>City</th>
	<th>Gambar</th>
    <th>EDIT</th>
    <th>DELETE</th>
</thead>
<tbody>
<?php
	$no	= 1;
	$a	 ='SELECT * FROM airport';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
	{
		$id_airport	    = $d['id_airport'];
		$airport_name	= $d['airport_name'];
		$city			= $d['city'];
		$img			= $d['gambar'];
		echo'
			<tr align="center">
				<td>'.$no.'</td>
				<td>'.$id_airport.'</td>
				<td>'.$airport_name.'</td>
				<td>'.$city.'</td>
				<td><img width="100px" height="100px" src =../images/'.$img.' ></td>
				<td><a href="index.php?halaman=airport&form=edit&kode='.$id_airport.'">EDIT</a></td>
				<td><a href="index.php?halaman=airport&form=hapus&kode='.$id_airport.'">DELETE</a></td>
			</tr>';
			$no++;
	}
}
			
?>
</tbody>
</table>