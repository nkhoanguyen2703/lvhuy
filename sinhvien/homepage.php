<div class="row">
  <div class="col-md-4">
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





  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Thông tin nội dung đang thực tập</h3>

		  
		  	
		  	<a href="?key=duan.php&duan=<?=$id?>">
		  	<div class="well">
		  		<h4><?=$ten?></h4>
		  		<h5><?=$ht?></h5>
		  		<h5><?=$tt?></h5>
		  	</div>
		  	</a>

		 

		  </div>
		</div>
  </div>






  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Gợi ý một số cơ quan thực tập</h3>
		  	
		  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Firstname</th>
			        <th>Lastname</th>
			        <th>Email</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			      <tr>
			        <td>John</td>
			        <td>Doe</td>
			        <td>john@example.com</td>
			      </tr>
			      <tr>
			        <td>Mary</td>
			        <td>Moe</td>
			        <td>mary@mail.com</td>
			      </tr>
			      <tr>
			        <td>July</td>
			        <td>Dooley</td>
			        <td>july@greatstuff.com</td>
			      </tr>
			      <tr>
			        <td>Anja</td>
			        <td>Ravendale</td>
			        <td>a_r@test.com</td>
			      </tr>
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









