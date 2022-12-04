<table align="center">
	<thead>
    	<th>
        	DELETE AIRPORT
         <?php
		 	if(isset($_GET['kode'])){
				$a	='SELECT * FROM airport WHERE id_airport="'.$_GET['kode'].'" LIMIT 1';	
				$b	= mysqli_query($koneksi,$a) or die (mysqli_error());
				$c	= mysqli_fetch_array($b);
				
				$id_airport		= $c['id_airport'];
				$airport_name	= $c['airport_name'];
				$city		    = $c['city'];
			}
		 ?> 
         Are You Sure Do You Want To Delete"<?php echo $id_airport;?>"? 
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            		<tr>
                    	<td>
                        	<input type="hidden" name="id_airport" value="<?php echo $id_airport;?>" />
                            <input type="submit" name="delete" value="Yes" />
                            <a href="index.php?halaman=airport"><input type="button" value="Cancel" /></a>
                        </td>
                    </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$q		= $_POST['id_airport'];
				$p		= 'DELETE FROM airport WHERE id_airport="'.$id_airport.'"';
				$n		= mysqli_query($koneksi,$p) or die (mysqli_error());
				if($n){
					echo'
					<script>
					alert("You Successfuly Deleted Airport Data");
					window.location="index.php?halaman=airport";
				</script>';
				}
			}
		 ?> 
        </th>	
    </thead>
</table>