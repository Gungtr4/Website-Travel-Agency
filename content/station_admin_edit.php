<form enctype="multipart/form-data" method="post">
	<table align="center">
    	<tr>
        	<td align="center">
            	EDIT STATION
            <?php
            	if(isset($_GET['kode'])){
					$a	='SELECT * FROM station WHERE id_station="'.$_GET['kode'].'" LIMIT 1';
					$b	= mysqli_query($koneksi,$a) or die (mysqli_error());	
					$c	= mysqli_fetch_array($b);
					
					$id_station		= $c['id_station'];
					$station_name	= $c['station_name'];
					$city			= $c['city'];
					$gambar			= $c['gambar'];
			
			?>
            </td>
        </tr>
    </table>
    <table align="center">
    		<tr>
            	<td>Id station</td>
               	<td>:</td>
                <td><input type="text" disabled="" value="<?php echo $id_station;?>" />
                	<input type="hidden" name="id_station" value="<?php echo $id_station;?>" />
                </td>
            </tr>
            <tr>
            	<td>station Name</td>
                <td>:</td>
                <td><input type="text" name="station_name" value="<?php echo $station_name;?>" />
                </td>
            </tr>
            <tr>
            	<td>City</td>
                <td>:</td>
                <td><input type="text" name="city" value="<?php echo $city;?>" /></td>
            </tr>
			<tr>
            	<td>Gambar</td>
                <td>:</td>
                <td><input type="file" name="img" value="<?php echo $gambar;?>" /></td>
            </tr>
    <table align="center">
    		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save" />
                    <a href="index.php?halaman=station"><input type="button" value="Cancel" /></a>
                </td>
            </tr>
    </table>
    <?php
		if(isset($_POST['submit'])){
			$id_station		= $_POST['id_station'];
			$station_name	= $_POST['station_name'];
			$city			= $_POST['city'];
			$file			= $_FILES['img']['tmp_name'];
			
						if(!empty($file)){
				$gambar1	=$id_station.''.$_FILES['img']['name'];
				$lokasi	='../images/'.$gambar1.'';
				move_uploaded_file($file,$lokasi);
						}else{
				$gambar1= $gambar;
			}
				
			
			$edit	='UPDATE station SET station_name="'.$station_name.'",city="'.$city.'",gambar="'.$gambar1.'" WHERE id_station="'.$id_station.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited station Data");
					window.location="index.php?halaman=station";
				</script>';
			}
		}
					}
	?>       
    </table>
</form>