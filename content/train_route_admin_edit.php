<form enctype="multipart/form-data" method="post">
	<table align="center"> 
    		<tr>
            	<td align="center">
                	EDIT TRAIN ROUTE
                 <?php
				 	if(isset($_GET['kode'])){
						$a ='SELECT * FROM train_route WHERE id_route="'.$_GET['kode'].'" LIMIT 1';
						$b = mysqli_query($koneksi,$a) or die (mysqli_error()); 
						$r = mysqli_fetch_array($b);
						
						$ire	 = $r['id_route'];
						$dpt  	 = $r['depart'];
						$are	 = $r['arrive'];
						$dde	 = $r['depart_date'];
						$dte	 = $r['depart_time'];
						$ade  	 = $r['arrive_date'];
						$ate  	 = $r['arrive_time'];
						$itn  	 = $r['id_train'];
						$ecofare	 = trainecofare($ire);
						$busfare	 = trainbusfare($ire);
						$execfare	 = trainexecfare($ire);
	
					}
				 ?>
                </td>
            </tr>
     </table>
     
	 <table align="center">   
   			<tr>
            	<td>RouteID</td>
                <td>:</td>
                <td><input type="text" disabled="disabled" value="<?php echo $ire;?>"/>
                	<input type="hidden" name="id_route" value="<?php echo $ire;?>" /></td>
            </tr>
            
            <tr>
            	<td>Depart</td>
                <td>:</td>
                <td><?php
						$qsk = 'select * from station';
						$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
						$nsk = mysqli_num_rows($psk);
							echo'<select name="depart">
							 ';
						if ($nsk !=0)
						{
							while($rsk = mysqli_fetch_array($psk)){
						 		$kkode = $rsk['id_station'];
						 		$name  = $rsk['station_name'];
								if ($kkode==$dpt){
							echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 		}else{
							echo'<option value="'.$kkode.'">['.$kkode.']'.$name.'</option>';
				    		}
						}
					}
							echo "</select>"
					?>
            	</td>
            </tr>
            
            <tr>
            	<td>Arrive</td>
                <td>:</td>
                <td><?php
						$qsk = 'select * from station';
						$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
						$nsk = mysqli_num_rows($psk);
							echo'<select name="arrive">
							 ';
						if ($nsk !=0)
						{
							while($rsk = mysqli_fetch_array($psk)){
						 		$kkode = $rsk['id_station'];
						 		$name  = $rsk['station_name'];
								if ($kkode==$are){
							echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 		}else{
							echo'<option value="'.$kkode.'">['.$kkode.']'.$name.'</option>';
				    		}
						}
					}
							echo "</select>"
					?>
                </td>
            </tr>
            
              <tr>
            	<td>Depart Date</td>
                <td>:</td>
                <td><input type="date" name="depart_date" value="<?php echo $dde;?>"></td>
            </tr>
            
            <tr>
            	<td>Depart Time</td>
                <td>:</td>
                <td><input type="time" name="depart_time" value="<?php echo $dte;?>"></td>
            </tr>
                
            <tr>
            	<td>Arrive Date</td>
                <td>:</td>
                <td><input type="date" name="arrive_date" value="<?php echo $ade;?>"></td>
            </tr>
            
            <tr>
            	<td>Arrive Time</td>
                <td>:</td>
                <td><input type="time" name="arrive_time" value="<?php echo $ate;?>"></td>
            </tr>
 
            <tr>
            	<td>TrainID</td>
                <td>:</td>
                <td> <?php
						$qsk = 'select * from train';
						$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
						$nsk = mysqli_num_rows($psk);
							echo'<select name="id_train">
						 	';
						if ($nsk !=0)
						{
							while($rsk = mysqli_fetch_array($psk)){
								 $kkode = $rsk['id_train'];
						 		 $name = $rsk['train_name'];
								if ($kkode==$itn){
							echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 		}else{
							echo'<option value="'.$kkode.'">['.$kkode.']'.$name.'</option>';
				    		}
						}
					}
							echo "</select>"
					?>
                </td>
            </tr>
            
            <tr>
    			<td>Fare Economy</td>
       			<td>:</td>
        		<td><input type="text" name="eco_fare" value="<?php echo $ecofare;?>"/></td>
   			 </tr>
    
    		<tr>
    			<td>Fare Business</td>
        		<td>:</td>
        		<td><input type="text" name="bus_fare" value="<?php echo $busfare;?>" /></td>
    		</tr>
    
    		<tr>
    			<td>Fare Executive</td>
        		<td>:</td>
        		<td><input type="text" name="exec_fare" value="<?php echo $execfare;?>" /></td>
    		</tr>
	 
     <table align="center">
     		<tr>
            	<td>
                	<input type="submit" name="submit" value="Save">
                    <a href="index.php?halaman=train_route"><input type="button" value="Cancel"></a>
                </td>
            </tr>
     </table>
     <?php
	 	if(isset($_POST['submit'])){
			$ir	       = $_POST['id_route'];
			$dp        = $_POST['depart'];
			$ar	       = $_POST['arrive'];
			$dd	       = $_POST['depart_date'];
			$dt	       = $_POST['depart_time'];
			$ad        = $_POST['arrive_date'];
			$at        = $_POST['arrive_time'];
			$it  	   = $_POST['id_train'];	
			$classeco  = "Economy";
			$eco_fare  = $_POST['eco_fare'];
			$classbus  = "Business";
			$bus_fare  = $_POST['bus_fare'];
			$classexec = "Executive";
			$exec_fare = $_POST['exec_fare'];
			
			//edit fare economy
			$tambah1='UPDATE train_fare SET fare="'.$eco_fare.'" WHERE id_route="'.$ir.'" AND class="'.$classeco.'"';
			$exec1= mysqli_query($koneksi,$tambah1) or die (mysqli_error());
			
			//edit fare business
			$LastIDfare2 = IDOtomatis("train_fare");
			$tambah2='UPDATE train_fare SET fare="'.$bus_fare.'" WHERE id_route="'.$ir.'" AND class="'.$classbus.'"';
			$exec2= mysqli_query($koneksi,$tambah2) or die (mysqli_error());
			
			//edit fare executive
			$LastIDfare3 = IDOtomatis("train_fare");
			$tambah3='UPDATE train_fare SET fare="'.$exec_fare.'" WHERE id_route="'.$ir.'" AND class="'.$classexec.'"';
			$exec3= mysqli_query($koneksi,$tambah3) or die (mysqli_error());
			
			//edit train route
			$edit	= 'UPDATE train_route SET depart="'.$dp.'",arrive="'.$ar.'",depart_date="'.$dd.'",
			depart_time="'.$dt.'",arrive_date="'.$ad.'",arrive_time="'.$at.'",id_train="'.$it.'" WHERE id_route="'.$ir.'"';
			$edit2   = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited Train Route Data");
					window.location="index.php?halaman=train_route";
				</script>';
			}
		}
	 ?>
	</table>
</form>