<?php  
session_start();

require_once "function.php";

if( isset($_SESSION['login']) ) {
	header("Location: index.php");
	exit;
}

if( isset($_POST["login"]) ) 
{

	$username = $_POST['username'];
	$password = $_POST['password'];

	$result = mysqli_query($kon, "SELECT * FROM admin WHERE username = '$username' AND password = '$password' ");

	if( mysqli_num_rows($result) === 1 ) 
	{
		$row = mysqli_fetch_assoc($result);
		if( $row["username"] == $username && $row["password"] == $password ) {
			// set session
			$_SESSION['login'] = true;

			// cek remember me
			if( isset($_POST['remember']) ) 
			{
				setcookie('id', $row['username'], time()+120);
				setcookie('key',$row['password'], time()+120 );
			}
			header('Location: index.php');
			exit;
		}
	}
	$error = true;
}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<section>
		<div class="color"></div>
		<div class="color"></div>
		<div class="color"></div>
		<div class="box">
			<div class="square" style="--i:0;"></div>
			<div class="square" style="--i:1;"></div>
			<div class="square" style="--i:2;"></div>
			<div class="square" style="--i:3;"></div>
			<div class="square" style="--i:4;"></div>
			<div class="container">
				<div class="form">
					<h2>Login Form</h2>
					<?php if( isset($error) ) : ?>
						<p style="color: red; font-style: italic;">username / password salah</p>
					<?php endif; ?>
					<form action="" method="POST">
							<div class="inputBox">
								<input type="text" name="username" placeholder="username">
							</div>
							<div class="inputBox">
							<input type="password" name="password" placeholder="Password">
							</div>
							<div class="inputBox">
							<input type="checkbox" name="remember" id="remember">
							<div class="inputBox">
							<input type="submit" name="login" value="Login">
							</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</body>
</html>

