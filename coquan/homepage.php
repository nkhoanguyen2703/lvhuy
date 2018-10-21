<div class="row">
  <div class="col-md-6">
  		<div class="panel panel-default">
  		<h3>Danh sách người hướng dẫn</h3>
  		<a href='?keycq=themnguoihuongdan.php'>Thêm người hướng dẫn mới</a>
		  <div class="table-responsive">          
			  <table class="table">
			    <thead>
			      <tr>
			        <th>Họ tên</th>
			        <th>SDT</th>
			        <th>Giới tính</th>
			        <th>Action</th>
			      </tr>
			    </thead>
			    <tbody>
			    <?php  
			    $sql = "select * from nguoihuongdan where cq_id='$coquanID'";
			    $do = mysqli_query($db,$sql);
			    while($n = mysqli_fetch_array($do)){
			    ?>
			      <tr>
			        <td><?=$n['nhd_hoten']?></td>
			        <td>0<?=$n['nhd_sdt']?></td>
			        <td>
			        <?php 
			        if($n['nhd_gioitinh']==1){ echo "Nam";}else echo "Nữ";?></td>
			        <td>Action</td>
			      </tr>
			    <?php } ?>  
			    </tbody>
			  </table>
			</div>

		</div>
  </div>






  <div class="col-md-6">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Coquan panel2</h3>
		  	
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









