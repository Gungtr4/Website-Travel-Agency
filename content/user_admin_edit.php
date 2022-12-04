<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td align="center">
        	EDIT USER
            <?php
				if(isset($_GET['kode'])){
					$a	='SELECT * FROM user WHERE id_user="'.$_GET['kode'].'" LIMIT 1';
					$b	= mysqli_query($koneksi,$a) or die (mysqli_error());	
					$c	= mysqli_fetch_array($b);
					
					$id_user       = $c['id_user'];
   					$name	       = $c['name'];
					$email	       = $c['email'];
					$username	   = $c['username'];
					$password	   = $c['pass'];
					$city		   = $c['city'];
					$country	   = $c['country'];
				}
			?>
        </td>
    </tr>
</table>
<table align="center">
	<tr>
    	<td>UserID</td>
        <td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $id_user;?>">
        	<input type="hidden" name="id_user" value="<?php echo $id_user;?>">
        </td>
    </tr>
    <tr>
    	<td>Name</td>
        <td>:</td>
        <td><input type="text" name="name" value="<?php echo $name;?>">
        </td>
    </tr>
    <tr>
    	<td>Email</td>
        <td>:</td>
        <td><input type="email" name="email" value="<?php echo $email;?>">
        </td>
    </tr>
    <tr>
    	<td>Username</td>
        <td>:</td>
        <td><input type="text" name="username" value="<?php echo $username;?>">
        </td>
    </tr>
    <tr>
    	<td>Password</td>
		<td>:</td>
        <td><input type="password" name="pass" value="<?php echo base64_decode($password);?>">
        </td>
    </tr>
    <tr>
    	<td>City</td>
        <td>:</td>
        <td><input type="text" name="city" value="<?php echo $city;?>">
        </td>
    </tr>
    <tr>
    	<td>Country</td>
        <td>:</td>
        <td><input type="text" name="country" value="<?php echo $country;?>">
        </td>
    </tr>
    
    <tr>
    	<td>Level</td>
        <td>:</td>
        <td>
        	<select name="level">
        	<option>admin</option>
            <option>customer</option>
            </option>
        </td>
    </tr>
    
    <table align="center">
    	<tr>
        	<td>
            	<input type="submit" name="submit" value="Simpan">
                <a href="index.php?halaman=user"><input type="button" value="Batal"></a>
            </td>
        </tr>
    </table>
    <?php
    	if(isset($_POST['submit'])){
			$id_user	= $_POST['id_user'];
			$name	    = $_POST['name'];
			$email	    = $_POST['email'];
			$username   = $_POST['username'];
			$password   = $_POST['pass'];
			$city	    = $_POST['city'];
			$country	= $_POST['country'];
			$level      = $_POST['level'];
			
			$edit	   ='UPDATE user SET name="'.$name.'",email="'.$email.'",username="'.$username.'",pass="'.base64_encode($password).'",city="'.$city.'",country="'.$country.'",level="'.$level.'" WHERE id_user="'.$id_user.'"';
			$edit2	  = mysqli_query($koneksi,$edit) or die (mysqli_error());
			if($edit2){
				echo'
				<script>
					alert("You Successfuly Edited Airplane Data");
					window.location="index.php?halaman=user";
				</script>';
			}
		}
	?>
</table>
</form>