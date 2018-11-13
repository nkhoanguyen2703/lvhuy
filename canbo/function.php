<?php  

function getLatestHOCKY($db){
		$sql = "select hk_id from hockynamhoc order by hk_id DESC limit 0,1";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk[0];
	}

	
?>