<div class="row">
  <div class="col-md-2">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Admin panel1</h3>

		  	
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






  <div class="col-md-10">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Danh sách cơ quan mới chờ duyệt</h3>
		  	
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









