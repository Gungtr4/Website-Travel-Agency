<table align="center">
	<thead>
    	<th>
        	DELETE FLIGHT
            <?php
				if(isset($_GET['kode'])){
					$q 			  ='SELECT * FROM flight WHERE flight_no="'.$_GET['kode'].'"LIMIT 1 ';
					$p 			  = mysqli_query($koneksi,$q) or die (mysqli_error());
					$r 			  = mysqli_fetch_array($p);
					$flight_no    = $r['flight_no'];
					$arrive	      = $r['arrive'];
					$depart	      = $r['depart'];
					$arrive_time  = $r['arrive_time'];
					$depart_time  = $r['depart_time'];
					}
            ?>
            Are you sure do you want to delete "<?php echo $arrive?>" ?
            <form method="post">
            <input type="hidden" name="flight_no" value="<?php echo $flight_no?>"/>
            <input type="submit" name="delete" value="Yes"/>
            <a href="index.php?halaman=flight"><input type="button" value="Cancel" /></a>
            </form>
            
                 <?php
				if(isset($_POST['delete'])){
				$h_flight_no  =$_POST['flight_no'];
				$hq			  = 'DELETE FROM flight WHERE flight_no="'.$h_flight_no.'"';
				$hp			  = mysqli_query ($koneksi,$hq)	or die(mysqli_error());
				if($hp){
					echo'
						<script>
							alert("You Have Successfully Deleted The Flight Data");
							window.location="index.php?halaman=flight";
						</script>';
					}
				}
			?>
        </th>
    </thead>
</table>