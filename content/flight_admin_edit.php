<form method="post">
<table align="center">
	<tr>
    	<td>
        	EDIT FLIGHT
            <?php
				if(isset($_GET['kode'])){
				$q			  ='SELECT * FROM flight WHERE flight_no="'.$_GET['kode'].'" LIMIT 1';
				$p			  = mysqli_query($koneksi,$q) or die (mysqli_error());
				$r			  = mysqli_fetch_array($p);
				$flight_no	  = $r['flight_no'];
				$depart	      = $r['depart'];
				$arrive 	  = $r['arrive'];
				$depart_date  = $r['depart_date'];
				$depart_time  = $r['depart_time'];
				$arrive_date  = $r['arrive_date'];
				$arrive_time  = $r['arrive_time'];
				$id_airplane  = $r['id_airplane'];
				$ecofare	  = flightecofare($flight_no);
				$busfare	  = flightbusfare($flight_no);
				}
            ?>
         <table align="center">
         	<tr>
            	<td>FlightNO</td>
                <td>:</td>
                <td><input type="text" disabled="disabled" value="<?php echo $flight_no;?>" />
                	<input type="hidden" name="flight_no" value="<?php echo $flight_no;?>" /></td>
            </tr>
            
            <tr>
    	<td>Depart</td>
        <td>:</td>
        <td>
			<?php
				$qsk = 'select * from airport';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="depart">
						<option value="">-</option>'; 
					if ($nsk !=0){
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airport'];
						 $name	 = $rsk['airport_name'];
						 if($kkode==$depart){
					echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 }else{
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
			}
					echo "</select>";
			?>
          </td>
    </tr>
    
    <tr>
    	<td>Arrive</td>
        <td>:</td>
        <td>
        	<?php
				$qsk = 'select * from airport';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="arrive">
						<option value="">-</option>'; 
					if ($nsk !=0){
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airport'];
						 $name	 = $rsk['airport_name'];
						 if($kkode==$arrive){
					echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 }else{
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
			}
					echo "</select>";
			?>
          </td>
    </tr>

    		 <tr>
            	<td>Depart Date</td>
                <td>:</td>
                <td><input type="date" name="depart_date" value="<?php echo $depart_date;?>" required="required" /></td>
            </tr>	
            
              <tr>
            	<td>Depart Time</td>
                <td>:</td>
                <td><input type="time" name="depart_time" value="<?php echo $depart_time;?>" required="required" /></td>
            </tr>
            
             <tr>
            	<td>Arrive Date</td>
                <td>:</td>
                <td><input type="date" name="arrive_date" value="<?php echo $arrive_date;?>" required="required" /></td>
            </tr>
            
            <tr>
            	<td>Arrive Time</td>
                <td>:</td>
                <td><input type="time" name="arrive_time" value="<?php echo $arrive_time;?>" required="required" /></td>
            </tr>
            <tr>
    	<td>AirplaneID</td>
        <td>:</td>
        <td>
        <?php
				$qsk = 'select * from airplane';
				$psk = mysqli_query($koneksi,$qsk) or die (mysqli_error());
				$nsk = mysqli_num_rows($psk);
					echo'<select name="id_airplane">
						<option value="">-</option>'; 
					if ($nsk !=0){
						while($rsk = mysqli_fetch_array($psk)){
						 $kkode    = $rsk['id_airplane'];
						 $name	 = $rsk['airplane_name'];
						 if($kkode==$id_airplane){
					echo'<option selected="selected" value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
						 }else{
					echo'<option value="'.$kkode.'">['.$kkode.']&nbsp;'.$name.'</option>';
				    }
				}
			}
					echo "</select>";
			?>
          </td>
    </tr>
    
    <tr>
    	<td>Economy Fare</td>
        <td>:</td>
        <td><input type="text" name="eco_fare" value="<?php echo $ecofare; ?>" required="required"></td>
    </tr>
    
    <tr>
    	<td>Business Fare</td>
        <td>:</td>
        <td><input type="text" name="bus_fare" value="<?php echo $busfare; ?>" required="required" /></td>
    </tr>
            <table align="center">
            	<tr>
                <td>
            	<input type="submit" name="submit" value="Simpan" />
          	 	<a href="index.php?halaman=flight"><input type="button" value="Batal" /></a>
         		</td>
                </tr>
         </table>
         </table>
        </td>
</form>
		<?php
			if(isset($_POST['submit'])){
				$flight_no 	  = $_POST['flight_no'];
				$depart 	  = $_POST['depart'];
				$arrive 	  = $_POST['arrive'];
				$depart_date  = $_POST['depart_date'];
				$depart_time  = $_POST['depart_time'];
				$arrive_date  = $_POST['arrive_date'];
				$arrive_time  = $_POST['arrive_time'];
				$id_airplane  = $_POST['id_airplane'];
				$classeco	  = "Economy";
				$eco_fare  	  = $_POST['eco_fare'];
				$classbus	  = "Business";
				$bus_fare	  = $_POST['bus_fare'];
				
			//edit fare economy
			$tambah1='UPDATE flight_fare SET fare="'.$eco_fare.'" WHERE flight_no="'.$flight_no.'" AND class="'.$classeco.'"';
			$exec1= mysql_query($tambah1) or die (mysql_error());
			
			//edit fare economy
			$tambah2='UPDATE flight_fare SET fare="'.$bus_fare.'" WHERE flight_no="'.$flight_no.'" AND class="'.$classbus.'"';
			$exec2= mysql_query($tambah2) or die (mysql_error());
			
			//edit flight		
			$e_q = 'UPDATE flight SET depart="'.$depart.'",arrive="'.$arrive.'",depart_date="'.$depart_date.'"
			,depart_time="'.$depart_time.'",arrive_date="'.$arrive_date.'",arrive_time="'.$arrive_time.'"
			,id_airplane="'.$id_airplane.'" WHERE flight_no="'.$flight_no.'" ';
			$e_p = mysqli_query($koneksi,$e_q) or die (mysqli_error());
				if($e_p){
					echo'
						<script>
							alert("You Successfuly Edited Flight Data");
							window.location="index.php?halaman=flight";
						</script>';
				}
			}
        ?>   	
    </tr>
</table>