<?php  
$sql = "select count(*) from phieudangky where pdk_sinhvien='$sinhvien' ";
$do = mysqli_query($db,$sql);
$dk = mysqli_fetch_array($do);
$count = $dk[0];
if($count == 0){
?>


<div class="row">
  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Đề nghị cơ quan mới</h3>

		  	
			  	<form action="" method="POST">
				  <div class="form-group">
				    <label>Tên cơ quan<label>
				    <input type="text" name="tencoquan"  class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Địa chỉ</label>
				    <input type="text" name="diachi"  class="form-control">
				  </div>
				  <div class="form-group">
				    <label>SDT:</label>
				    <input type="number" name="sdt" class="form-control">
				  </div>
				 <div class="form-group">
				    <label>Email<label>
				    <input type="email" name="email"  class="form-control">
				  </div>
				  <div class="form-group">
				    <label>Mã số thuế<label>
				    <input type="number" name="mst"  class="form-control">
				  </div>
				  <button type="submit" name="btn_denghicoquan" class="btn btn-default">Thêm</button>
				</form>
			
			<br>

		  </div>
		</div>
  </div>



  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">

		  	<h3>Gợi ý một số cơ quan thực tập</h3>
		  	<p>Top 5 công ty có số lượng sinh viên đăng ký nhiều nhất</p>


		  	<table class="table table-bordered">
			  	<thead>
				  	<tr>
				  	<th>STT</th>
				  	<th>Tên công ty</th>
				  	<th>Địa chỉ</th>
				  	<th>Email</th>
				  	</tr>
			  	</thead>
		  	<tbody>
		  	<?php  
		  	$sql = "select DISTINCT cq.cq_id,cq.cq_diachi,cq.cq_email,cq.cq_ten,sum(pdk_trangthai) as total from phieudangky pdk join noidungthuctap nd on nd.nd_id=pdk.pdk_noidungthuctap join nguoihuongdan n on n.nhd_username=nd.nguoihuongdan join coquan cq on cq.cq_id=n.cq_id group by cq.cq_id ORDER BY total DESC";
		  	$do = mysqli_query($db,$sql);
		  	$stt = 1;
		  	while($x = mysqli_fetch_array($do)){
		  		$cqid = $x['cq_id'];
		  	?>
			  	<tr>
			  		<td><?=$stt?></td>
				  	<td><a href='?keysv=chonnoidung.php&cty=<?=$cqid?>'><?=$x['cq_ten']?></td>
				  	<td><?=$x['cq_diachi']?></td>
				  	<td><?=$x['cq_email']?></td>
			  	</tr>
		  	<?php 
		  	$stt = $stt + 1;
		  	} ?>
		  	</tbody>
		  	</table>





		  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Tên công ty</th>
			        <th>Địa chỉ</th>
			        <th>Email</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			    <?php  
			    $sql = "select * from coquan where cq_trangthai=1";
			    $do = mysqli_query($db,$sql);
			    while ( $c = mysqli_fetch_array($do)){
			    	$idcty = $c['cq_id'];
			    ?>
			      <tr>
			        <td><a href='?keysv=chonnoidung.php&cty=<?=$idcty?>'><?=$c['cq_ten']?></a></td>
			        <td><?=$c['cq_diachi']?></td>
			        <td><?=$c['cq_email']?></td>
			      </tr>
			      <?php } ?>
			    </tbody>
			  </table>

		  </div>
		</div>
  </div>
</div>
<?php  
}else{
?>

<div class="row">
  <div class="col-md-8">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Thông tin nội dung đang thực tập</h3>

		  
		  	<?php  
		  	$sql = "select * from phieudangky a 
		  	join noidungthuctap b on a.pdk_noidungthuctap=b.nd_id 
		  	join nguoihuongdan n on b.nguoihuongdan=n.nhd_username
		  	join coquan cq on cq.cq_id=n.cq_id
		  	where a.pdk_sinhvien='$sinhvien'";
		  	
		  	$do = mysqli_query($db,$sql);
		  	$nd = mysqli_fetch_array($do);
		  	$cqid = $nd['cq_id'];
		  	$status = $nd['pdk_trangthai'];
		  	if($status == 0){
		  		$trangthai = "Đang chờ duyệt";
		  	}else{
		  		$trangthai = "Đã duyệt";
		  	}
		  	?>

		  	<div class="well">
			  	<h4><?=$nd['cq_ten']?></h4>



			  	<?php  
			  	$sqlx = "select count(*) from phieudangky where pdk_sinhvien='$sinhvien' and pdk_trangthai=1 ";
				$dox = mysqli_query($db,$sqlx);
				$tmp = mysqli_fetch_array($dox);
				$c = $dk[0];
				if($c > 0){
			  	?>
			  	<a href='?keysv=danhgia.php&cqid=<?=$cqid?>'>Đánh giá cơ quan</a><br>
			  	<?php 
			  	}
			  	 ?>



			  	<b><i><?=$trangthai?></i></b>
			  	<h4><?=$nd['nd_mota']?></h4>
			  	<p><?=$nd['nd_yeucau']?></p>
			  	Ngày gửi: <?=$nd['pdk_ngaygui']?><br>
			  	
		  	</div>

		  </div>
		</div>
  </div>

  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  <h3>Đánh giá kết quả thực tập</h3>
		  <?php  
		  $s = "select * from phieudangky a join noidungthuctap b 
		  on a.pdk_noidungthuctap=b.nd_id
		  where b.hk_id=$hockyhientai and a.pdk_sinhvien='$sinhvien'";
		  $d = mysqli_query($db,$s);
		  $sv = mysqli_fetch_array($d);
		  ?>
		  <h4>Điểm số: <?=$sv['pdk_diem']?></h4>
		  </div>
	  </div>
  </div>
</div>


<?php } ?>



</div>

<!-- for filter in Goi y co quan thuc tap -->
  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>


<?php  
	if(isset($_POST['btn_denghicoquan'])){
		$ten = $_POST['tencoquan'];
		$dc = $_POST['diachi'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		$mst = $_POST['mst'];

		$sql = "insert into coquan values('','$ten','','','$dc',$sdt,'$email',$mst,0)";
		
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã gửi yêu cầu, sinh viên vui lòng chờ được duyệt!');window.location='index.php';</script>";
		}else{
			echo "<script>alert('Lỗi gửi yêu cầu cơ quan 001xx');</script>";
		}
	}

?>









