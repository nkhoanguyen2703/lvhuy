<div class="row">

<div class="col-md-3">
</div>

<div class="col-md-6">
	<div class="well">
		<form action="" method="POST">
				  <div class="form-group">
				    <label>Tên cán bộ hướng dẫn<label>
				    <input type="text" name="ten"  class="form-control">
				  </div>

				  <div class="form-group">
					  <label>Giới tính<label>
					  <label class="radio-inline">
					  <input type="radio" name="gioitinh" value='1' checked>Nam</label>
						<label class="radio-inline">
						<input type="radio" name="gioitinh" value='0'>Nữ</label>
					</label>
					</div>

					<div class="form-group">
					  <label>Học vị<label>
					  <label class="radio-inline">
					  <input type="radio" name="hocvi" value='KS' checked>KS</label>
					  <label class="radio-inline">
					  <input type="radio" name="hocvi" value='ThS' >ThS</label>
						<label class="radio-inline">
						<input type="radio" name="hocvi" value='TS'>TS</label>
						<label class="radio-inline">
						<input type="radio" name="hocvi" value='PGS'>PSG</label>
						<label class="radio-inline">
						<input type="radio" name="hocvi" value='GS'>GS</label>
					</label>
					</div>



				  <div class="form-group">
				    <label>Username</label>
				    <input type="text" name="username"  class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Password:</label>
				    <input type="text" name="pwd" class="form-control">
				  </div>
				 <div class="form-group">
				    <label>Số điện thoại<label>
				    <input type="number" name="sdt"  class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Email<label>
				    <input type="email" name="email"  class="form-control">
				  </div>

				  <button type="submit" name="btn_themnguoi" class="btn btn-default">Thêm</button>
				</form>
	</div>
</div>


<div class="col-md-3">
</div>


</div>

<?php 

	if(isset($_POST['btn_themnguoi'])){
		$ten = $_POST['ten'];
		$gt = $_POST['gioitinh'];
		$hv = $_POST['hocvi'];
		$username = $_POST['username'];
		$pwd = $_POST['pwd'];
		$pwd = md5($pwd);
		$sdt = $_POST['sdt'];
		$mail = $_POST['email'];
		$coquanID = getCoQuanIDByUsername($coquan,$db);
		$sql = "insert into nguoihuongdan values('$username','$pwd','$ten',$gt,'$hv',$sdt,'$mail',$coquanID)";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã thêm');window.location='index.php';</script>";
		}else{
			echo "<script>alert('Username đã tồn tại');</script>";
		}
	}

 ?>