<?php

error_reporting(0);

if (isset($_SESSION["fname"])){
	header("Location: teachers/dash.php");
}

include 'config.php';
session_start();
if (isset($_POST["signin"])) {
	$uname = mysqli_real_escape_string($conn, $_POST["uname"]);
	$pword = mysqli_real_escape_string($conn, md5($_POST["pword"]));
  
	$check_user = mysqli_query($conn, "SELECT * FROM teacher WHERE uname='$uname' AND pword='$pword' ");
  
	if (mysqli_num_rows($check_user) > 0) {
	  $row = mysqli_fetch_assoc($check_user);
	  $_SESSION["user_id"] = $row['id'];
	  $_SESSION["fname"] = $row['fname'];
	  $_SESSION["email"] = $row['email'];
	  $_SESSION["dob"] = $row['dob'];
	  $_SESSION["gender"] = $row['gender'];
	  $_SESSION["uname"] = $row['uname'];
	  $_SESSION["subject"] = $row['subject'];
	  if($row['gender']=='M'){
		$_SESSION['img'] = "../img/mp.png";
	  } else if($row['gender']=='F'){
		$_SESSION['img'] = "../img/fp.png";
	  }
	  header("Location: teachers/dash.php");
	} else {
	  echo "<script>alert('Login details is incorrect. Please try again.');</script>";
	}
  }

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="teachers/css/style.css">
	<title>Login| Welcome</title>
</head>
<style>
body {
  background-image: url('<?php echo $img;?>');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
<body>
	<h1><?php echo $greet;?></h1><br>
	<div class="container" id="container">
		<div class="form-container log-in-container">
			<form action="#" method="post">
				<h1>Teacher login</h1>
				<br><br>
				<span>Enter credentials</span>
				<input type="text" name="uname" placeholder="Username" value="<?php echo $_POST['uname']; ?>" required />
				<input type="password" name="pword" placeholder="Password" required />
				<a href="#">Forgot your password?</a>
				<button type="submit" name="signin">Log In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
				<p>Login as student</p>
				<button style="background-color:#ffffff;border-color:black;"><a href="login_student.php">Continue</a></button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>