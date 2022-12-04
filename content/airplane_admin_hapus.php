<table align="center">
	<thead>
    	<th>
        	DELETE AIRPLANE
         <?php
		 	if(isset($_GET['kode'])){
				$a	='SELECT * FROM airplane WHERE id_airplane="'.$_GET['kode'].'" LIMIT 1';
				$b	= mysqli_query($koneksi,$a) or die (mysqli_error());
				$c	= mysqli_fetch_array($b);
				
				$id_airplane	= $c['id_airplane'];
				$airplane_name  = $c['airplane_name'];
				$type		    = $c['type'];
				$eco_seat	    = $c['eco_seat'];
				$business_seat  = $c['business_seat'];	
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $id_airplane;?>"?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id_airplane" value="<?php echo $id_airplane;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?halaman=airplane"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['id_airplane'];
				$q	='DELETE FROM airplane WHERE id_airplane="'.$id_airplane.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Successfuly Deleted Airplane Data");
						window.location="index.php?halaman=airplane";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>