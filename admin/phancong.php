<?php  
	$hk= getLatestHOCKY($db);
	$tenhk = getTenHKByID($db,$hk);
?>

<div class="container">
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Danh sách chưa phân công</h2>
	  	<p>Phân công giảng viên chấm điểm các nhóm thực tập học kỳ <?=$tenhk?></p>

	  	<div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Cty</th>
		        <th>Mô tả</th>
		        <th>SL Sinh Viên</th>
		        <th>Số bủi mỗi tuần</th>
		        <th>Bắt đầu</th>
		        <th>Kết thúc</th>
		        <th>Phân công</th>
		        <th>AB</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php  
		    $sql = "select * from noidungthuctap a join nguoihuongdan b on a.nguoihuongdan=b.nhd_username
		    join coquan c on b.cq_id=c.cq_id
		    where hk_id=$hk and nd_tinhtrang=1 and nd_id NOT IN 
		    (select pc_noidung from phancong)";//ok 
		    $do = mysqli_query($db,$sql);
		    while($nd=mysqli_fetch_array($do)){
		    	$noidungid = $nd['nd_id'];
		    ?>
		    	<form method="POST">
		    	<input type="hidden" value="<?=$noidungid?>" name="nd">

		      <tr>
		        <td><?=$nd['nd_id']?></td>
		        <td><?=$nd['cq_ten']?></td>
		        <td><?=$nd['nd_mota']?></td>
		        <td><?=$nd['nd_soluong']?></td>
		        <td><?=$nd['nd_sobuoimoituan']?></td>
		        <td><?=$nd['nd_ngaybatdau']?></td>
		        <td><?=$nd['nd_ngayketthuc']?></td>
		        <td>
		        	
					  <select class="form-control" id="sel1" name="cbid">
					  	<?php  
					  	$sql2 = "select * from canbo where cb_mscb NOT IN 
					  	(select pc_canbo from phancong pc join noidungthuctap nd on pc.pc_noidung=nd.nd_id where nd.hk_id=$hk)";

					  	$do2 = mysqli_query($db,$sql2);
					  	while($cb = mysqli_fetch_array($do2)){
					  		$macanbo = $cb['cb_mscb'];
					  	?>
					    <option value='<?=$macanbo?>'><?=$cb['cb_ten']?></option>
					    <?php  
						}
					    ?>
					  </select>
					
		        </td>

		        <td><button class="btn-default" type="submit" name="phancong">Phân công</button></td>
		      </tr>
		      
		      </form>
	      	<?php  
		  	}
		    ?>

		    </tbody>
		  </table>
		  </div>

	  </div>
	</div>
</div>

<?php  
	if(isset($_POST['phancong'])){
		$cb = $_POST['cbid'];
		$nd = $_POST['nd'];
		$sqlx = "insert into phancong values('$cb',$nd)";
		$dox = mysqli_query($db,$sqlx);
		if($dox){
			echo "<script>alert('Đã phân công');window.location='index.php?keyad=phancong.php';</script>";
		}
	}
?>