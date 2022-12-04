<?php
if(isset($_GET['form']) && $_GET['form']=='tambah'){
	include("../content/user_admin_tambah.php");
}else if(isset($_GET['form']) && $_GET['form']=='edit'){
	include("../content/user_admin_edit.php");
}else if(isset($_GET['form']) && $_GET['form']=='hapus'){
	include("../content/user_admin_hapus.php");
}
?>

<h5>Content User Admin</h5>
<p align="center"><a href="index.php?halaman=user&form=tambah">
<input type="button" value="ADD User"></a></p>
<table align="center" width="600" border="1">
<thead>
	<th>No</th>
    <th>UserID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Username</th>
    <th>Password</th>
    <th>City</th>
    <th>Country</th>
    <th>Level</th>
    <th>EDIT</th>
    <th>DELETE</th>
</thead>
<tbody>
<?php
	$no   = 1; 
	$a	= 'SELECT * FROM user';
 	$b	= mysqli_query($koneksi,$a) or die (mysqli_error());
	$c	= mysqli_num_rows($b);
	if($c !=0){
		while($d=mysqli_fetch_array($b))
		{
			$id_user	= $d['id_user'];
    		$name	    = $d['name'];
			$email	    = $d['email'];
			$username   = $d['username'];
			$password   = $d['pass'];
			$city       = $d['city'];
			$country    = $d['country'];
			$level      = $d['level'];
			echo'
				<tr align="center">
					<td>'.$no.'</td>
					<td>'.$id_user.'</td>
					<td>'.$name.'</td>
					<td>'.$email.'</td>
					<td>'.$username.'</td>
					<td>'.$password.'</td>
					<td>'.$city.'</td>
					<td>'.$country.'</td>
					<td>'.$level.'</td>
					<td><a href="index.php?halaman=user&form=edit&kode='.$id_user.'">EDIT</a></td>
					<td><a href="index.php?halaman=user&form=hapus&kode='.$id_user.'">DELETE</a></td>
				</tr>';
				$no++;
		}
	}
?>
</tbody>
</table>
