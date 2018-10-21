<?php 
include "../database.php";
$name = "sinhvien001";
$pass = "123456";
$pass = md5($pass);
$hoten = "Nguyễn Hoàng Huy";
$gioitinh = 1;
$email = "huy@student.ctu.edu.vn";
$dc = "01 Hoa Bình";
$manganh = "HTTT";
$sql  = "insert into sinhvien values('$name','$pass','$hoten',$gioitinh,'1996-00-00','$email','$dc','$manganh')";
$do =mysqli_query($db,$sql);
if($do) echo "OK";
 ?>