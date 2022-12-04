<?php
	include("../koneksi.php");
	error_reporting(0);
	$file=date("Ymd").'_backup_database_'.time().'.sql';
	backup_tables("localhost","root","","ukktokobuku",$file);
?>
<p align="center">Backup database telah berhasil !</p><br />
<p align="center"><a style="cursor:pointer" onclick="location.href='backup-download.php?nama_file=<?php echo $file;?>'" title="Download">Klik Untuk Download file database</a></p>


<?php
	/*untuk memanggil nama fungsi :: jika anda ingin membackup semua tabel yang ada didalam database, biarkan tanda BINTANG (*) pada variabel $tables = '*'
	jika hanya tabel-table tertentu, masukan nama table dipisahkan dengan tanda KOMA (,) 
	*/
function backup_tables($host,$user,$pass,$name,$nama_file,$tables ='*')	{
	$link = mysqli_connect($host,$user,$pass);
	mysqli_select_db($name,$link);
							
	if($tables == '*'){
		$tables = array();
		$result = mysqli_query('SHOW TABLES');
		while($row = mysqli_fetch_row($result)){
			$tables[] = $row[0];
		}
	}else{//jika hanya table-table tertentu
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
							
	foreach($tables as $table){
		$result = mysqli_query('SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
																
		$return.= 'DROP TABLE '.$table.';';//menyisipkan query drop table untuk nanti hapus table yang lama
		$row2 	= mysqli_fetch_row(mysqli_query('SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
								
		for ($i = 0; $i < $num_fields; $i++) {
			while($row = mysqli_fetch_row($result)){
			//menyisipkan query Insert. untuk nanti memasukan data yang lama ketable yang baru dibuat
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) {
					//akan menelusuri setiap baris query didalam
					$row[$j] = addslashes($row[$j]);
					$row[$j] = ereg_replace("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}							
	//simpan file di folder
	$nama_file;
							
	$handle = fopen('backup/'.$nama_file,'w+');
	fwrite($handle,$return);
		fclose($handle);
	}
?>