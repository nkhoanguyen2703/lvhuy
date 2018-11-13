<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Quản lý thực tập - công ty </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!--imported by me-->
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <style>
    *{
      margin: 0px; padding: 0px;
    }
  </style>
</head>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">




<!--NAVBAR-->
<?php 
error_reporting(E_ERROR | E_PARSE); //hide Warning message
//  include "navbar.php"; 
include "../database.php"; 
include "function.php";
session_start(); 

?> 




<div class="container">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">QLTT</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     <!--  <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li> -->
      <li><a href="index.php?signout_coquan=1"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li>
    </ul>
  </div>
</nav>


<?php
error_reporting(E_ERROR | E_PARSE); //hide Warning message

$file="login.php";

if(isset($_SESSION['coquan'])){
    $file="homepage.php";
    if(isset($_GET['keycq'])){
        $file=$_GET['keycq'];
    }
    $coquan = $_SESSION['coquan']; //for easy to use
    $coquanID = getCoQuanIDByUsername($coquan,$db);
}
include $file;





if(isset($_GET['signout_coquan'])){
    unset($_SESSION['coquan']);
    echo "<script>window.location='index.php';</script>";
}

?>






</div><!--container-->



</body>
</html>
