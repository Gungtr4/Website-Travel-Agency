<div>
	<a href="index.php?halaman=pesawat">Airplane</a>
	<a href="index.php?halaman=kereta">Train</a>
</div>
 <?php
  if (isset($_GET['halaman'])){
	  $hal=($_GET['halaman']);
  if($hal=="pesawat"){
	  include("pesawat.php");
  }
  else if($hal=="kereta"){
	  include("kereta.php");
  }
  }
  ?>
