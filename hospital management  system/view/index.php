<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: welcome.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];
		header("Location: welcome.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}
}          


      
         $emailErrorMsg =  $passwordErrorMsg =  "";



       if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);

				return $data;
			}

      $ID =test($_POST["ID"]);
			
			$emailErrorMsg = test($_POST["email"]);
			$passwordErrorMsg = test($_POST["password"]);
			
			

			$errorMsg = "";

			

			if (empty($firstname)) {
				$emailErrorMsg = "email is incorrect <br>";
			}

			if (empty($lastname)) {
				$passwordErrorMsg = "password is incorrect <br>";
				
			}
		
			else {
				echo $errorMsg;
			}

		}

		else {
			//echo "php validation";
		}










?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form </title>
	<script defer src= "script.js"></script>
</head>
<body>
	<div class="container">
		<div id="error"></div>
		<form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="login-email" novalidate>
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input id="email" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" >
				<span><?php echo $emailErrorMsg; ?></span>


			</div>
			<div class="input-group">
				<input id="password" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" >
				<span><?php echo $passwordErrorMsg; ?></span>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>