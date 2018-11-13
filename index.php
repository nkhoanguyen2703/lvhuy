<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<!-- 	<center>
	<h1>Hệ thống quản lý thực tập</h1>
	
	<div class="row">
  <div class="col-md-3">
  	<h2><a href="sinhvien">Dành cho sinh viên</a></h2>
  </div>
  <div class="col-md-3">
  	<h2><a href="canbo">Dành cho cán bộ</a></h2>
  </div>
  <div class="col-md-3">
  	<h2><a href="coquan">Dành cho công ty/cơ quan</a></h2>
  </div>
  <div class="col-md-3">
  	<h2><a href="canbohd">Dành cho cán bộ hướng dẫn</a></h2>
  </div>
</div>
	 -->


	<main>
  <h1>Hệ thống quản lý thực tập thực tế </h1>
  <h2>Trường Đại học Cần Thơ </h2>
  <button class="toggle-overlay">Phân hệ</button>
</main>


<aside>
  <div class="outer-close toggle-overlay">
    <a class="close"><span></span></a>
  </div>
  <nav>
    <ul>
      <li><a href="sinhvien">Sinh Viên </a></li>
      <li><a href="canbo">Cán Bộ</a></li>
      <li><a href="coquan">Cơ Quan</a></li>
      <li><a href="canbohd">Cán Bộ Hướng Dẫn</a></li>
    </ul>
  </nav>
</aside>
	
	

	</center>

  
</body>
</html>
<style>
a{
	color: white;
}
body {
	background: RGBA(29, 20, 35, 1);
	font-family: 'Muli';
	-webkit-font-smoothing: antialiased;
}
main {
	padding: 60px 15px;
	text-align: center;
	max-width: 100%;
}
h1 {
	font-size: 2.5em;
	font-weight: 300;
	color: rgba(255, 255, 255, .9);
	margin: 0 0 10px;
}
@media screen and (min-width: 600px) {
	h1 {
		font-size: 3em;
	}
}
h2 {
	margin: 0 0 50px;
	font-size: 1.5em;
	font-weight: 200;
	color: rgba(255, 255, 255, .6);
}
aside {
	position: fixed;
	width: 100%;
	height: 100%;
	top: 0;
	left: 0;
	background: linear-gradient(200deg, #27156E, #6A2A88, #9F4981);
	opacity: 0;
	visibility: hidden;
	transition: all .5s ease;
	z-index: 2;
}
.open {
	opacity: 1;
	visibility: visible;
}
nav {
	text-align: center;
	height: 95vh;
	display: flex;
	flex-direction: column;
	justify-content: center;
	ul {
		margin: 0;
		padding: 0;
		list-style: none;
		li {
			align-items: center;
			flex: 1;
			line-height: 20vh;
			a {
        font-size: 1.5em;
				transition: all 0.5s ease;
				display: block;
				text-decoration: none;
				color: rgba(255, 255, 255, .5);
				&:hover {
					color: rgba(255, 255, 255, .9);
					transform: scale(1.1);
					&:before {
						visibility: visible;
						transform: scaleX(1);
					}
				}
				&:before {
					content: "";
					position: absolute;
					width: 50%;
					height: 2px;
					bottom: 0;
					left: 25%;
					background: white;
					visibility: hidden;
					transform: scaleX(0);
					transition: all 0.3s ease-in-out 0s;
				}
			}
		}
	}
}
@media screen and (min-width: 600px) {
  nav ul li a {
    font-size: 3em;
  }
}
button {
	padding: 15px 40px;
	background: transparent;
	border: 1px solid rgba(255, 255, 255, .4);
	color: white;
	border-radius: 8px;
	transition: all .5s ease;
	&:hover {
		border: 1px solid rgba(255, 255, 255, 1);
	}
}
.close {
	position: fixed;
	top: 40px;
	right: 60px;
	color: white;
	z-index: 3;
	cursor: pointer;
	font-family: sans-serif;
  span,
  span:before,
  span:after {
    border-radius: 4px;
    height: 5px;
    width: 35px;
    background: white;
    position: absolute;
    display: block;
    content: '';
  }
  span {
    background: transparent;
  }
  span:before {
  transform: rotate(45deg);
  }
  span:after {
  transform: rotate(-45deg);
  }
}
.outer-close {
    position: absolute;
    right: 0;
    top: 0;
    width: 85px;
    height: 85px;
    cursor: pointer;
}


</style>
<script>
(function($) {
  $(function() {
    $('.toggle-overlay').click(function() {
      $('aside').toggleClass('open');
    });
  });
})(jQuery);
</script> 