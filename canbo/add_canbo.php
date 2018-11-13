<?php 
include "../database.php";

$name = "ctu002";
$pass = "ctu002";
$pass = md5($pass);
$hoten = "Phạm Diễm";

$sql  = "insert into canbo(cb_mscb,cb_password,cb_ten) values('$name','$pass','$hoten')";
$do =mysqli_query($db,$sql);
if($do) echo "OK";
 ?>