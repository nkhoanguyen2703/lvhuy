<div class="row">
  <div class="col-md-6">
  		<div class="panel panel-default">
  		<h3>Nội dung đang quản lý</h3>

  		<?php  

	  		$hockygannhat = getLatestHOCKY($db);
	  		$tenhk = getTenHK($hockygannhat,$db);
	  		echo $tenhk;

	  		$check = checkNeuChuaTaoNoiDungThucTap('$cbhd',$hockygannhat,$db);
	  		echo "HELLO: ".$check;
	  		if($check == 0){
	  			echo "<br><a href='?keycbhd=taonoidungthuctap.php&hk=$hockygannhat'>Tạo nội dung thực tập</a>";
	  		}else{
	  			$sql = "select * from noidungthuctap where nguoihuongdan='$cbhd' and hk_id=$hockygannhat";
			    $do = mysqli_query($db,$sql);
			    $n = mysqli_fetch_array($do);
			    
			    ?>

			    <h4>Mô tả: <?=$n['nd_mota']?></h4>
			    SL: <?=$n['nd_soluong']?><br>
			    Tình trạng: <?=$n['nd_tinhtrang']?><br>
			    Số buổi/ tuần: <?=$n['nd_sobuoimoituan']?><br>
			    Phòng làm việc: <?=$n['nd_cophonglamviec']?><br>
			    Được cấp máy tính: <?=$n['nd_duoccapmaytinh']?><br>
			    Bắt đầu: <?=$n['nd_ngaybatdau']?><br>
			    Kết thúc: <?=$n['nd_ngayketthuc']?><br>
			    Yêu cầu: <?=$n['nd_yeucau']?><br>
			    <?php
	  		}
	    ?>
		
		</div>
  </div>






  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Chưa bố trí</h3>
		  	
		  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Tên cơ quan</th>
			        <th>Địa chỉ</th>
			        <th>Email</th>
			        <th>Sdt</th>
			        <th>MST</th>
			        <th>Duyệt</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			    	<?php 
			    	$sql = "select * from coquan where cq_trangthai=0";
			    	$do = mysqli_query($db,$sql);
			    	while($cq = mysqli_fetch_array($do)){
			    		$id=$cq['cq_id'];
			    	 ?>
			    	
			      <tr>
			        <td><?=$cq['cq_ten']?></td>
			        <td><?=$cq['cq_diachi']?></td>
			        <td><?=$cq['cq_email']?></td>
			        <td><?=$cq['cq_sdt']?></td>
			        <td><?=$cq['cq_masothue']?></td>
			        <td><a href="?keyad=duyetcoquan.php&cq=<?=$id?>">Duyệt</a></td>
			      </tr>
			      <?php } ?>

			    </tbody>
			  </table>

		  </div>
		</div>
  </div>
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









