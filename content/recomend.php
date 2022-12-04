<!doctype html>
<div class="gallery" id="gallery">
		<div class="container">  
			<h3 class="title-agileits-w3layouts">Popular destinations</h3>
<div class="gallery-grids-top">
<div class="gallery-grids">
<?php
	$no	= 1;
	$a	 ='SELECT * FROM airport limit 3';
	$b	 = mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	 = mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
	{
		$id_airport	    = $d['id_airport'];
		$airport_name	= $d['airport_name'];
		$city			= $d['city'];
		$img			= $d['gambar'];
			
?>
					
					<div class="col-md-4 col-sm-4 col-xs-6 gallery-grid-img" style="margin-bottom: 100px"> 
						<h4 class="title-agileits-w3layouts" align="center" style="color: aliceblue"><?php echo($city); ?></h4>
						<a class="example-image-link w3-agilepic" href="images/<?php echo ($img) ?>" data-lightbox="example-set" data-title="">
							<img class="example-image img-responsive" src="images/<?php echo($img) ?>" alt=""/> 
							<div class="w3ls-overlay">
								<h4><?php echo($airport_name); ?></h4>
							</div> 
						</a> 
					</div>  
<?php
	}}
			
?>
	<?php
	$no = 1;
	$q  = 'SELECT * FROM station limit 3';
	$p  = mysqli_query($koneksi,$q) or die (mysqli_error());
	$n  = mysqli_num_rows($p);
	if($n !=0){
		while ($r = mysqli_fetch_array($p))
		{
		$id_station   = $r['id_station'];
		$city	   	  = $r['city'];
		$station_name = $r['station_name'];
		$img		  = $r['gambar'];
	
?>
						<div class="col-md-4 col-sm-4 col-xs-6 gallery-grid-img hover ehover14">
						<h4 class="title-agileits-w3layouts" align="center" style="color: aliceblue"><?php echo($city); ?></h4>	
						<a class="example-image-link w3-agilepic" href="images/<?php echo ($img) ?>" data-lightbox="example-set" data-title="">
							<img class="example-image img-responsive" src="images/<?php echo ($img) ?>" alt=""/> 
							<div class="w3ls-overlay">
								<h4><?php echo($station_name) ?></h4>
							</div> 
						</a> 
					</div>
<?php
	}
	}
?>
					<div class="clearfix"> </div>	
				</div> 
			</div> 
		</div>
	</div>
