<?php
if(isset($_GET['form'])&& $_GET['form']=='tambah'){
	include("../content/station_admin_tambah.php");
}else if(isset($_GET['form'])&& $_GET['form']=='edit'){
	include("../content/station_admin_edit.php");
}else if(isset($_GET['form'])&& $_GET['form']=='hapus'){
	include("../content/station_admin_hapus.php");
}
?>

<h5>Content Station Admin</h5>

<p align="center"><a href="index.php?halaman=station&form=tambah">
<input type="button" value="ADD Station"></a></p>

<table align="center" width="600" border="1">
	<thead>
    	<th>No</th>
    	<th>StationID</th>
        <th>City</th>
        <th>Station Name</th>
        <th>Gambar</th>
        <th>EDIT</th>
        <th>DELETE</th>
</thead>

<tbody>
<?php
	$no = 1;
	$q  = 'SELECT * FROM station';
	$p  = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n  = mysqli_num_rows($p);
	if($n !=0){
		while ($r = mysqli_fetch_array($p))
		{
		$id_station   = $r['id_station'];
		$city	   	  = $r['city'];
		$station_name = $r['station_name'];
		$img		  = $r['gambar'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_station.'</td>
					<td>'.$city.'</td>
					<td>'.$station_name.'</td>
					<td><img width="100px" height="100px" src ="../images/'.$img.'" ></td>
					<td><a href="index.php?halaman=station&form=edit&kode='.$id_station.'">EDIT</a></td>
					<td><a href="index.php?halaman=station&form=hapus&kode='.$id_station.'">DELETE</a></td>
				</tr>';
		$no++;
		}
	}
?>
</tbody>
</table>