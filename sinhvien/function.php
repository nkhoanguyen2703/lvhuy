<?php  

function getNextIDValueByTable($tablename,$db){
		$sql2 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name='$tablename'";
		$do=mysqli_query($db,$sql2);
		$x = mysqli_fetch_array($do);
		$nextID = $x[0];
		return $nextID;
	}
	
?>