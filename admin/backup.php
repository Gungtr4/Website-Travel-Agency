<h1>Back Up Database</h1>
<form enctype="multipart/form-data" method="post" class="form-horizontal">
	<label class="col-sm-3 control-label">Klik Tombol Untuk Proses</label>
		<button type="submit" name="restore" class="btn btn-danger">Back Up Database</button>
	
</form>

<?php
if(isset($_POST['restore'])){
	include("backup-data.php");
}

?>