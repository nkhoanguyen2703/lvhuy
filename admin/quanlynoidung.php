<?php  
	$hk= getLatestHOCKY($db);
	$tenhk = getTenHKByID($db,$hk);
?>

<div class="container">
	<div class="panel panel-default">
	  <div class="panel-body">
	  	<h2>Duyệt nội dung thực tập </h2>
	  	<p>Danh sách các nội dung thực tập được đề nghị bởi công ty trong học kỳ <?=$tenhk?></p>

	  	<div class="table-responsive">          
		  <table class="table">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>Công ty</th>
		        <th>Mô tả</th>
		        <th>SL Sinh Viên</th>
		        <th>Số bủi mỗi tuần</th>
		        <th>Bắt đầu</th>
		        <th>Kết thúc</th>
		        <th>Phân công</th>
		      </tr>
		    </thead>
		    <tbody>
		    <?php  
		    $sql = "select * from noidungthuctap nd 
		    join nguoihuongdan n on nd.nguoihuongdan=n.nhd_username
		    join coquan cq on cq.cq_id=n.cq_id
		    where hk_id=$hk and nd_tinhtrang=0";
		    $do = mysqli_query($db,$sql);
		    while($nd=mysqli_fetch_array($do)){
		    	$noidungid = $nd['nd_id'];
		    ?>
		      <tr>
		        <td><?=$nd['nd_id']?></td>
		        <td><?=$nd['cq_ten']?></td>
		        <td><?=$nd['nd_mota']?></td>
		        <td><?=$nd['nd_soluong']?></td>
		        <td><?=$nd['nd_sobuoimoituan']?></td>
		        <td><?=$nd['nd_ngaybatdau']?></td>
		        <td><?=$nd['nd_ngayketthuc']?></td>
		        <td><a href='index.php?keyad=quanlynoidung.php&duyetnoidung=<?=$noidungid?>'>Duyệt</a></td>
		      </tr>
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
if(isset($_GET['duyetnoidung'])){
	$nd = $_GET['duyetnoidung'];
	$sql = "update noidungthuctap set nd_tinhtrang=1 where nd_id=$nd";
	$do = mysqli_query($db,$sql);
	if($do){
		echo "<script>alert('Đã duyệt');window.location='index.php?keyad=quanlynoidung.php';</script>";
	}
}

?>