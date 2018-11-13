<div class="row">

<div class="col-md-3">
</div>

<div class="col-md-6">
	<div class="well">
		<h3>Tạo nội dung thực tập mới</h3><hr>
		
	

		<form action="" method="POST">
			<div class="form-group">
	      <label for="sel1">Ngành</label>
	      <select class="form-control" id="sel1" name="nganh">

	      <?php  
	      $sql = "select * from nganh";
	      $do = mysqli_query($db,$sql);
	      while($n = mysqli_fetch_array($do)){
	      ?>
	        <option value="<?=$n['manganh']?>"><?=$n['tennganh']?></option>
	       <?php } ?>
	      </select>

		  <div class="form-group">
		    <label>Mô tả:</label>
		    <input type="text" name="mota" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Yêu cầu chi tiết:</label>
		    <input type="text" name="yeucau" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>SL:</label>
		    <input type="number" name="sl" class="form-control" >
		  </div>
		  <div class="form-group">
		    <label>Số buổi mỗi tuần:</label>
		    <input type="number" name="sobuoi" class="form-control" >
		  </div>
		  <div class="checkbox">
		    <label><input name="phonglamviec" type="checkbox" value="1"> Có phòng làm việc ?</label>
		  </div>
		  <div class="checkbox">
		    <label><input name="maytinh" type="checkbox" value="1"> Được cấp máy tính ?</label>
		  </div>
		   <div class="form-group">
		    <label>Thời gian bắt đầu </label>
		    <input type="date" name="batdau" class="form-control" >
		  </div>

		  <div class="form-group">
		    <label>Thời gian kết thúc </label>
		    <input type="date" name="ketthuc" class="form-control" >
		  </div>

		  <button type="submit" name="taonoidung" class="btn btn-default">Thêm</button>
		</form>



	</div>
</div>


<div class="col-md-3">
</div>


</div>

<?php 

	if(isset($_POST['taonoidung'])){
		$mota = $_POST['mota'];
		$yeucau = $_POST['yeucau'];
		$sl = $_POST['sl'];
		$sobuoi = $_POST['sobuoi'];
		$maytinh = 0;
		$phonglamviec = 0;
		$manganh = $_POST['nganh'];
		
		if(isset($_POST['maytinh'])){
			$maytinh = 1;
		}
		if(isset($_POST['phonglamviec'])){
			$phonglamviec = 1;
		}
		$hkid = $_GET['hk'];
		$start = $_POST['batdau'];
		$end = $_POST['ketthuc'];
		$sql = "insert into noidungthuctap values('','$mota','$yeucau',$sl,0,$sobuoi,$phonglamviec,$maytinh,'$start','$end',$hkid,'$manganh','$cbhd')";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã thêm');window.location='index.php';</script>";
		}else{
			echo "<script>alert('Lỗi xảy ra 009xx');</script>";
		}
	}

 ?>