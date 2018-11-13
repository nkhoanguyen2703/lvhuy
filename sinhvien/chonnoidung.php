<?php  
	if(isset($_GET['cty'])){
		$idcty = $_GET['cty'];
	}
?>
<div class="container-fluid" style="width:100%;">
	
				<table class="table table-bordered table-striped" style="width:100%;">
			    <thead>
			      <tr>
			        <th>STT</th>
			        <th>Mô tả</th>
			        <th>Yêu cầu</th>
			        <th>SL nhận</th>
			        <th>Buổi/ tuần</th>
			        <th>Phòng làm việc</th>
			        <th>Được cấp PC</th>
			        <th>Bắt đầu</th>
			        <th>Kết thúc</th>
			        <th>Ngành</th>
			        <th>DK</th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			    <?php  
			    $sql = "select * from noidungthuctap nd
			    join nguoihuongdan n on n.nhd_username=nd.nguoihuongdan
			    join coquan cq on cq.cq_id=n.cq_id
			    where cq.cq_id=$idcty and nd.nd_tinhtrang=1";
			
			    $do = mysqli_query($db,$sql);
			    while ( $nd = mysqli_fetch_array($do)){
			    	$ndid = $nd['nd_id'];
			    	$stt = 1;
			    ?>
			      <tr>
			      	<td><?=$stt?></td>
			        <td><?=$nd['nd_mota']?></td>
			        <td><?=$nd['nd_yeucau']?></td>
			        <td><?=$nd['nd_soluong']?></td>
			        <td><?=$nd['nd_sobuoimoituan']?></td>
			        <td><?=$nd['nd_cophonglamviec']?></td>
			        <td><?=$nd['nd_duoccapmaytinh']?></td>
			        <td><?=$nd['nd_ngaybatdau']?></td>
			        <td><?=$nd['nd_ngayketthuc']?></td>
			        <td><?=$nd['manganh']?></td>
			      	<td><a href='?keysv=chonnoidung.php&nopnoidung=<?=$ndid?>'>Nộp</a></td>
			      </tr>
			      <?php 
			      $stt = $stt+1;
			      } 
			      ?>


			    </tbody>
			  </table>

</div>

<?php  
	if(isset($_GET['nopnoidung'])){
		$nd = $_GET['nopnoidung'];
		$sv = $_SESSION['sinhvien'];
		$ngaygui = date("Y-m-d H:i:s"); 
		$sql = "insert into phieudangky(pdk_id,pdk_trangthai,pdk_ngaygui,pdk_noidungthuctap,pdk_sinhvien) values('',0,'$ngaygui',$nd,'$sv')";
		$do= mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Thành công');window.history.go(-2);</script>";
		}else{
			echo "<script>alert('Thất bại');window.history.go(-2);</script>";
		}
	}
?>