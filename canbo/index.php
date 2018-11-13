<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Quản lý thực tập - cán bộ CTU </title>
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

<nav class="navbar navbar-inverse" style="bottom:0;margin-bottom: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">QLTT</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Trang chủ</a></li>
        <li><a href="">AAAA</a></li>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?signout_canbo=1"><span class="glyphicon glyphicon-log-in"></span> Thoát</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
error_reporting(E_ERROR | E_PARSE); //hide Warning message

$file="login.php";

if(isset($_SESSION['canbo'])){
    $file="homepage.php";
    if(isset($_GET['keycb'])){
        $file=$_GET['keycb'];
    }
    $canbo = $_SESSION['canbo']; //for easy to use
    $hockyhientai = getLatestHOCKY($db);
}
include $file;





if(isset($_GET['signout_canbo'])){
    unset($_SESSION['canbo']);
    echo "<script>window.location='index.php';</script>";
}

?>






</div><!--container-->



</body>
</html>
