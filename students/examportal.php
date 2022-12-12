<?php 
date_default_timezone_set('Asia/Kolkata');
session_start();
if (!isset($_SESSION["uname"])){
	header("Location: ../login_student.php");
}

include '../config.php';
error_reporting(0);
$exid=$_POST['exid'];

if(!isset($_POST["edit_btn"])){
  header("Location: exams.php");
}

if (isset($_POST["edit_btn"])) {
  $sql="SELECT * FROM exm_list WHERE exid='$exid'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $ogtime=$row['extime'];
  $subt=$row['subt'];
  $cmtime = date("Y-m-d H:i:s"); 

  $letters=array('-', ' ', ':');
  $ogtime=str_replace($letters,'', $ogtime);
  $cmtime=str_replace($letters,'', $cmtime);
  if($ogtime > $cmtime){
    header("Location: exams.php");
  }
  if($cmtime > $subt)
  {
    echo "<script>st();</script>";
  }

}



$sql="SELECT qid, qstn, qstn_o1, qstn_o2, qstn_o3, qstn_o4 FROM qstn_list WHERE exid='$exid'";
$result = mysqli_query($conn, $sql);

$details="SELECT * FROM exm_list WHERE exid='$exid'";
$res = mysqli_query($conn, $details);
while ($rowd = mysqli_fetch_array($res)) {
  $nq = $rowd['nq'];
  $exname = $rowd['exname'];
  $desp = $rowd['desp'];
}


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Exams</title>
    <link rel="stylesheet" href="css/dash.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <?php
           $td=$subt;
         ?>
         <script type="text/javascript">
           function st(){
            document.getElementById("form1").submit();
           }
          //set the date we are counting down to 
          var count_id = "<?php echo $td; ?>"; 
          var countDownDate = new Date(count_id).getTime(); 
          //Update the count down every 1 second 
          var x = setInterval(function(){ 
          //Get today's date and time 
          var now = new Date().getTime(); 
         //Fir thn dist2nr 'nnn now and the count down date 
          var distance = countDownDate - now; 
         //Ti ilculations fr k-rt—s,minutes and seconds 
          var days = Math.floor(distance/(1000*60*60*24)); 
          var hours = Math.floor((distance%(1000*60*60*24))/(1000*60*60)); 
          var minutes = Math.floor((distance%(1000*60*60))/(1000*60)); 
          var seconds = Math.floor((distance%(1000*60))/1000);
          document.getElementById("time").innerHTML ="Timer: " + hours + "h " + minutes + "m " + seconds + "s";
           if(distance<0){
             clearInterval(x);
              document.getElementById("form1").submit();
           }
          },1000);
         </script>
    
    
    </head>
<body>
  <div class="sidebar active">
    <div class="logo-details">
      <i class='bx bx-diamond'></i>
      <span class="logo_name">Welcome</span>
    </div>
      <ul class="nav-links">
        <li>
          <a>
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
          <a>
          <i class='bx bxs-bar-chart-alt-2'></i>
            <span class="links_name">Results</span>
          </a>
        </li>
        <li>
          <a>
            <i class='bx bx-message' ></i>
            <span class="links_name">Messages</span>
          </a>
        </li>
        <li>
          <a>
            <i class='bx bx-cog' ></i>
            <span class="links_name">Settings</span>
          </a>
        </li>
        <li>
          <a>
            <i class='bx bx-help-circle' ></i>
            <span class="links_name">Help</span>
          </a>
        </li>
        <li class="log_out">
         <a>
            <i class='bx bx-log-out-circle' ></i>
            <span class="links_name">Log out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu-alt-right sidebarBtn'></i>
        <span class="dashboard">Student Dashboard</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="stat-boxes">
      <div class="recent-stat box">
          <div><h3>Exam name: <?php echo $exname ?><?php echo'
          <p id="time"style="float:right"></p>'; ?></h3>
         </div>
          <span style="font-size: 17px;">Description: <?php echo $desp ?></span>
          <br><br><br>
            <form action="submit.php" id="form1" method="post">
            <div class="radio-container">
            <?php 
            
            if(mysqli_num_rows($result) > 0)        
            {  
            $i=1;
            while($row = mysqli_fetch_assoc($result))
            {
              echo'
              
              <input type="hidden" name="qid' . $i . '" value="' . $row['qid'] . '">
              <span><b> Q'. $i .'. ' . $row['qstn'] . '</b></span><br><br>
              
              <input type="radio" id="o1' . $i . '" name="o' . $i . '" value="' . $row['qstn_o1'] . '" />
              <label class="lbl" for="o1' . $i . '">' . $row['qstn_o1'] . '</label><br>
  
              <input type="radio" id="o2' . $i . '" name="o' . $i . '" value="' . $row['qstn_o2'] . '" />
              <label class="lbl" for="o2' . $i . '">' . $row['qstn_o2'] . '</label><br>
  
              <input type="radio" id="o3' . $i . '" name="o' . $i . '" value="' . $row['qstn_o3'] . '" />
              <label class="lbl" for="o3' . $i . '">' . $row['qstn_o3'] . '</label><br>
  
              <input type="radio" id="o4' . $i . '" name="o' . $i . '" value="' . $row['qstn_o4'] . '" />
              <label class="lbl" for="o4' . $i . '">' . $row['qstn_o4'] . '</label><br>
              
              
              <br><br> ';
            $i++;
            }
            }
            ?>  
            </div>
            <input type="hidden" name="exid" value="<?php echo $exid ?>">
            <input type="hidden" name="nq" value="<?php echo $nq ?>">
            <button type="reset" class="rbtn">Reset all</button>   
            <br><br>
            <input type="submit" name="ans_sub" value="Submit" class="btn" />
            <!-- <button type="submit" name="ans_sub" class="btn">Submit</button>     -->
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
    var inputs=document.querySelectorAll("input[type=radio]:checked"),
        x=inputs.length;
    document.querySelector("button[type=reset]").addEventListener("click",function(event){
        while(x--)inputs[x].checked=0;
        event.preventDefault();
    },0);
  </script>
</body>
</html>

