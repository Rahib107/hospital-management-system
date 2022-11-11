<?php 

include 'config.php';

error_reporting(0);

session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (username, email, password)
					VALUES ('$username', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				echo "<script>alert('Wow! User Registration Completed.')</script>";
				$username = "";
				$email = "";
				$_POST['password'] = "";
				$_POST['cpassword'] = "";
			} else {
				echo "<script>alert('Woops! Something Wrong Went.')</script>";
			}
		} else {
			echo "<script>alert('Woops! Email Already Exists.')</script>";
		}
		
	} else {
		echo "<script>alert('Password Not Matched.')</script>";
	}
}



       $nameErrorMsg=  $emailErrorMsg =  $passwordErrorMsg = $cpasswordErrorMsg= "";



       if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);

				return $data;
			}

      $ID =test($_POST["ID"]);
			$nameErrorMsg = test($_POST["username"]);
			$emailErrorMsg = test($_POST["email"]);
			$passwordErrorMsg = test($_POST["password"]);
			$cpasswordErrorMsg = test($_POST["cpassword"]);
			

			$errorMsg = "";

			if (empty($ID)) {
				$nameErrorMsg = "username is empty <br>";
			}

			if (empty($firstname)) {
				$emailErrorMsg = "email is empty <br>";
			}

			if (empty($lastname)) {
				$passwordErrorMsg = "password is empty <br>";
				
			}

			if (empty($gender)) {
				$cpasswordErrorMsg = "Confirm password is not selected <br>";
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
	<script = defer src="script2.js" ></script>


	<title>Register Form </title>
</head>
<body>
	<div id="error"></div>
	<div class="container">
		<form id="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="login-email" novalidate>
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
			<div class="input-group">
				<input id="name" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
				<span><?php echo $nameErrorMsg; ?></span>


			</div>
			<div class="input-group">
				<input id="email" type="email" placeholder="Email" name="email" value="<?php echo $email; ?>">
				<span><?php echo $emailErrorMsg; ?></span>


			</div>
			<div class="input-group">
				<input id="password" type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" >
				<span><?php echo $passwordErrorMsg; ?></span>
            </div>
            <div class="input-group">
				<input id="cpassword" type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>">
				<span><?php echo $cpasswordErrorMsg; ?></span>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>
			<p class="login-register-text">Have an account? <a href="index.php">Login Here</a>.</p>
		</form>
	</div>
</body>
</html>