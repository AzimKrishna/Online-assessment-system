<?php 
session_start();
if (!isset($_SESSION["fname"])){
	header("Location: ../login_teacher.php");
}
include '../config.php';
error_reporting(0);

$sql="SELECT * FROM student";
$result = mysqli_query($conn, $sql);

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
        <span class="dashboard">Teacher's Dashboard</span>
      </div>
      <div class="profile-details">
        <img src="<?php echo $_SESSION['img'];?>" alt="pro">
        <span class="admin_name"><?php echo $_SESSION['fname'];?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="stat-boxes">
        <div class="recent-stat box" style="padding: 0px 0px;">
               <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>DOB</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($result) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['id']; ?></td>
                                <td><?php  echo $row['fname']; ?></td>
                                <td><?php  echo $row['uname']; ?></td>
                                <td><?php  echo $row['email']; ?></td>
                                <td><?php  echo $row['gender']; ?></td>
                                <td><?php  echo $row['dob']; ?></td>
                                <td>
                                    <form action="updateuserform.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class ="rounded-button-updt"><i class='bx bxs-edit' ></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="del.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="rounded-button-del"><i class='bx bx-x'></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <div class="top-stat box">
          <div class="title">Add new student</div>
          <br><br>
          <img src="../img/anon.png" alt="pro" style=" display: block; margin-left: auto; margin-right: auto; width:30%; max-width:200px";>
            <form action="adduser.php" method="post">
              <label for="fname">Full Name</label><br>
				      <input class="inputbox" type="text" id="fname" name="fname" placeholder="Enter full name" minlength ="4" maxlength="30" required /></br>
              <label for="uname">Username</label><br>
				      <input class="inputbox" type="text" id="uname" name="uname" placeholder="Enter username" minlength ="5" maxlength="15" required /></br>
              <label for="pword">Password</label><br>
				      <input class="inputbox" type="password" id="pword" name="pword" placeholder="pass****" minlength ="8" maxlength="16" required /></br>
              <label for="cpword">Confirm password</label><br>
				      <input class="inputbox" type="password" id="cpword" name="cpword" placeholder="pass****" minlength ="8" maxlength="16" required /></br>
              <label for="email">Email</label><br>
				      <input class="inputbox" type="email" id="email" name="email" placeholder="Enter email" minlength ="5" maxlength="50" required />
              <label for="dob">Date of Birth</label><br>
				      <input class="inputbox" type="date" id="dob" name="dob" placeholder="Enter DOB" required /><br>
              <label for="gender">Gender</label><br>
				      <input class="inputbox" type="text" id="gender" name="gender" placeholder="Enter gender (M or F)" minlength ="1" maxlength="1" required /><br>    
              <br><br>             
              <button type="submit" name="adduser" class="btn">Update</button>    
          </form>
        </div>
      </div>
      
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>
