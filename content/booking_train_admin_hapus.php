<table align="center">
	<thead>
    	<th>
        	DELETE TRAIN BOOKING
            <?php
				if(isset($_GET['kode'])){
					$q 			    ='SELECT * FROM train_booking WHERE id_train_booking="'.$_GET['kode'].'"LIMIT 1 ';
					$p 			    = mysqli_query($koneksi,$q) or die (mysqli_error());
					$r 			    = mysqli_fetch_array($p);
					$id_train_booking = $r['id_train_booking'];
				}
            ?>
            Are you sure do you want to delete "<?php echo $id_train_booking?>" ?
            <form method="post">
            <input type="hidden" name="id_train_booking" value="<?php echo $id_train_booking?>"/>
            <input type="submit" name="delete" value="Yes"/>
            <a href="index.php?halaman=booking_train"><input type="button" value="Cancel" /></a>
            </form>
            
                 <?php
				if(isset($_POST['delete'])){
				$id_train_booking   =$_POST['id_train_booking'];
				$hq			     = 'DELETE FROM train_booking WHERE id_train_booking="'.$id_train_booking.'"';
				$hp			     = mysqli_query ($koneksi,$hq)	or die(mysqli_error());
				if($hp){
					echo'
						<script>
							alert("You Have Successfully Deleted The Flight Data");
							window.location="index.php?halaman=booking_train";
						</script>';
					}
				}
			?>
        </th>
    </thead>
</table>