<?php  

include "../database.php";

	function sdfdsf($username,$db){
		$sql = "select cq_id from coquan where cq_username='$username'";
		$do = mysqli_query($db,$sql);
		$tv = mysqli_fetch_array($do);
		return $tv[0];
	}

	function getLatestHOCKY($db){
		$sql = "select hk_id from hockynamhoc order by hk_id DESC limit 0,1";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk[0];
	}

	function getTenHK($id,$db){
		$sql = "select * from hockynamhoc where hk_id=$id";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk['hk_hocky']."/".$hk['hk_namhoc'];
	}

	function checkNeuChuaTaoNoiDungThucTap($canbo,$hockyhientai,$db){
		$sql = "select count(*) from noidungthuctap where nguoihuongdan='$canbo' and hk_id=$hockygannhat";
		$do = mysqli_query($db,$sql);
		$x = mysqli_fetch_array($do);
		if($x[0] > 0){
			return 1; //da tao noi dung o hoc ky hien tai roi`
		}else{
			return 0;
		}
	}

	

?>