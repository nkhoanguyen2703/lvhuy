<?php 
include "../database.php";
$name = "sinhvien008";
$pass = "123456";
$pass = md5($pass);
$hoten = "Quách Tuấn Khoa";
$gioitinh = 1;
$email = "khoaquach@student.ctu.edu.vn";
$dc = "09 Hoa Bình";
$manganh = "HTTT";
$sql  = "insert into sinhvien values('$name','$pass','$hoten',$gioitinh,'1996-03-03','$email','$dc','$manganh')";
$do =mysqli_query($db,$sql);
if($do) echo "OK";
 ?>