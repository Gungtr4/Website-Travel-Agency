<link rel="stylesheet" href="../css/bootstrap.css">
<?php
	include("../koneksi.php");
	include("../function.php");
session_start();

if(isset($_GET['fn']) && isset($_GET['fr'])){
	$LastID 		= IDOtomatis("train_booking");
	$id_booking	= $LastID;
	$id_user	   = $_SESSION['iduser']; 
	$id_fare  	   = $_GET['fr'];
	$fare		  = trainfare($id_fare);
	$passenger 	 = $_SESSION['psg'];
	date_default_timezone_set('Asia/Jakarta');
	$tgl		   = mktime(date("d"),date("m"),date("Y"));
	$date		  = date("Y-m-d", $tgl);
	$pay		   = $fare*$passenger;
	
?>
	<form enctype="multipart/form-data" method="post" action="../content/multi_insert_train_passenger.php">
	<?php
   		for($i=0;$i<$_SESSION['psg'];$i++){
		$LastID 	= IDOtomatis("train_passenger");
  	?>
  		<table align="center" class="table table-hover">   
   			<tr>
            	<td colspan="3">Passenger <?php echo $i+1?></td>
            </tr>
            <tr>
            	<td>ID Number</td>
                <td>:</td>
                <td>
                	<input type="hidden" name="id_train_booking<?php echo $i?>" value="<?php echo $id_booking?>"/>
                    <input type="text" name="id_number<?php echo $i?>" placeholder="id_number"/>
                </td>
            </tr>
            <tr>
            	<td>Passenger Name</td>
                <td>:</td>
                <td>
                	<input type="text" name="name<?php echo $i?>" placeholder="passenger name"/>
                </td>
            </tr>
  			
  	<?php
   		}
 	?>
    		<tr>
            	<td colspan="3">
  				<input type="hidden" name="id_train_booking" value="<?php echo $id_booking?>"/>
                <input type="hidden" name="id_user" value="<?php echo $id_user?>"/>
                <input type="hidden" name="id_fare_train" value="<?php echo $id_fare?>"/>
                <input type="hidden" name="passenger_total" value="<?php echo $passenger?>"/>
                <input type="hidden" name="date" value="<?php echo $date?>"/>
                <input type="hidden" name="payment" value="<?php echo $pay?>"/>
  				<input type="submit" value="Simpan Data Booking"/>
                <a href="../user/index_u.php?page=plane"><input type="button" value="Cancel" />
                </td>
            </tr>
	</form>
    </table>	
<?php	
}
?>