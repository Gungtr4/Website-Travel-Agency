<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT AIRPLANE
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
                </td>
            </tr>
     </table>
	 <table align="center">   
   			<tr>
            	<td>AirplaneID</td>
                <td>:</td>
                <td><input type="text" disabled="" value="<?php echo $id_airplane;?>"/>
                	<input type="hidden" name="id_airplane" value="<?php echo $id_airplane;?>" />
                </td>
            </tr>
            <tr>
            	<td>Airplane Name</td>
                <td>:</td>
                <td><input type="text" name="airplane_name" value="<?php echo $airplane_name;?>">
                </td>
            </tr>
            <tr>
            	<td>Type</td>
                <td>:</td>
                <td><input type="text" name="type" value="<?php echo $type;?>">
                </td>
            </tr>
            <tr>
            	<td>Eco Seat</td>
                <td>:</td>
                <td><input type="text" name="eco_seat" value="<?php echo $eco_seat;?>">
                </td>
            </tr>
            <tr>
            	<td>Business Seat</td>
                <td>:</td>
                <td><input type="text" name="business_seat" value="<?php echo $business_seat;?>">
                </td>
            </tr>
     <table align="center">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save">
                    <a href="index.php?halaman=airplane"><input type="button" value="Cancel"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
			$id_airplane	= $_POST['id_airplane'];
			$airplane_name	= $_POST['airplane_name'];
			$type			= $_POST['type'];
			$eco_seat		= $_POST['eco_seat'];
			$business_seat	= $_POST['business_seat'];
			
			$edit	= 'UPDATE airplane SET airplane_name="'.$airplane_name.'",type="'.$type.'",eco_seat="'.$eco_seat.'",
			business_seat="'.$business_seat.'" WHERE id_airplane="'.$id_airplane.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited Airplane Data");
					window.location="index.php?halaman=airplane";
				</script>';
			}
		}
	 ?>
     </table>
</form>