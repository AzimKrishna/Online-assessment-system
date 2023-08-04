<?php 
session_start();
if (!isset($_SESSION["uname"])){
	header("Location: ../login_student.php");
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
    <title>Exams</title>
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
          <a href="messages.php">
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
        <span class="dashboard">Student Dashboard</span>
      </div>
      <div class="profile-details">
      <img src="<?php echo $_SESSION['img'];?>" alt="pro">
        <span class="admin_name"><?php echo $_SESSION['fname'];?></span>
      </div>
    </nav>

    <div class="home-content">
      <div class="stat-boxes">
       <div class="recent-stat box" style="padding: 0px 0px; width:90%">
               <table>
                    <thead>
                        <tr>
                            <th>Sl.no</th>
                            <th>Exam Name</th>
                            <th>Description</th>
                            <th>Subject</th>
                            
                            <th>No. of questions</th>
                            <th>Exam time</th>
                            <th>Submission time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                          $i=1;
                        if(mysqli_num_rows($result) > 0)        
                        {  
                            while($row = mysqli_fetch_assoc($result))
                            {
                                  $exid=$row['exid'];
                                  $uname=$_SESSION['uname'];
                                  $rqst="SELECT status FROM atmpt_list WHERE uname='$uname' AND exid='$exid'";
                                  $ret = mysqli_query($conn, $rqst);
                                  $res = mysqli_fetch_assoc($ret);
                                  $status=$res['status'];
                                  if($status=='1'){
                                    continue;
                                  }
                                  else{
                                    echo '<tr>
                                    <td>' . $i . '</td>
                                    <td>' . $row['exname'] . '</td>
                                    <td>' . $row['desp'] . '</td>
                                    <td>' . $row['subject'] . '</td>
                                    
                                    <td>' . $row['nq'] . '</td>
                                    <td>' . $row['extime'] . '</td>
                                    <td>' . $row['subt'] . '</td>
          
                                    <td>
                                        <form action="examportal.php" method="post">
                                            <input type="hidden" name="exid" value="' . $row['exid'] . '">
                                            <input type="hidden" name="nq" value="' . $row['nq'] . '">
                                            <input type="hidden" name="subject" value="' . $row['exname'] . '">
                                            <input type="hidden" name="desp" value="' . $row['desp'] . '">
                                            <button type="submit" name="edit_btn" class ="exmbtn">Start</button>
                                        </form>
                                    </td>
                                </tr>';
                                  }
                          $i++;
                            } 
                        }
                        ?>
                    </tbody>
                </table>
        </div>
      </div>
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>

