<?php
function IDOtomatis($table){
if($table=="user"){
	$id_table	="id_user";
	$kode		="USR";
}else if($table=="airport"){
	$id_table	="id_airport";
	$kode		="APT";
}else if($table=="airplane"){
	$id_table	="id_airplane";
	$kode		="APN";
}else if($table=="flight_booking"){
	$id_table	="id_flight_booking";
	$kode		="FBK";
}else if($table=="train_booking"){
	$id_table	="id_train_booking";
	$kode		="TBK";
}else if($table=="flight"){
	$id_table	="flight_no";
	$kode		="FLN";
}else if($table=="flight_fare"){
	$id_table	="id_fare_flight";
	$kode		="IFR";
}else if($table=="flight_passenger"){
	$id_table	="id_flight_passenger";
	$kode		="FPS";
}else if($table=="train_passenger"){
	$id_table	="id_train_passenger";
	$kode		="TPS";
}else if($table=="station"){
	$id_table	="id_station";
	$kode		="STN";
}else if($table=="train"){
	$id_table	="id_train";
	$kode		="TRN";
}else if($table=="train_fare"){
	$id_table	="id_fare_train";
	$kode		="IFR";
}else if($table=="train_route"){
	$id_table	="id_route";
	$kode		="TRO";
}
	global $koneksi;
	
$querycount		= "SELECT MAX(".$id_table.") as LastID FROM ".$table;
$result			= mysqli_query($koneksi,$querycount) or die(error_reporting(E_ERROR | E_PARSE));
$row			= mysqli_fetch_array($result);
$id				= $row['LastID'];
$num			= str_replace($kode,'',$id);
$num			= ( (int)$num+1 );
switch(strlen($num)){
		case 1		: $NoTrans	= $kode."0000".$num; break;
		case 2		: $NoTrans	= $kode."000".$num; break;
		case 3		: $NoTrans	= $kode."00".$num; break;
		case 4		: $NoTrans	= $kode."0".$num; break;
		default  	: $NoTrans	= $num;
}
return $NoTrans;
}

function format_rupiah($angka)
{
		$rupiah2   = number_format($angka,0,',','.');
		$rupiah	= "Rp.".$rupiah2;
		return $rupiah;
}

function formattgl()
{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal		= mkime(date("d"),date("m"),date("Y"));
		$tglsekarang	= datte("Y-m-d",$tanggal);
		return $tglsekarang;
}

function trainecofare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM train_fare WHERE id_route="'.$arp.'" AND class="Economy" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}

function trainbusfare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM train_fare WHERE id_route="'.$arp.'" AND class="Business" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}

function trainexecfare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM train_fare WHERE id_route="'.$arp.'" AND class="Executive" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}

function flightecofare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM flight_fare WHERE flight_no="'.$arp.'" AND class="Economy" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}

function flightbusfare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM flight_fare WHERE flight_no="'.$arp.'" AND class="Business" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}
function airport($air)
{
	global $koneksi;
	$search = 'SELECT airport_name FROM airport WHERE id_airport="'.$air.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error($koneksi));
	$data = mysqli_fetch_array($exec);
	$result = $data['airport_name'];
	return $result;
}
function airplane($arp)
{
	global $koneksi;
	$search = 'SELECT airplane_name FROM airplane WHERE id_airplane="'.$arp.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error($koneksi));
	$data = mysqli_fetch_array($exec);
	$result = $data['airplane_name'];
	return $result;
}
function station($stt)
{
	global $koneksi;
	$search = 'SELECT station_name FROM station WHERE id_station="'.$stt.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error($koneksi));
	$data = mysqli_fetch_array($exec);
	$result = $data['station_name'];
	return $result;
}
function train($trr)
{
	global $koneksi;
	$search = 'SELECT train_name FROM train WHERE id_train="'.$trr.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error($koneksi));
	$data = mysqli_fetch_array($exec);
	$result = $data['train_name'];
	return $result;
}function user($usr)
{
	global $koneksi;
	$search = 'SELECT name FROM user WHERE id_user="'.$usr.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error($koneksi));
	$data = mysqli_fetch_array($exec);
	$result = $data['name'];
	return $result;
}
function flightfare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM flight_fare WHERE id_fare_flight="'.$arp.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}
function trainfare($arp)
{
	global $koneksi;
	$search = 'SELECT fare FROM train_fare WHERE id_fare_train="'.$arp.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['fare'];
	return $result;
}
function booking($flightno,$class)
{
	global $koneksi;
	$search = 'SELECT * FROM flight_booking,flight_fare,flight WHERE flight.flight_no=flight_fare.flight_no AND flight_fare.id_fare_flight=flight_booking.id_fare_flight AND flight.flight_no="'.$flightno.'" AND flight_fare.class="'.$class.'"';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$jml=0;
	while($data = mysqli_fetch_array($exec)){
		$jml = $jml+$data['passenger_total'];
	}
	$result = $jml;
	return $result;
}

function stok($table,$class,$id)
{
	global $koneksi;
	if ($table=="airplane"){
		$idt="id_airplane";
	}else if ($table=="train"){
		$idt="id_train";
	}
	
	if ($class=="Economy"){
		$cl="eco_seat";
	}else if ($class=="Business"){
		$cl="business_seat";
	}else if ($class=="Executive"){
		$cl="exec_seat";
	}
	
	$search = 'SELECT '.$cl.' AS seat FROM '.$table.' WHERE '.$idt.'="'.$id.'" LIMIT 1';
    $exec = mysqli_query($koneksi,$search) or die(mysqli_error());
	$data = mysqli_fetch_array($exec);
	$result = $data['seat'];
	return $result;
}
?>
