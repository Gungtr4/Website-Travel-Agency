<table align="center">
		<thead>
        	<th>
            	DELETE USER
            <?php
				if(isset($_GET['kode'])){
					$a	= 'SELECT * FROM user WHERE id_user="'.$_GET['kode'].'" LIMIT 1';	
 					$b	= mysqli_query($koneksi,$a) or die (mysqli_error());	
					$c	= mysqli_fetch_array($b);
					
					$id_user	= $c['id_user'];
					$name	   = $c['name'];
					$email	  = $c['email'];
					$username   = $c['username'];
					$password   = $c['pass'];
					$city	   = $c['city'];
					$country	= $c['country'];
				}
            ?>  
            Are You Sure Do You Want To Delete "<?php echo $id_user;?>" ?
			<form enctype="multipart/form-data" method="post">
            	<table align="center">
                	<tr>
            			<td>
                        	<input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                			<input type="submit" name="delete" value="Yes">
                			<a href="index.php?halaman=user"><input type="button" value="Cancel"></a>
                        </td>
                </table>
            </form>
            <?php
            	if(isset($_POST['delete'])){
					$p	= $_POST['id_user'];
					$q	= 'DELETE FROM user WHERE id_user="'.$id_user.'"';
					$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
					if($n){
						echo'
						<script>
							alert("You Successfuly Deleted Airplane Data");
							window.location="index.php?halaman=user";
						</script>';
					}
				}
			?>         
            </th>
        </thead>
</table>