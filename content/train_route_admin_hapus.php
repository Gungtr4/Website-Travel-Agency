<table align="center">
	<thead>
    	<th>
        	DELETE TRAIN ROUTE
         <?php
		 	if(isset($_GET['kode'])){
				$a	='SELECT * FROM train_route WHERE id_route="'.$_GET['kode'].'" LIMIT 1';
				$b	= mysqli_query($koneksi,$a) or die (mysqli_error());
				$r	= mysqli_fetch_array($b);
				
				$ir	 = $r['id_route'];
				$dp  = $r['depart'];
				$ar	 = $r['arrive'];
				$dt	 = $r['depart_time'];
				$at  = $r['arrive_time'];
				$it  = $r['id_train'];	
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $ir;?>"?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id_route" value="<?php echo $ir;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?halaman=train_route"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['id_route'];
				$q	='DELETE FROM train_route WHERE id_route="'.$p.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Successfuly Deleted Train Route Data");
						window.location="index.php?halaman=train_route";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>