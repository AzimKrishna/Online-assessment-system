<?php 
session_start();
if (!isset($_SESSION["uname"])){
	header("Location: ../login_student.php");
}
include '../config.php';
$uname=$_SESSION['uname'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
          <a href="#" class="active">
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
    <div class="overview-boxes">
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Exams</div>
            <div class="number"><?php  $sql="SELECT COUNT(1) FROM exm_list"; $result = mysqli_query($conn, $sql); $row=mysqli_fetch_array($result); echo $row['0'] ?></div>
            <div class="brief">
              <span class="text">Total number of exams</span>
            </div>
          </div>
          <i class='bx bx-user ico' ></i>
        </div>
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Attempts</div>
            <div class="number"><?php  $sql="SELECT COUNT(1) FROM atmpt_list WHERE uname='$uname'"; $result = mysqli_query($conn, $sql); $row=mysqli_fetch_array($result); echo $row['0'] ?></div>
            <div class="brief">
              <span class="text">Total number of attempted exams</span>
            </div>
          </div>
          <i class='bx bx-book ico two' ></i>
        </div>
        <!-- <div class="box">
          <div class="right-side">
            <div class="box-topic">Results</div>
            <div class="number"><?php  $sql="SELECT COUNT(1) FROM atmpt_list"; $result = mysqli_query($conn, $sql); $row=mysqli_fetch_array($result); echo $row['0'] ?></div>
            <div class="brief">
              <span class="text">Number of available results</span>
            </div>
          </div>
          <i class='bx bx-line-chart ico three' ></i>
        </div> -->
        <div class="box">
          <div class="right-side">
            <div class="box-topic">Annoucements</div>
            <div class="number"><?php  $sql="SELECT COUNT(1) FROM message"; $result = mysqli_query($conn, $sql); $row=mysqli_fetch_array($result); echo $row['0'] ?></div>
            <div class="brief">
              <span class="text">Total number of messages recieved</span>
            </div>
          </div>
          <i class='bx bx-paper-plane ico four' ></i>
        </div>
      </div>

      <div class="stat-boxes">
        <div class="recent-stat box" style="width:100%;">
          <div class="title" style="text-align:center;">:: General Instructions ::</div><br><br>
          <div class="stat-details">
            <ul class="details">
              <li>You are only allowed to start the test at the prescribed time. The timer will start from the current time irrespective of when you start the exam and end when the given time is up.</li><br>
              <li>You can see the history of test taken and scores in the Results section</li><br>
              <li>To start the test, click on 'Start' button in the exam section.</li><br>
              <li>Once the test is started the timer would run irrespective of your logged in or logged our status. So it is recommended not to logout before test completion.</li><br>
              <li>To mark an answer you need to select the option. Upon locking the selected options button will "blue".</li><br>
              <li>To reset the form click on the reset button at the bottom .</li><br>
              <li>The assigned tests should be completed within the submission time. Failing to complete the assessment will award you zero marks.</li><br>
            <li>The marks will be calculated and displayed instantly in the result section along with your percentage.</li><br>
          </ul>
          </div>
        </div>

  </section>

<script src="../js/script.js"></script>


</body>
</html>

