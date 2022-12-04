<table align="center">
	<thead>
    	<th>
        	DELETE FLIGHT BOOKING
            <?php
				if(isset($_GET['kode'])){
					$q 			  ='SELECT * FROM flight_booking WHERE id_flight_booking="'.$_GET['kode'].'"LIMIT 1 ';
					$p 			  = mysqli_query($koneksi,$q) or die (mysqli_error());
					$r 			  = mysqli_fetch_array($p);
					$id_flight_booking = $r['id_flight_booking'];
				}
            ?>
            Are you sure do you want to delete "<?php echo $id_flight_booking?>" ?
            <form method="post">
            <input type="hidden" name="id_flight_booking" value="<?php echo $id_flight_booking?>"/>
            <input type="submit" name="delete" value="Yes"/>
            <a href="index.php?halaman=booking_flight"><input type="button" value="Cancel" /></a>
            </form>
            
                 <?php
				if(isset($_POST['delete'])){
				$id_flight_booking  =$_POST['id_flight_booking'];
				$hq			     = 'DELETE FROM flight_booking WHERE id_flight_booking="'.$id_flight_booking.'"';
				$hp			     = mysqli_query ($koneksi,$hq)	or die(mysqli_error());
				if($hp){
					echo'
						<script>
							alert("You Have Successfully Deleted The Flight Data");
							window.location="index.php?halaman=booking_flight";
						</script>';
					}
				}
			?>
        </th>
    </thead>
</table>