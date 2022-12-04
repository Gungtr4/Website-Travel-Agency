<?php
if(isset($_GET['form'])&& $_GET['form']=='tambah'){
	include("../content/flight_admin_tambah.php");
}else if(isset($_GET['form'])&& $_GET['form']=='edit'){
	include("../content/flight_admin_edit.php");
}else if(isset($_GET['form'])&& $_GET['form']=='hapus'){
	include("../content/flight_admin_hapus.php");
}
?>

<h1 align="center"><h5>Content Flight Admin</h5></h1>
<hr>
<p align="center"><a href="index.php?halaman=flight&form=tambah">
<input type="button" value="ADD FLIGHT"></a></p>

<table align="center" width="600" border="1">
	<thead>
    	<th>No</th>
    	<th>FlightNO</th>
        <th>Depart</th>
        <th>Arrive</th>
        <th>Depart Date</th>
        <th>Depart Time</th>
        <th>Arrive Date</th>
        <th>Arrive Time</th>
        <th>AirplaneID</th>
        <th>Economy Fare</th>
        <th>Business Fare</th>
        <th>EDIT</th>
        <th>DELETE</th>
</thead>

<tbody>
<?php
	$no = 1;
	$q  = 'SELECT * FROM flight';
	$p  = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n  = mysqli_num_rows($p);
	if($n !=0){
		while ($r = mysqli_fetch_array($p))
		{
		$flight_no	    = $r['flight_no'];
		$depart	        = $r['depart'];
		$arrive 	    = $r['arrive'];
		$depart_date	= $r['depart_date'];
		$depart_time    = $r['depart_time'];
		$arrive_date	= $r['arrive_date'];
		$arrive_time    = $r['arrive_time'];
		$id_airplane    = $r['id_airplane'];
		$ecofare		= flightecofare($flight_no);
		$busfare		= flightbusfare($flight_no);
		$f1			 	= format_rupiah($ecofare);
		$f2			 	= format_rupiah($busfare);
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$flight_no.'</td>
					<td>'.$depart.'</td>
					<td>'.$arrive.'</td>
					<td>'.$depart_date.'</td>
					<td>'.$depart_time.'</td>
					<td>'.$arrive_date.'</td>
					<td>'.$arrive_time.'</td>
					<td>'.$id_airplane.'</td>
					<td>'.$f1.'</td>
					<td>'.$f2.'</td>
					<td><a href="index.php?halaman=flight&form=edit&kode='.$flight_no.'">EDIT</a></td>
					<td><a href="index.php?halaman=flight&form=hapus&kode='.$flight_no.'">DELETE</a></td>
				</tr>';
		$no++;
		}
	}
?>
</tbody>
</table>