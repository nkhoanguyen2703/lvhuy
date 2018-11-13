<div class="row">

<div class="col-md-2">
</div>

<div class="col-md-4">
	<div class="well">
		<h2>Thông tin cơ quan</h2>
		<?php  
		if(isset($_GET['cq'])){
			$cq = $_GET['cq'];
			$sql = "select * from coquan where cq_id=$cq";
			$do = mysqli_query($db,$sql);
			$coquan = mysqli_fetch_array($do);
		}
		?>
		<h4><?=$coquan['cq_ten']?></h4>
		<span>Địa chỉ: <?=$coquan['cq_diachi']?></span><br>
		<span>SDT: <?=$coquan['cq_sdt']?></span><br>
		<span>Email: <?=$coquan['cq_email']?></span><br>
		<span>Mã số thuế: <?=$coquan['cq_masothue']?></span>
	</div>
</div>

<div class="col-md-4">

	<div class="well">
		<h2>Cấp tài khoản cho cơ quan</h2>
		<p>Lưu ý: cấp tài khoản cho cơ quan đồng nghĩa với việc cơ quan đã được chấp thuận</p>
		<form action="" method="POST">

		  <div class="form-group">
		    <label>Tên tài khoản cơ quan</label>
		    <input type="text" class="form-control" required name="ten">
		  </div>

		  <div class="form-group">
		    <label>Mật khẩu cơ quan</label>
		    <input type="text" class="form-control" required name="pass">
		  </div>

		  <button type="submit" name="btn_captaikhoan" class="btn btn-default">Cấp tài khoản cơ quan</button>
		</form>
	</div>
</div>

<div class="col-md-2">
</div>

</div>



<?php 


if(isset($_POST['btn_captaikhoan'])){

	$pwd = $_POST['pass'];
	$pwd = md5($pwd);
	$ten = $_POST['ten'];

	//update username,password and trangthai = 1
	$sqlx = "update coquan set cq_username='$ten',cq_password='$pwd',cq_trangthai=1 where cq_id=$cq";
	$doThem = mysqli_query($db,$sqlx);
	if($doThem){
		echo "<script>alert('Đã duyệt cơ quan');window.location='index.php';</script>";
	}else{
		echo "<script>alert('Chưa duyệt được cơ quan !');</script>";
	}
}

 ?>