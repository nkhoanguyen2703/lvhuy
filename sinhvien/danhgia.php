
<?php  
	$phieu = getNextIDValueByTable(phieudanhgiacoquan,$db);
	if(isset($_GET['cqid'])){
		$cq = $_GET['cqid'];
		
	}

?>

<div class="panel panel-default">
  <div class="panel-body">
  		<h2>Đánh giá cơ quan</h2>

  		<form method="POST">

  		 <?php
        $lsp = $_GET['lsp'];
        $sql="select * from tieuchidanhgiacoquan";
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

        
        <button type="submit" class="btn btn-default" name="btn_chamdiem" value="Đánh Giá">Đánh Giá</button>
        </form>

  </div>
</div>

<?php  
	if(isset($_POST['btn_chamdiem'])){
		$sql2="select * from tieuchidanhgiacoquan";
	    $mang=array();//chua cac thong so ky thuat
	    $do=mysqli_query($db,$sql2);
	    while($hang=mysqli_fetch_array($do)){
	        if(isset($_POST[$hang['tc_id']])){
	            $mang[$hang['tc_id']]=$_POST[$hang['tc_id']];
	        }
	    }

	    $a1 = "insert into phieudanhgiacoquan values($phieu,$cq,'$sinhvien',$hockyhientai)";
	    $a2 = mysqli_query($db,$a1);


	    if($a2){
	    	$check = 1;
	    	foreach ($mang as $key => $val)
	        {
	             $sql3="insert into chitietdanhgiacoquan values('',$phieu,'$key','$val')";
	             $do2=mysqli_query($db,$sql3);
	             if(!$do2){
	                $check=0;
	             }
	        }
	        if($check == 0){
	        	echo "Lỗi xảy ra";
	        }else{
	        	echo "<script>alert('Đã cập nhật');window.history.go(-2);</script>";
	        }
	    }

	    

	}
?>