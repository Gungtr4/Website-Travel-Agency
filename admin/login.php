<?php
session_start();
if (isset($_SESSION['admin']) && $_SESSION['admin']=='admin'){
	header("location:index.php");}
		else{
			include("../koneksi.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
<form method="post">
	<table align="center">
    	<thead>
        	<th align="center">LOGIN ADMIN</th>
        </thead>
        
        <thead>
        	<th>Username</th>
            <th>:</th>
            <th><input type="text" name="username" placeholder="Username" /></th>
        </thead>
        
        <thead>
        	<th>Passowrd</th>
            <th>:</th>
            <th><input type="password" name="pass" placeholder="Password" /></th>
        </thead>
        
        <thead>
        	<th><input type="submit" name="submit" value="Login" />
            	<input type="button" name="button" value="Cancel" /></th>
        </thead>
    </table>	
</form>

<?php
if (isset($_POST['submit'])){
	$user  = $_POST['username'];
	$pass  = $_POST['pass'];
	$level = "admin";
	
	$q = 'SELECT * FROM user WHERE username="'.$user.'" AND pass="'.base64_encode($pass).'" AND level="'.$level.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	if ($n>0){
		$_SESSION['admin'] = $r['level'];
			
			echo'
				<script>
					alert("Sucessfully!");
					window.location="index.php";
				</script>';}
			else{
				echo'
					<script>
						alert("Sorry! your username or password is wrongs");
						window.location="index.php";
					</script>';	
	}
}
?>
</body>
</html>
