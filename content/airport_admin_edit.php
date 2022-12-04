<form enctype="multipart/form-data" method="post">
	<table align="center">
    	<tr>
        	<td align="center">
            	EDIT AIRPORT
            <?php
            	if(isset($_GET['kode'])){
					$a	='SELECT * FROM airport WHERE id_airport="'.$_GET['kode'].'" LIMIT 1';
					$b	= mysqli_query($koneksi,$a) or die (mysqli_error());	
					$c	= mysqli_fetch_array($b);
					
					$id_airport		= $c['id_airport'];
					$airport_name	= $c['airport_name'];
					$city			= $c['city'];
					$gambar			= $c['gambar'];
			
			?>
            </td>
        </tr>
    </table>
    <table align="center">
    		<tr>
            	<td>Id Airport</td>
               	<td>:</td>
                <td><input type="text" disabled="" value="<?php echo $id_airport;?>" />
                	<input type="hidden" name="id_airport" value="<?php echo $id_airport;?>" />
                </td>
            </tr>
            <tr>
            	<td>Airport Name</td>
                <td>:</td>
                <td><input type="text" name="airport_name" value="<?php echo $airport_name;?>" />
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
                    <a href="index.php?halaman=airport"><input type="button" value="Cancel" /></a>
                </td>
            </tr>
    </table>
    <?php
		if(isset($_POST['submit'])){
			$id_airport		= $_POST['id_airport'];
			$airport_name	= $_POST['airport_name'];
			$city			= $_POST['city'];
			$file			= $_FILES['img']['tmp_name'];
			
						if(!empty($file)){
				$gambar1	=$id_airport.''.$_FILES['img']['name'];
				$lokasi	='../images/'.$gambar1.'';
				move_uploaded_file($file,$lokasi);
						}else{
				$gambar1= $gambar;
			}
				
			
			$edit	='UPDATE airport SET airport_name="'.$airport_name.'",city="'.$city.'",gambar="'.$gambar1.'" WHERE id_airport="'.$id_airport.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited Airport Data");
					window.location="index.php?halaman=airport";
				</script>';
			}
		}
					}
	?>       
    </table>
</form>