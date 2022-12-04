<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
if (isset($_GET['id'])){
	include("../koneksi.php");
	include("../function.php");
	$Lastid	= IDotomatis('flight_booking');
	session_start();
	if (isset($_SESSION['iduser'])){
	$id	=user($_SESSION['iduser']);
	$psg=	$_SESSION['psg'];
		}
?>
<form method="post" enctype="multipart/form-data">
	<div><input type="hidden" readonly="readonly" name="kode" value="<?PHP echo $Lastid ?>"></div>
	
	<div><input type="text" disabled="disabled" value="<?PHP echo $id ?>"</div>
	<div><input type="hidden" readonly name="id_user" value="<?PHP echo $id ?>"</div>
	
	<div><input type="text" disabled="disabled" value="<?PHP echo $_GET['id'] ?>"</div>
	<div><input type="hidden" readonly name="flight_no" value="<?PHP echo $_GET['id'] ?>"</div>
	
	<div><input type="date" name="date" value="date-now"></div>
	
			
	<div><input type="submit" name="book" value="Selanjutnya"</div>
		<hr>
</form>

<table class="w3-table w3-striped">
    <tr>
      <th>Airplane</th>
      <th>Depart</th>
      <th>Depart Time</th>
      <th>Arrive</th>
      <th>Arrive Time</th>
      <th>Ticket Fare</th>
      <th>Total Payment</th>
    </tr>
<?php
$q	='select * from flight join flight_fare on flight.flight_no=flight_fare.flight_no='.$_GET['id'].' limit 1';
$p 	= mysqli_query($koneksi,$q) or die(mysqli_error($koneksi));
$n	= mysqli_num_rows($p);
$r	=mysqli_fetch_array($p);{
		$arp	=$r['id_airplane'];
		$depart	=$r['depart'];
		$arrive	=$r['arrive'];
		$at		=$r['arrive_time'];
		$dt		=$r['depart_time'];
		$fare	=$r1['fare'];
		$tp		=($psg * $fare);
	}
}
echo'
    <tr>
      <td>'.$arp.'</td>
      <td>'.$depart.'</td>
      <td>'.$dt.'</td>
      <td>'.$arrive.'</td>
      <td>'.$at.'</td>
      <td>'.$psg.' &nbsp;passanger('.$fare.')</td>
	  <td>'.$tp.'</td>
    </tr>';
	
	?>
<?PHP   ?>
</body>
</html>
