<?php  

include "../database.php";

	function checkIfChamDiemRoi($sinhvien,$hocky,$canbo,$db){
		$sql = "select count(*) from phieudanhgiasinhvien where phieu_cbhd='$canbo' and phieu_sv='$sinhvien' and phieu_hocky='$hocky'";
		$do = mysqli_query($db,$sql);
		$hk = mysqli_fetch_array($do);
		return $hk[0];
	}

	function getNextIDValueByTable($tablename,$db){
		$sql2 = "SELECT `auto_increment` FROM INFORMATION_SCHEMA.TABLES WHERE table_name='$tablename'";
		$do=mysqli_query($db,$sql2);
		$x = mysqli_fetch_array($do);
		$nextID = $x[0];
		return $nextID;
	}


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

	function getMyNoiDung($db,$me,$hockyhientai){
		$sql = "select nd_id from noidungthuctap where hk_id=$hockyhientai and nguoihuongdan='$me'";
		$do = mysqli_query($db,$sql);
		$a = mysqli_fetch_array($do);
		return $a['nd_id'];
	}
	function checkNeuChuaTaoNoiDungThucTap($canbo,$hockyhientai,$db){
		$sql = "select count(*) from noidungthuctap where nguoihuongdan='$canbo' and hk_id=$hockyhientai";
		$do = mysqli_query($db,$sql);
		$x = mysqli_fetch_array($do);
		if($x[0] > 0){
			return 1; //da tao noi dung o hoc ky hien tai roi`
		}else{
			return 0;
		}
	}

	$x= checkNeuChuaTaoNoiDungThucTap('fpt_lethi',2,$db);
	echo $x;
	

?>