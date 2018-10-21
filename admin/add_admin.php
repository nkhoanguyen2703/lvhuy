<?php 
include "../database.php";
$name = "admin001";
$pass = "123456";
$pass = md5($pass);
$hoten = "Nguyễn Hoàng Huy";

$sql  = "insert into admin values('$name','$pass','$hoten')";
$do =mysqli_query($db,$sql);
if($do) echo "OK";
 ?>