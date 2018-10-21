<?php 


include "database.php";
$pass = 'fpt';
$pass = md5($pass);
$sql= "update coquan set cq_password='$pass' where cq_username='fpt'";
$do = mysqli_query($db,$sql);
if($do) echo " ok";
 ?>