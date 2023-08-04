<?php 
error_reporting(0);
session_start();
if (!isset($_SESSION["fname"])){
	header("Location: ../login_teacher.php");
}
include('../config.php');
$exid = $_POST['exid'];
$nq = $_POST['nq'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Edit question paper</title>
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
          <a href="exams.php" class="active">
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
          <a href="messages.php">
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
         <a href="settings.php" >
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
    </nav>

    <div class="home-content">

      <div class="stat-boxes">
        <div class="recent-stat box" style="width:70%;">

          <div class="title">Add questions</div>
          <br><br>
            <form action="addexam.php" method="post">
            <?php 
            for($i = 1; $i <= $nq; $i++){
            echo'
            <input type="hidden" name="nq" value="' . $nq . '">
            <input type="hidden" name="exid" value="' . $exid . '">
            <label for="q' . $i . '"><b>Question number ' . $i . '</b></label><br><br>
            <label for="q' . $i . '">Enter the question:</label><br>
			<input class="inputbox" type="text" id="q' . $i . '" name="q' . $i . '" placeholder="Enter the question here" minlength ="4" maxlength="200" required /></br>
            <label for="o1' . $i . '">Option A:</label><br>
			<input class="inputbox" type="text" id="o1' . $i . '" name="o1' . $i . '" placeholder="Enter option A" minlength ="2" maxlength="100" required /></br>
            <label for="o2' . $i . '">Option B:</label><br>
			<input class="inputbox" type="text" id="o2' . $i . '" name="o2' . $i . '" placeholder="Enter option B" minlength ="2" maxlength="100" required /></br>
            <label for="o3' . $i . '">Option C:</label><br>
			<input class="inputbox" type="text" id="o3' . $i . '" name="o3' . $i . '" placeholder="Enter option C" minlength ="2" maxlength="100" required /></br>
            <label for="o4' . $i . '">Option D:</label><br>
			<input class="inputbox" type="text" id="o4' . $i . '" name="o4' . $i . '" placeholder="Enter option D" minlength ="2" maxlength="100" required /></br>
            <label for="a' . $i . '">Correct option:</label><br>
			<input class="inputbox" type="text" id="a' . $i . '" name="a' . $i . '" placeholder="Paste the correct answer here" minlength ="2" maxlength="100" required /></br>
            <br><br> ';
            }
            ?>          
            <button type="submit" name="addqp" class="btn">Update</button>    
          </form>
        </div>
      </div>
    </div>
  </section>

<script src="../js/script.js"></script>


</body>
</html>

