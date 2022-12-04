<table align="center">
	<thead>
    	<th>
        	DELETE STATION
            <?php
				if(isset($_GET['kode'])){
					$q 			='SELECT * FROM station WHERE id_station="'.$_GET['kode'].'"LIMIT 1 ';
					$p 			= mysqli_query($koneksi,$q) or die (mysqli_error());
					$r 			= mysqli_fetch_array($p);
					$id_station   = $r['id_station'];
					$city		 = $r['city'];
					$station_name = $r['station_name'];
					}
            ?>
            Are you sure do you want to delete "<?php echo $city?>" ?
            <form method="post">
            <input type="hidden" name="id_station" value="<?php echo $id_station?>"/>
            <input type="submit" name="delete" value="Yes"/>
            <a href="index.php?halaman=station"><input type="button" value="Cancel" /></a>
            </form>
            
                 <?php
				if(isset($_POST['delete'])){
				$h_id_station  =$_POST['id_station'];
				$hq			= 'DELETE FROM station WHERE id_station="'.$h_id_station.'"';
				$hp			= mysqli_query ($koneksi,$hq)	or die(mysqli_error());
				if($hp){
					echo'
						<script>
							alert("You Successfuly Deleted Station Data");
							window.location="index.php?halaman=station";
						</script>';
					}
				}
			?>
        </th>
    </thead>
</table>