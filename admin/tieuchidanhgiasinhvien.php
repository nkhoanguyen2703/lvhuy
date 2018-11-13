
<div class="panel panel-default" style="width:500px;margin:auto;">
  <div class="panel-body">
  	
  	<form action="" method="POST">
	  <div class="form-group">
	    <label>Tiêu chí mới:</label>
	    <input type="text" class="form-control" name="tc" >
	  </div>
	  <button type="submit" name="btn_themtieuchi" class="btn btn-default">Thêm mới </button>
	</form>
	
	<p>Danh sách các tiêu chí hiện có để cán bộ đánh giá sinh viên</p>            
  
	  <table class="table table-striped">
	    <thead>
	      <tr>
	        <th>STT </th>
	        <th>Tên</th>
	      </tr>
	    </thead>
	    <tbody>

	    <?php  
	    $stt = 1;
	    $sql = "select * from tieuchidanhgiasinhvien";
	    $do = mysqli_query($db,$sql);
	    while($t = mysqli_fetch_array($do)){
	    ?>
	      <tr>
	        <td><?=$stt?></td>
	        <td><?=$t['tc_ten']?></td>
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
	if(isset($_POST['btn_themtieuchi'])){
		$tc = $_POST['tc'];
		$sql = "insert into tieuchidanhgiasinhvien values('','$tc')";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã thêm');window.location='?keyad=tieuchidanhgiasinhvien.php';</script>";
		}else{
			echo "<script>alert('Chưa thêm được');window.location='?keyad=tieuchidanhgiasinhvien.php';</script>";
		}
	}

?>