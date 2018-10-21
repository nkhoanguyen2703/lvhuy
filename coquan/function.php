<?php  

include "../database.php";

	function getCoQuanIDByUsername($username,$db){
		$sql = "select cq_id from coquan where cq_username='$username'";
		$do = mysqli_query($db,$sql);
		$tv = mysqli_fetch_array($do);
		return $tv[0];
	}

?>