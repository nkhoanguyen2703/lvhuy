<h2>Bảng đánh giá công ty từ sinh viên</h2>
  <p></p>            
  <table class="table">
    <thead>
      <tr>
      	<th>Công ty</th>
      	<?php  
      	$a = "select * from tieuchidanhgiacoquan ORDER BY tc_id";
      	$a1 = mysqli_query($db,$a);
      	while($a2 = mysqli_fetch_array($a1)){
      	?>
        <th><?=$a2['tc_ten']?></th>
        <?php  
    	}
        ?>
      </tr>
    </thead>
    <tbody>
    	<?php  
    	$sqlt = "select * from coquan order by cq_ten";
    	$dot = mysqli_query($db,$sqlt);
    	while($cq = mysqli_fetch_array($dot)){
    		$cqid = $cq['cq_id'];
    	?>	
		      <tr>
		      	<td><?=$cq['cq_ten']?></td>
		      	
		      	<?php  
		    	$b = "SELECT b.tieuchi_id,AVG(b.diem) as trungbinh FROM `phieudanhgiacoquan` a join chitietdanhgiacoquan b on a.phieu_id=b.phieu_id where coquan_id=$cqid group by b.tieuchi_id";
				
				$b2 = mysqli_query($db,$b);
				while($b3 = mysqli_fetch_array($b2)){
		    	?>
		        <td><?=$b3['trungbinh']?></td>
		        <?php  
		    	}
		        ?>
		      </tr>
      <?php  
  		}
      ?>
      
    </tbody>
  </table>