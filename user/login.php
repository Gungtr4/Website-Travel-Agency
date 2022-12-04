<?php
session_start();
if (isset($_SESSION['sesi'])&& $_SESSION['sesi']!='user'){
	header('location:index_u.php');
	
}else{
include("../koneksi.php");
include("../function.php");

?>
<html>
<head>
<title> Sign in</title>

<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Shopping Sign in Form template Responsive, Login form web template,Flat Pricing tables,Flat Drop downs Sign up Web Templates, 
 Flat Web Templates, Login sign up Responsive web template, SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->

<!-- css files -->
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- css files -->
<link rel="stylesheet" href="../css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->

<!-- Online-fonts -->
<link href="//fonts.googleapis.com/css?family=Varela+Round&amp;subset=hebrew,latin-ext,vietnamese" rel="stylesheet">
<!-- //Online-fonts -->

</head>
<body>
<?php
		if(!empty($_GET['halaman']))
		{
			if($_GET['halaman']=="daftar")
				include "daftar.php";
		}else{?>
	<!-- main -->
	<div class="main">
		<div class="main-w3l">
			<h1 class="logo-w3">Please<span> Sign in</span> First</h1>
			<div class="w3layouts-left">
				<h3>If You Haven't a Member Yet Please</h3>
				<div><a href="login.php?halaman=daftar" ><input type="button" value="Sign-Up"></a></div>
				<p>Enter into your Account to shop with best offers</p>
	
				<div class="icon">
					<span class="fa fa-thumbs-o-up" aria-hidden="true"></span>
				</div>
				<p><a href="../index.php"><h3>Back To Home...</h3></a></p>
			</div>
			<div class="w3layouts-main">
				<h2><span>Sign In To Your Account</span></h2>
					<form method="post" enctype="multipart/form-data">
						<input type="text" name="username" placeholder="Username..." required="">			
						<input type="password" name="pass" placeholder="Password..." required="">
						<input type="submit" name="login" value="Sign-In">
						
					</form>
					<?php
if (isset($_POST['login'])){
	$usname	=$_POST['username'];
	$pass	=$_POST['pass'];
	$level	='customer';
$q = 'SELECT * FROM user WHERE username="'.$usname.'" AND pass="'.base64_encode($pass).'" AND level="'.$level.'" LIMIT 1';
	$p = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n = mysqli_num_rows($p);
	$r = mysqli_fetch_array($p);
	if ($n>0){
		//session
		$_SESSION['sesi']='user';
		$_SESSION['iduser']= $r['id_user'];
		echo '
			<script>
				alert("Berhasil!");</script>';
				if(isset($_GET['id'])){
			header('location:../booking/pesawat.php?id='.$_GET[id].'');}
				else{
			header('location:index_u.php');
	}	
	}else{
		echo '
			<script>
				alert("Maaf Username dan Password tidak sesuai!");
				window.location	= "../index.php";
			</script>
		';
	}
}		
		}
		?>
			</div>
			<div class="clear"></div>
			<!-- //main -->
			
			<!--footer-->
			<!--//footer-->
		</div>
	</div>
<?php } ?>
</body>
</html>
