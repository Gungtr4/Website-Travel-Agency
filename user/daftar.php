<?php
$Lastid=IDotomatis('user');
?>
<body>
<div class="main">
	<div class="main-w3l">
<h1 class="logo-w3">Sign Up</h1>
<div class="w3layouts-left">
<h3>Please Fill The Form Bellow</h3>
<form method="post" enctype="multipart/form-data">
  <div><input type="hidden" readonly="readonly" name="kode" value="<?PHP echo $Lastid ?>"></div>
	<div><input type="text" name="nama" placeholder="Full Name..." required></div>
	<div><input type="email" name="email" placeholder="Email..." required></div>
	<div><input type="text" name="city" placeholder="City..." required id="city"></div>
	<div><input type="text" name="country" placeholder="Country..." required id="country"></div>
	<div><input type="text" name="username" placeholder="Username..." required></div>
	<div><input type="password" name="pass" placeholder="Password..." required></div>
	<div><input type="submit" name="daftar" value="Sign-Up"</div>
		<hr>
	
</form>
		</div>
			</div>
<div class="w3layouts-main">
<div><h2>If You Already Have Account</h2></div>
	<div><a href="login.php"><input type="button" value="Click Here"></a></div>
	<p><a href="../index.php"><h1>Back To Home...</h1></a></p>
		


<?php
	if(isset($_POST['daftar'])){
		$kode		=	$_POST['kode'];
		$name		=	$_POST['nama'];
		$email		=	$_POST['email'];
		$city		=	$_POST['city'];
		$country	=	$_POST['country'];
		$username	=	$_POST['username'];
		$pass		=	$_POST['pass'];
		$level		=	'customer';
		
		$user 		='insert into user (id_user,name,email,username,pass,city,country,level)value ("'.($kode).'","'.($name).'","'.($email).'","'.($username).'","'.base64_encode($pass).'","'.($city).'","'.($country).'","'.($level).'")';
		$p = mysqli_query($koneksi,$user) or die(mysqli_error());
		if($p){
			echo('<script>alert("Anda Berhasil Mendaftar"); 
			window.location ="login.php";
			</script>');
		}
	}
	
	
	
	?>

			<div class="clear"></div>
			<!-- //main -->
			
		</div>
	</div>
</body>