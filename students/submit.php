<?php
session_start();
if (!isset($_POST["exid"])){
	header("Location: dash.php");
}

include '../config.php';
$j=0;
if (isset($_POST["exid"])) {
	$nq = mysqli_real_escape_string($conn, $_POST["nq"]);
    $exid = mysqli_real_escape_string($conn, $_POST["exid"]);
	$uname = mysqli_real_escape_string($conn,$_SESSION["uname"]);
    

    for($i=1; $i<=$nq; $i++){
        $qid = mysqli_real_escape_string($conn, $_POST['qid' . $i]);
        $op = mysqli_real_escape_string($conn, $_POST['o' . $i]);
        $sql="SELECT * FROM qstn_list WHERE exid='$exid' AND qid='$qid'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            $ans=$row['qstn_ans'];
            if($ans==$op){
             $j=$j+1;
             $result = NULL;
            }
        }
    }
    $ptg=($j/$nq)*100;$st=1;
    $sql="INSERT INTO atmpt_list (exid, uname, nq, cnq, ptg, status) VALUES ('$exid', '$uname', '$nq', '$j', '$ptg', '$st')";
    $result = mysqli_query($conn, $sql);
	header("Location: results.php");
  }

?>