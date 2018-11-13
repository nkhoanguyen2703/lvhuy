
<?php  
	$phieu = getNextIDValueByTable(phieudanhgiasinhvien,$db);
	if(isset($_GET['sv'])){
		$sv = $_GET['sv'];
		$sql = "select * from sinhvien where sv_mssv='$sv'";
		$do = mysqli_query($db,$sql);
		$sinhvien = mysqli_fetch_array($do);
		$hoten = $sinhvien['sv_hoten'];
	}

?>

<div class="panel panel-default">
  <div class="panel-body">
  		<h2>Chấm điểm cho sinh viên: <?=$hoten?></h2>

  		<form method="POST">

  		 <?php
        $lsp = $_GET['lsp'];
        $sql="select * from tieuchidanhgiasinhvien";
        $do=mysqli_query($db,$sql);
        while($row=mysqli_fetch_array($do)){
        	$tcid = $row['tc_id'];
        ?>

            <div class="form-group">
                <label><?=$row['tc_ten']?></label>
                <input type="text" size="20" class="form-control" name="<?=$row['tc_id']?>" >
            </div>
        <?php
        }
        ?>

        
        <button type="submit" class="btn btn-default" name="btn_chamdiem" value="Chấm điểm">Chấm điểm</button>
        </form>

  </div>
</div>

<?php  
	if(isset($_POST['btn_chamdiem'])){
		$sql2="select * from tieuchidanhgiasinhvien";
	    $mang=array();//chua cac thong so ky thuat
	    $do=mysqli_query($db,$sql2);
	    while($hang=mysqli_fetch_array($do)){
	        if(isset($_POST[$hang['tc_id']])){
	            $mang[$hang['tc_id']]=$_POST[$hang['tc_id']];
	        }
	    }

	    $a1 = "insert into phieudanhgiasinhvien values($phieu,'$cbhd','$sv',$hockyhientai)";
	    $a2 = mysqli_query($db,$a1);


	    if($a2){
	    	$check = 1;
	    	foreach ($mang as $key => $val)
	        {
	             $sql3="insert into chitietdanhgiasinhvien values('',$phieu,'$key','$val')";
	             $do2=mysqli_query($db,$sql3);
	             if(!$do2){
	                $check=0;
	             }
	        }
	        if($check == 0){
	        	echo "Lỗi xảy ra";
	        }else{
	        	echo "<script>alert('Đã cập nhật điểm');window.history.go(-2);</script>";
	        }
	    }

	    

	}
?>