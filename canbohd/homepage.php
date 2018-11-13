<div class="row">
  <div class="col-md-6">
  		<div class="panel panel-default">
  		<h3>Nội dung đang quản lý</h3>

  		<?php  

	  		$hockygannhat = getLatestHOCKY($db);
	  		$tenhk = getTenHK($hockygannhat,$db);
	  		echo $tenhk;

	  		$check = checkNeuChuaTaoNoiDungThucTap($cbhd,$hockygannhat,$db);

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
		  	<h3>Duyệt đăng ký sinh viên</h3>
		  	
		  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Tên SV</th>
			        <th>Giới tính</th>
			        <th>Ngay sinh</th>
			        <th>Ngành</th>
			        <th>Duyệt</th>
			        <th>Từ chối</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			    	<?php 
			    	
			    	$sql = "select * from phieudangky a join sinhvien b 
			    	on a.pdk_sinhvien=b.sv_mssv where a.pdk_noidungthuctap=$ndid and a.pdk_trangthai=0";
			    	
			    	$do = mysqli_query($db,$sql);
			    	while($sv = mysqli_fetch_array($do)){
			    		$mssv = $sv['sv_mssv'];
			    	 ?>
			    	
			      <tr>
			        <td><?=$sv['sv_hoten']?></td>
			        <td><?=$sv['sv_gioitinh']?></td>
			        <td><?=$sv['sv_ngaysinh']?></td>
			        <td><?=$sv['sv_manganh']?></td>
			        <td><a href="index.php?duyetsv=<?=$mssv?>&noidungid=<?=$ndid?>">Duyệt</a>
			        <td><a href="index.php?tuchoisv=<?=$mssv?>&noidungid=<?=$ndid?>">Từ chối</a></td>
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
	if(isset($_GET['tuchoisv'])){
		$sv = $_GET['tuchoisv'];
		$nd = $_GET['noidungid'];
		$sql = "DELETE FROM phieudangky where pdk_noidungthuctap=$nd AND pdk_sinhvien='$sv'";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã từ chối');window.location='index.php';</script>";
		}else{
			echo "<script>alert('Chưa được');window.location='index.php';</script>";
		}

	}

	if(isset($_GET['duyetsv'])){
		$sv = $_GET['duyetsv'];
		$nd = $_GET['noidungid'];
		$sql = "UPDATE phieudangky SET pdk_trangthai=1 WHERE pdk_noidungthuctap=$nd AND pdk_sinhvien='$sv'";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã duyệt');window.location='index.php';</script>";
		}else{
			echo "<script>alert('Chưa duyệt được');window.location='index.php';</script>";
		}
	}

?>








