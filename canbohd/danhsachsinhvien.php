<div class="container">
<h2>Danh sách sinh viên</h2>
  <p>DSSV đã duyệt cho nội dung thực tập hiện tại</p>            
  <table class="table">
    <thead>
      <tr>
        <th>STT</th>
        <th>Họ tên </th>
        <th>MSSV</th>
        <th>Giới tính</th>
        <th>Email</th>
        <th>Điểm</th>
      </tr>
    </thead>
    <tbody>
    <?php  
    $stt = 1;
    $sql = "select * from sinhvien sv join phieudangky pdk on sv.sv_mssv=pdk.pdk_sinhvien
    where pdk.pdk_noidungthuctap=$ndid AND pdk.pdk_trangthai=1";
    $do = mysqli_query($db,$sql);
    while($sv = mysqli_fetch_array($do)){
      $masv = $sv['sv_mssv'];
    ?>

      <tr>
        <td><?=$stt?></td>
        <td><?=$sv['sv_hoten']?></td>
        <td><?=$sv['sv_mssv']?></td>
        <td><?=$sv['sv_gioitinh']?></td>
        <td><?=$sv['sv_email']?></td>
        <td>
          <?php  
        $check = checkIfChamDiemRoi($masv,$hockyhientai,$cbhd,$db);
        if($check > 0){
          echo "Đã chấm điểm rồi";
        }else{
        ?>
        <a href='?keycbhd=chamdiem.php&sv=<?=$masv?>'>Chấm điểm</a>
        <?php } ?>
        </td>
      </tr>

    <?php 
    $stt = $stt + 1; 
	}
    ?> 
    </tbody>
  </table>

</div>