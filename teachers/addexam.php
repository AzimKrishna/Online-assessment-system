<?php 
include('../config.php');

//Below code to add exam details

if (isset($_POST["addexm"])) {
    $exname = mysqli_real_escape_string($conn, $_POST["exname"]);
    $nq = mysqli_real_escape_string($conn, $_POST["nq"]);
    $desp = mysqli_real_escape_string($conn, $_POST["desp"]);
    $subt = mysqli_real_escape_string($conn, $_POST["subt"]);
    $extime = mysqli_real_escape_string($conn, $_POST["extime"]);
    $subject = mysqli_real_escape_string($conn, $_POST["subject"]);
      $sql = "INSERT INTO exm_list (exname, nq, desp, subt, extime, subject) VALUES ('$exname', '$nq', '$desp', '$subt', '$extime', '$subject')";
      $result = mysqli_query($conn, $sql);
      if ($result) {
          header("Location: exams.php");
      } else {
        echo "<script>alert('Adding exam failed.');</script>";
        header("Location: exams.php");
    }
    }

// ********************************************

//Below code to add question to database

if (isset($_POST["addqp"])) {
    $nq = mysqli_real_escape_string($conn, $_POST["nq"]);
    $exid = mysqli_real_escape_string($conn, $_POST["exid"]);
    for($i=1; $i<=$nq; $i++){
        $q = mysqli_real_escape_string($conn, $_POST['q' . $i]);
        $o1 = mysqli_real_escape_string($conn, $_POST['o1' . $i]);
        $o2 = mysqli_real_escape_string($conn, $_POST['o2' . $i]);
        $o3 = mysqli_real_escape_string($conn, $_POST['o3' . $i]);
        $o4 = mysqli_real_escape_string($conn, $_POST['o4' . $i]);
        $a = mysqli_real_escape_string($conn, $_POST['a' . $i]);
        $sql = "INSERT INTO qstn_list (exid, qstn, qstn_o1, qstn_o2, qstn_o3, qstn_o4, qstn_ans, sno) VALUES ('$exid', '$q', '$o1', '$o2', '$o3', '$o4', '$a', '$i')";
        $result = mysqli_query($conn, $sql);
    }   
      if ($result) {
          header("Location: exams.php");
      } else {
        echo "<script>alert('Updating questions failed.');</script>";
        header("Location: exams.php");
    }
    }

// ********************************************



?>