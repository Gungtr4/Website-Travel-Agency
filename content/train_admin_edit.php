<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT TRAIN
                 <?php
				 	if(isset($_GET['kode'])){
						$a ='SELECT * FROM train WHERE id_train="'.$_GET['kode'].'" LIMIT 1';
						$b = mysqli_query($koneksi,$a) or die (mysqli_error()); 
						$r = mysqli_fetch_array($b);
						
						$it	 = $r['id_train'];
						$tn  = $r['train_name'];
						$es	 = $r['eco_seat'];
						$bs	 = $r['business_seat'];
						$est = $r['exec_seat'];	
					}
				 ?>
                </td>
            </tr>
     </table>
	 <table align="center">   
   			<tr>
            	<td>TrainID</td>
                <td>:</td>
                <td><input type="disabled" value="<?php echo $it;?>"/>
                	<input type="hidden" name="id_train" value="<?php echo $it;?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Train Name</td>
                <td>:</td>
                <td><input type="text" name="train_name" value="<?php echo $tn;?>">
                </td>
            </tr>
            
            <tr>
            	<td>ECO Seat</td>
                <td>:</td>
                <td><input type="text" name="eco_seat" value="<?php echo $es;?>">
                </td>
            </tr>
            
            <tr>
            	<td>Business Seat</td>
                <td>:</td>
                <td><input type="text" name="business_seat" value="<?php echo $bs;?>">
                </td>
            </tr>
            
            <tr>
            	<td>Exec Seat</td>
                <td>:</td>
                <td><input type="text" name="exec_seat" value="<?php echo $est;?>">
                </td>
            </tr>
            
     <table align="center">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Simpan">
                    <a href="index.php?halaman=train"><input type="button" value="Batal"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
			$a = $_POST['id_train'];
			$b = $_POST['train_name'];
			$c = $_POST['eco_seat'];
			$d = $_POST['business_seat'];
			$e = $_POST['exec_seat'];
			
			$edit	= 'UPDATE train SET train_name="'.$b.'",eco_seat="'.$c.'",business_seat="'.$d.'",
			exec_seat="'.$e.'" WHERE id_train="'.$a.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited Train Data");
					window.location="index.php?halaman=train";
				</script>';
			}
		}
	 ?>
     </table>
</form>