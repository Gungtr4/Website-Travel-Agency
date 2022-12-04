<html lang="en">
<head>
<title>Travel Agency</title>
<!-- meta-tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Wacky Trip Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //meta-tags -->
<link href="css/home/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" href="css/owl.carousel.css" type="text/css" media="all"/> <!-- Owl-Carousel-CSS -->
<link rel="stylesheet" href="css/home/flexslider.css" type="text/css" media="screen" property="" />
<link href="css/home/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/home/lightbox.css">
<!--web-fonts-->
<link href="//fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Tangerine:400,700" rel="stylesheet">
<!--//web-fonts-->
</head>
<body>
<?php
	include("koneksi.php");
	include "function.php";
?>
<!-- banner -->
<div class="banner" id="home">
<div class="agileinfo-dot">
<div class="container">
		<!-- header -->
		<header>
			<!-- navigation -->
			<div class="w3_navigation">
			<nav class="navbar navbar-default">
				<div class="navbar-header navbar-left">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="w3_navigation_pos">
						<h1><a href="index.php"><span>A</span>NC <span>T</span>ravel</a></h1>
					</div>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
					<nav class="cl-effect-4" id="cl-effect-4">
						<ul class="nav navbar-nav menu__list">
		<li ><a href="index.php"><i class="fa fa-home" aria-hidden="true"> Home</i></a></li>
	<li><a href="index.php?page=plane"><i class="fa fa-plane" aria-hidden="true"> Airplane</i></a></li>
	<li><a href="index.php?page=train"><i class="fa fa-train" aria-hidden="true"> Train</i></a></li>
<li><a href="index.php?page=recomend"><i class="fa fa-map-marker" aria-hidden="true"> Recomendation Place</i></a></li>
	<li><a href="user/index_u.php"><i class="fa fa-user" aria-hidden="true"> Sign-In</i></a></li>
						</ul>
					</nav>
				</div>
			</nav>	
	</div>
	<div class="clearfix"></div>
		<!-- //navigation -->
		</header>
	<!-- //header -->

 <?php
	if(isset($_GET['page'])){
		$hal=($_GET['page']);
		if($hal=="plane"){
			include("content/pesawat.php");
		}else if($hal=="recomend"){
			include("recomend.php");
		}else if($hal=="train"){
			include("content/kereta.php");
		}
	}else{ include("content/beranda.php"); }

?>	
  </div>
</div>
</div>
  </body>
	<div class="clearfix"></div>
	<div class="col-md-4 subscribe-grid">
	<hr>
		<h5>Please Enjoy Yourself</h5>
			<hr>
				</div>
				
<div class="col-md-8 footer-w3layouts">
		<div class="footer-top-agile">
		<h6><a href="index_u.php"><span>A</span>NC <span>T</span>ravel</a></h6>
	

		<div class="footer-contact-w3ls">
			<ul>
				<li><i class="fa fa-globe" aria-hidden="true"></i>Indonesia,Bali,Denpasar</li>
				<li><i class="fa fa-phone" aria-hidden="true"></i>089637143215</li>
				<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:gungputraa@gmail.com">gungputraa@gmail.com</a></li>
			</ul>
		</div>
		<div class="clearfix">
		</div>
		<div class="footer-bottom-wthree">
			<div class="copyright-wthree">
				<p>&copy; 2018 ANC Travel . All Rights Reserved </p>
			</div>
			<div class="clearfix"></div>
		</div>
		</div>
		</div>
		
<script src="js/jquery-2.2.3.min.js"></script> 

					<script src="js/lightbox-plus-jquery.min.js"></script>	
			<!-- Owl-Carousel-JavaScript -->
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
			$("#owl-demo").owlCarousel ({
				items : 4,
				lazyLoad : true,
				autoPlay : true,
				pagination : true,
			});
		});
	</script>
	<!-- //Owl-Carousel-JavaScript -->  
	<!-- flexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<script type="text/javascript">
					$(window).load(function(){
					  $('.flexslider').flexslider({
						animation: "slide",
						start: function(slider){
						  $('body').removeClass('loading');
						}
					  });
					});
				  </script>
				<!-- //flexSlider -->
 <!-- Move-top-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- Move-top-scrolling -->
<!--js for bootstrap working-->
	<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->

</html>