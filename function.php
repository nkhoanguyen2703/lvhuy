<?php  

$db = mysqli_connect("localhost", "root", "", "lv_huy");
mysqli_query($db,"SET NAMES 'UTF8'");
if(!$db)
{
    echo "Connect Failed!". mysqli_connect_error($db);
}


function getLatestHOCKY($db){
		$sql = "select hk_id from hockynamhoc order by hk_id DESC limit 0,1";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk[0];
}

function getTenHKByID($db,$id){
	$sql = "select * from hockynamhoc where hk_id='$id'";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk['hk_hocky']."-".$hk['hk_namhoc'];
}



?>	