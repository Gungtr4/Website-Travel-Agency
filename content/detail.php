<?php
	include("../koneksi.php");
	include("../function.php");
if(isset($_GET['fn'],$_GET['class'])){
	
	$q  = 'select * from flight join flight_fare on flight.flight_no=flight_fare.flight_no where flight.flight_no="'.$_GET['fn'].'" and flight_fare.class="'.$_GET['class'].'"';
	$p  = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n  = mysqli_num_rows($p);
	$r	= mysqli_fetch_array($p);

	$fn		=$r['flight_no'];
	$arp	= airplane($r['id_airplane']);	
	$dep	= airport($r['depart']);
	$dt		=$r['depart_time'];
	$dd		=$r['depart_date'];
	$arr	= airport($r['arrive']);
	$at		=$r['arrive_time'];
	$ad		=$r['arrive_date'];
	$class	=$r['class'];
	$fr	= format_rupiah($r['fare']);

	echo'
	
	<div>Flight Number		:'.$fn.'</div>
	<div>Airplane			:'.$arp.'</div>
	<div>Depart				:'.$dep.'</div>
	<div>Depart	Time		:'.$dt.'</div>
	<div>Depart	Date		:'.$dd.'</div>
	<div>Arrive				:'.$arr.'</div>
	<div>Arrive	Time		:'.$at.'</div>
	<div>Arrive	Date		:'.$ad.'</div>
	<div>Class				:'.$class.'</div>
	<div>Fare				:'.$fr.'</div>
	';
}
?>	
<div><a href="../index.php"><input type="button" value="Back"><a/></div>	
