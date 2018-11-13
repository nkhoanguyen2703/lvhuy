
<div class="panel panel-default" style="width:500px;margin:auto;">
  <div class="panel-body">
  	<h2>Thêm học kỳ năm học mới</h2>

  	<form action="" method="POST">
	  <div class="form-group">
	    <label>Học kỳ</label>
	    <input type="number" class="form-control" name="hk" >
	    <label>Năm học</label>
	    <input type="text" class="form-control" name="namhoc" >
	  </div>
	  <button type="submit" name="btn_themhocky" class="btn btn-default">Thêm mới </button>
	</form>
	
	<p>Dữ liệu gần đây</p>            
  
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>STT </th>
	        <th>Tên</th>
	        <th></th>
	      </tr>
	    </thead>
	    <tbody>

	    <?php  
	    $stt = 1;
	    $sql = "select * from hockynamhoc ORDER BY hk_id DESC LIMIT 0,5";
	    $do = mysqli_query($db,$sql);
	    while($t = mysqli_fetch_array($do)){
	    ?>
	      <tr>
	        <td><?=$stt?></td>
	        <td><?=$t['hk_hocky']?></td>
	        <td><?=$t['hk_namhoc']?></td>
	      </tr>
	      <?php  
	      $stt = $stt + 1;
	      }
	      ?>

	    </tbody>
	  </table>



  </div>
</div>

<?php  
	if(isset($_POST['btn_themhocky'])){
		$hk = $_POST['hk'];
		$namhoc = $_POST['namhoc'];
		$sql = "insert into hockynamhoc values('',$hk,'$namhoc')";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã thêm');window.location='?keyad=hockynamhoc.php';</script>";
		}else{
			echo "<script>alert('Chưa thêm được');window.location='?keyad=hockynamhoc.php';</script>";
		}
	}

?>