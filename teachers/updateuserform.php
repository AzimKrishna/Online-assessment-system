<?php 
session_start();
if (!isset($_SESSION["fname"])){
	header("Location: ../login_teacher.php");
}
include '../config.php';
error_reporting(0);

// $sql="SELECT * FROM student";
// $result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Messages</title>
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
          <a href="#" class="active">
           <i class='bx bxs-user-circle'></i>
            <span class="links_name">Records</span>
          </a>
        </li>
        <li>
          <a href="messages.php" >
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a href="settings.php">
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
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard">Teacher's Dashboard</span>
      </div>
      <div class="profile-details">
        <img src="<?php echo $_SESSION['img'];?>" alt="pro">
        <span class="admin_name"><?php echo $_SESSION['fname'];?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="stat-boxes">
      <div class="recent-stat box" style="width:40%;">

        <div class="title">Update details</div>
        <br><br>
        <?php
        
          if(isset($_POST['edit_btn']))
          {
              $id = $_POST['edit_id'];
              
              $query = "SELECT * FROM student WHERE id='$id' ";
              $query_run = mysqli_query($conn, $query);
              $row = mysqli_fetch_assoc($query_run);
                if($row['gender']=='M'){
                    $img= "../img/mp.png";
                } else if($row['gender']=='F'){
                    $img = "../img/fp.png";
                }

              foreach($query_run as $row)
              {
        ?>
        <img src="<?php echo $img;?>" alt="pro" style=" display: block; margin-left: auto; margin-right: auto; width:50%; max-width:200px";>
        <form action="updateuser.php" method="post">
                  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                 <label for="fname">Full Name</label><br>
			      	  <input class="inputbox" type="text" id="fname" name="fname" placeholder="Enter full name" value="<?php echo $row['fname']; ?>" minlength ="4" maxlength="30" required /></br>
                    <label for="uname">Username</label><br>
				          <input class="inputbox" type="text" id="uname" name="uname" placeholder="Enter username" value="<?php echo $row['uname']; ?>" disabled required /></br>
                     <label for="email">Email</label><br>
				         <input class="inputbox" type="email" id="email" name="email" placeholder="Enter email" value="<?php echo $row['email']; ?>" minlength ="5" maxlength="50" required />
                    <label for="dob">Date of Birth</label><br>
				         <input class="inputbox" type="date" id="dob" name="dob" placeholder="Enter DOB" value="<?php echo $row['dob']; ?>" required /><br>
                 <label for="gender">Gender</label><br>
				        <input class="inputbox" type="text" id="gender" name="gender" placeholder="Enter gender (M or F)" value="<?php echo $row['gender']; ?>" minlength ="1" maxlength="1" required /><br>    
                   
                   <a href="records.php" class="btnc" style="border: 1px solid #d80000; background-color: #d80000;">Cancel</a>
                   <button type="submit" name="updatebtn" class="btnc">Update</button>    
        </form>
        <?php
              }
          }
        
        ?>
        </div>
      </div>
      
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>
