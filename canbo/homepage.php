<?php  
$sql = "select count(*) from noidungthuctap a 
join phancong b on a.nd_id=b.pc_noidung where a.hk_id=$hockyhientai and b.pc_canbo=$canbo";
$do = mysqli_query($db,$sql);
$dk = mysqli_fetch_array($do);
$count = $dk[0];
if($count == 0){
?>


<div class="row">
  <div class="col-md-4">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Nội dung được phân công</h3>
		  	<?php  
		  	$sql2 = "select * from noidungthuctap a 
			join phancong b on a.nd_id=b.pc_noidung 
			join nguoihuongdan n on n.nhd_username=a.nguoihuongdan
			join coquan cq on n.cq_id=cq.cq_id
			where a.hk_id=$hockyhientai and b.pc_canbo='$canbo'";
		
			$do2 = mysqli_query($db,$sql2);
			$nd = mysqli_fetch_array($do2);
			$ndid = $nd['nd_id'];
		  	?>
		  	<h4><?=$nd['cq_ten']?></h4>
		  	<br>
		  	<b><?=$nd['nd_mota']?></b>
		  	<hr>
		  	<p><?=$nd['nd_yeucau']?></p>
		  	<hr>
		  	Mã ngành mục tiêu: <?=$nd['manganh']?>
			  	
			
			<br>

		  </div>
		</div>
  </div>



  <div class="col-md-8">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Danh sách sinh viên đăng ký</h3>
		  	
		  	<input class="form-control" id="myInput" type="text" placeholder="Search..">
			  <br>
			  <table class="table table-bordered table-striped">
			    <thead>
			      <tr>
			        <th>Tên SV</th>
			        <th>Email</th>
			        <th>Ngành</th>
			        <th>Chấm điểm</th>
			        <th></th>
			      </tr>
			    </thead>
			    <tbody id="myTable">
			    <?php  
			    $sql = "select * from sinhvien a
			    join phieudangky pdk on a.sv_mssv=pdk.pdk_sinhvien
			    where pdk.pdk_noidungthuctap=$ndid
			    and pdk.pdk_trangthai=1";

			    $do = mysqli_query($db,$sql);
			    while ( $c = mysqli_fetch_array($do)){
			    	$mssv = $c['sv_mssv'];
			    	$phieuid = $c['pdk_id'];
			    	$diem = $c['pdk_diem'];
			    ?>
			      <tr>
			        <td><?=$c['sv_hoten']?></td>
			        <td><?=$c['sv_email']?></td>
			        <td><?=$c['sv_manganh']?></td>
			        <td>
			        	<form method="POST">
						  <div class="input-group">
						    <input type="text" name="diemso" class="form-control" placeholder="Điểm số" value="<?=$diem?>">
						    <input type="hidden" name="phieuid" value="<?=$phieuid?>">
						    <div class="input-group-btn">
						      <button class="btn btn-default" name="chamdiem" type="submit">
						        <i class="glyphicon glyphicon-upload"></i>
						      </button>
						    </div>
						  </div>
						</form>
			        </td>
			        <td>
			        	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal<?=$mssv?>">Xem nhận xét từ CBHD</button>
			        </td>
			      </tr>


			      <!-- Modal -->
				  <div class="modal fade" id="myModal<?=$mssv?>" role="dialog">
				    <div class="modal-dialog">
				    
				      <!-- Modal content-->
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				          <h4 class="modal-title">Một số nhận xét từ cán bộ hướng dẫn</h4>
				        </div>
				        <div class="modal-body">

				        <p>
				         
								<?php  
				          	$tmp = "select * from phieudanhgiasinhvien a
				          	join chitietdanhgiasinhvien b on a.phieu_id=b.phieu_id
				          	join tieuchidanhgiasinhvien c on b.tieuchi_id=c.tc_id
				          	where a.phieu_sv='$mssv' and a.phieu_hocky=$hockyhientai";
				          	$dotmp = mysqli_query($db,$tmp);
				          	while($tc = mysqli_fetch_array($dotmp)){
				          	?>
						     
						        <li><?=$tc['tc_ten']?>--<?=$tc['diem']?></li>
						       
						
						    <?php } ?>
						 
				        </p>
				          
				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				      
				    </div>
				  </div>


			      <?php } ?>
			    </tbody>
			  </table>

		  </div>
		</div>
  </div>
</div>
<?php  
}else{
?>

<div class="row">
  <div class="col-md-8">
  		<div class="panel panel-default">
		  <div class="panel-body">
		  	<h3>Thông tin nội dung đang thực tập</h3>

		  
		  	<?php  
		  	$sql = "select * from phieudangky a 
		  	join noidungthuctap b on a.pdk_noidungthuctap=b.nd_id 
		  	join nguoihuongdan n on b.nguoihuongdan=n.nhd_username
		  	join coquan cq on cq.cq_id=n.cq_id
		  	where a.pdk_sinhvien='$sinhvien'";
		  	
		  	$do = mysqli_query($db,$sql);
		  	$nd = mysqli_fetch_array($do);
		  	$status = $nd['pdk_trangthai'];
		  	if($status == 0){
		  		$trangthai = "Đang chờ duyệt";
		  	}else{
		  		$trangthai = "Đã duyệt";
		  	}
		  	?>

		  	<div class="well">
			  	<h4><?=$nd['cq_ten']?></h4>
			  	<b><i><?=$trangthai?></i></b>
			  	<h4><?=$nd['nd_mota']?></h4>
			  	<p><?=$nd['nd_yeucau']?></p>
			  	Ngày gửi: <?=$nd['pdk_ngaygui']?><br>
			  	
		  	</div>

		 

		  </div>
		</div>
  </div>
</div>


<?php } ?>



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

	if(isset($_POST['chamdiem'])){
		$phieuid = $_POST['phieuid'];
		$diemso = $_POST['diemso'];
		$sql = "UPDATE phieudangky SET pdk_diem=$diemso WHERE pdk_id=$phieuid";
		$do = mysqli_query($db,$sql);
		if($do){
			echo "<script>alert('Đã cập nhật điểm số');window.location='index.php';</script>";
		}
	}

?>









