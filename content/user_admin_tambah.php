<?php
	$LastID = IDOtomatis("user");
?>

<form enctype="multipart/form-data" method="post">
<table align="center">
	<tr>
    	<td><h2>ADD USER</h2></td>
    </tr>
</table>

<table align="center">
	<tr>
    	<td>UserID</td>
        <td>:</td>
        <td><input type="text" disabled="disabled" value="<?php echo $LastID;?>" />
        	<input type="hidden" name="id_user" value="<?php echo $LastID;?>" />
        </td>
    </tr>
    <tr>
    	<td>Name</td>
        <td>:</td>
        <td><input type="text" name="name" required="required" /></td>
    </tr>
    <tr>
    	<td>Email</td>
        <td>:</td>
        <td><input type="email" name="email" required="required" /></td>
    </tr>
    <tr>
    	<td>Username</td>
        <td>:</td>
        <td><input type="text" name="username" required="required" /></td> 
    </tr>
    <tr>
    	<td>Password</td>
        <td>:</td>
        <td><input type="password" name="pass" required="required" /></td>
    </tr>
    <tr>
    	<td>City</td>
        <td>:</td>
        <td><input type="text" name="city" required="required" /></td>
    </tr>
    <tr>
    	<td>Country</td>
        <td>:</td>
        <td><input type="text" name="country" required="required" /></td>
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
    	<td><input type="submit" name="submit" value="Save" />
        	<a href="index.php?halaman=user"><input type="button" value="Cancel" /></a></td>
    </tr>
</table>

<?php
	if(isset($_POST['submit'])){
		$id_user    = $_POST['id_user'];
		$name		= $_POST['name'];
		$email	    = $_POST['email'];
		$username	= $_POST['username'];
		$password	= $_POST['pass'];
		$city		= $_POST['city'];
		$country	= $_POST['country'];
		$level		= $_POST['level'];
		
		$tambah	     ='insert into user(id_user,name,email,username,pass,city,country,level)value
		("'.$id_user.'","'.$name.'","'.$email.'","'.$username.'","'.base64_encode($password).'","'.$city.'","'.$country.'","'.$level.'")';
		$tambah2 	    =mysqli_query($koneksi,$tambah) or die (mysqli_error());
		if($tambah2){
			echo'
			<script>
				alert("You Successfuly Added User Data");
				window.location="index.php?halaman=user";
			</script>';
		}
	}
?>
</table>
</form>