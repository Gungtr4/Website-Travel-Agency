<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("../content/train_route_admin_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("../content/train_route_admin_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("../content/train_route_admin_hapus.php");
}
?>

<h5 align="center">Content Train Route</h5>

<p align="center"><a href="index.php?halaman=train_route&form=tambah">
<input type="button" value="ADD TRAIN ROUTE" /></a></p>

<table align="center" width="600" border="1">
<thead>
	<th>No</th>
    <th>RouteID</th>
    <th>Depart</th>
    <th>Arrive</th>
    <th>Depart Date</th>
    <th>Depart Time</th>
    <th>Arrive Date</th>
    <th>Arrive Time</th>
    <th>TrainID</th>
    <th>Economy</th>
    <th>Business</th>
    <th>Executive</th>
    <th>EDIT</th>
    <th>DELETE</th>
</thead>
<tbody>
<?php
	$no	=1;
  	$a	 ='SELECT * FROM train_route';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_route	 = $d['id_route'];
			$depart		 = $d['depart'];
			$arrive		 = $d['arrive'];
			$depart_date = $d['depart_date'];
			$depart_time = $d['depart_time'];
			$arrive_date = $d['arrive_date'];
			$arrive_time = $d['arrive_time'];
			$id_train	 = $d['id_train'];
			$ecofare	 = trainecofare($id_route);
			$busfare	 = trainbusfare($id_route);
			$execfare	 = trainexecfare($id_route);
			$f1			 = format_rupiah($ecofare);
			$f2			 = format_rupiah($busfare);
			$f3			 = format_rupiah($execfare);
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_route.'</td>
					<td>'.$depart.'</td>
					<td>'.$arrive.'</td>
					<td>'.$depart_date.'</td>
					<td>'.$depart_time.'</td>
					<td>'.$arrive_date.'</td>
					<td>'.$arrive_time.'</td>
					<td>'.$id_train.'</td>
					<td>'.$f1.'</td>
					<td>'.$f2.'</td>
					<td>'.$f3.'</td>
					<td><a href="index.php?halaman=train_route&form=edit&kode='.$id_route.'">EDIT</a></td>
					<td><a href="index.php?halaman=train_route&form=hapus&kode='.$id_route.'">DELETE</a></td>
				</tr>';
			$no++;
		}
	}
?>
</tbody>
</table>