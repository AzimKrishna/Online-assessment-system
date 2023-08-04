<?php 
session_start();
if (!isset($_SESSION["fname"])){
	header("Location: ../login_student.php");
}
include '../config.php';
error_reporting(0);

$id=$_SESSION['id'];
$sql="SELECT * FROM student WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
  $row = mysqli_fetch_assoc($result);
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Settings</title>
    <link rel="stylesheet" href="css/dash.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bx bx-diamond'></i>
      <span class="logo_name">Welcome</span>
    </div>
      <ul class="nav-links">
        <li>
          <a href="dash.php">
            <i class='bx bx-grid-alt'></i>
            <span class="links_name">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="exams.php">
            <i class='bx bx-book-content' ></i>
            <span class="links_name">Exams</span>
          </a>
        </li>
        <li>
          <a href="results.php">
          <i class='bx bxs-bar-chart-alt-2'></i>
            <span class="links_name">Results</span>
          </a>
        </li>
        <li>
          <a href="messages.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
         <a href="#" class="active">
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li>
          <a href="help.php">
            <i class='bx bx-help-circle' ></i>
            <span class="links_name">Help</span>
          </a>
        </li>
        <li class="log_out">
           <a href="../logout.php">
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Student Dashboard</span>
      </div>
    </nav>

    <div class="home-content">

      <div class="stat-boxes">
        <div class="recent-stat box" style="width:40%;">

          <div class="title">My Profile</div>
          <br><br>
          <img src="<?php echo $_SESSION['img'];?>" alt="pro" style=" display: block; margin-left: auto; margin-right: auto; width:50%; max-width:200px";>
            <form action="" method="post">
              <label for="fname">Full Name</label><br>
				      <input class="inputbox" type="text" id="fname" name="fname" placeholder="Enter your full name" value="<?php echo $_SESSION['fname']; ?>" minlength ="4" maxlength="30" required /></br>
              <label for="uname">Username</label><br>
				      <input class="inputbox" type="text" id="uname" name="uname" value="<?php echo $_SESSION['uname']; ?>" disabled required /></br>
              <label for="email">Email</label><br>
				      <input class="inputbox" type="email" id="email" name="email" placeholder="Enter your email"value="<?php echo $_SESSION['email']; ?>" minlength ="5" maxlength="50" required />
              <label for="dob">Date of Birth</label><br>
				      <input class="inputbox" type="date" id="dob" name="dob" placeholder="Enter your DOB" value="<?php echo $_SESSION['dob']; ?>" required /><br>
              <label for="gender">Gender</label><br>
				      <input class="inputbox" type="text" id="gender" name="gender" placeholder="Enter your gender (M or F)" value="<?php echo $_SESSION['gender']; ?>" minlength ="1" maxlength="1" required /><br>    
              <br><br>             
              <button type="submit" name="submit" class="btn">Update</button>    
          </form>
        </div>
      </div>
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>
<?php
if(isset($_POST['submit'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $sql="UPDATE student SET fname='$fname',dob='$dob',gender='$gender',email='$email' WHERE id ='{$_SESSION["user_id"]}'";
  $result=mysqli_query($conn, $sql) or die(mysqli_error($conn));
  echo "<script>alert('Profile updated successfully! Kindly re-login to see the changes.');</script>";
}
?>
