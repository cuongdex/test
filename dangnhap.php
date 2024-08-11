<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký - Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="css/style-login.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body >
	<div class="img-login">
	<img src="./img/cit.png" alt="" width="800px">
	</div>
	<!-- <img src="/img/dhct.png" alt=""> -->
	<div class="main">  	

		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method="POST" action="dangky.php" >
					<label for="chk" aria-hidden="true">Đăng ký</label>
					<input type="text" name="ten" placeholder="Tên đăng nhập" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="text" name="sdt" placeholder="Số điện thoại" required="">
					<input type="password" name="pswd" placeholder="Mật khẩu" required="">
					<button>Đăng Ký</button>
				</form>
			</div>

			<div class="login" >
				<form method="POST" action="login.php">
					<label for="chk" aria-hidden="true">Đăng nhập</label>
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Mật khẩu" required="">
					<button type="submit" name="dang_nhap">Đăng Nhập</button>
				</form>
			</div>
	</div>
</body>
</html>


<?php
session_start();
    if(isset($_SESSION['success_message'])){
		echo "<script>alert('đăng ký thành công')</script>";
		unset($_SESSION['success_message']);
	}
	if(isset($_SESSION['loi'])){
		echo "<script>alert('email đã được đăng ký')</script>";
		unset($_SESSION['loi']);
	}
?>