<table align="center">
	<thead>
    	<th>
        	DELETE TRAIN
         <?php
		 	if(isset($_GET['kode'])){
				$a	='SELECT * FROM train WHERE id_train="'.$_GET['kode'].'" LIMIT 1';
				$b	= mysqli_query($koneksi,$a) or die (mysqli_error());
				$r	= mysqli_fetch_array($b);
				
				$it	 = $r['id_train'];
				$tn  = $r['train_name'];
				$es	 = $r['eco_seat'];
				$bs	 = $r['business_seat'];
				$est = $r['exec_seat'];	
			}
		 ?>
         Are You Sure Do you Want To Delete "<?php echo $it;?>"?
         <form enctype="multipart/form-data" method="post">
         	<table align="center">
            	<tr>
                	<td>
                    	<input type="hidden" name="id_train" value="<?php echo $it;?>" />
                        <input type="submit" name="delete" value="Yes" />
                        <a href="index.php?halaman=train"><input type="button" value="Cancel" /></a>
                    </td>
                </tr>
            </table>
         </form>
         <?php
		 	if(isset($_POST['delete'])){
				$p	= $_POST['id_train'];
				$q	='DELETE FROM train WHERE id_train="'.$p.'"';
				$n	= mysqli_query($koneksi,$q) or die (mysqli_error());
				if($n){
					echo'
					<script>
						alert("You Successfuly Deleted Train Data ");
						window.location="index.php?halaman=train";
					</script>';
				}
			}
		 ?>
        </th>
    </thead>
</table>