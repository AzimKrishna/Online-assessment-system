<?php 
date_default_timezone_set('Asia/Kolkata');
session_start();
if (!isset($_SESSION["fname"])){
	header("Location: ../login_teacher.php");
}
include '../config.php';
error_reporting(0);

$sql="SELECT * FROM exm_list";
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
          <a href="#" class="active">
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
          <a href="records.php">
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
      <div class="stat-boxes" >
        <div class="recent-stat box" style="padding: 0px 0px;width:75%;">
               <table>
                    <thead>
                        <tr>
                            <th>Exam no.</th>
                            <th>Exam name</th>
                            <th>Description</th>
                            <th>No. of questions</th>
                            <th>Exam time</th>
                            <th>Submission time</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        if(mysqli_num_rows($result) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($result))
                            {
                        ?>
                            <tr>
                                 <td><?php  echo $i; ?></td>
                                <td><?php  echo $row['exname']; ?></td>
                                <td><?php  echo $row['desp']; ?></td>
                                <td><?php  echo $row['nq']; ?></td>
                                <td><?php  echo $row['extime']; ?></td>
                                <td><?php  echo $row['subt']; ?></td>
                                <td>
                                    <form action="addqp.php" method="post">
                                         <input type="hidden" name="nq" value="<?php echo $row['nq']; ?>">
                                       
                                        <input type="hidden" name="exid" value="<?php $exid=$row['exid']; echo $row['exid']; ?>">
                                        
                                        <button type="submit" name="edit_btn" class ="rounded-button-updt"><i class='bx bxs-edit' ></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form action="delexam.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['exid']; ?>">
                                        <button type="submit" name="delete_btn" class="rounded-button-del"><i class='bx bx-x'></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                          $i++;
                            } 
                        }
                        ?>
                    </tbody>
                </table>
        </div>
        <div class="top-stat box">
          <div class="title">Add new exam</div>
          <br><br>
              <form action="addexam.php" method="post">
              <input type="hidden" name="subject" value="<?php echo $_SESSION['subject']; ?>">
              <label for="exname">Exam name</label><br>
				      <input class="inputbox" type="text" id="exname" name="exname" placeholder="Enter exam name" minlength ="3" maxlength="30" required /></br>
              <label for="desp">Description</label><br>
				      <input class="inputbox" type="text" id="desp" name="desp" placeholder="Enter exam description" minlength ="5" maxlength="30" required /></br>
              <label for="extime">Exam time</label><br>
				      <input class="inputbox" type="datetime-local" id="extime" name="extime" required /></br>
              <label for="subt">Submission time</label><br>
				      <input class="inputbox" type="datetime-local" id="subt" name="subt" required /></br>
              <label for="nq">No. of questions</label><br>
				      <input class="inputbox" type="number" id="nq" name="nq" required /></br>
              <br><br>             
              <button type="submit" name="addexm" class="btn"><i class='bx bx-plus' ></i> Add</button>    
          </form>
        </div>
      </div>
      
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>
