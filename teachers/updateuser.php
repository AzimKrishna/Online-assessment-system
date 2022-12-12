<?php
include('../config.php');
session_start();
if(isset($_POST['updatebtn']))
{   
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $dob = mysqli_real_escape_string($conn, $_POST["dob"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $sql = "UPDATE student SET fname='$fname', dob ='$dob', gender='$gender', email ='$email' WHERE id='$id' ";
    $query_run = mysqli_query($conn, $sql);
    if ($query_run) {
              echo "<script>alert('Profile details updated!.');</script>";
    
               header("Location: records.php");
        } else {
            echo "<script>alert('Updation failed.');</script>";
             header("Location: records.php");
        }

    // $check_user = mysqli_num_rows(mysqli_query($conn, "SELECT uname FROM student WHERE uname='$uname'"));
  
    // if ($check_user > 0) {
    //   echo "<script>alert('Username already exists in the database.');</script>";
    //   header("Location: records.php");
    // } else {
    //     $sql = "UPDATE student SET uname='$uname', fname='$fname', dob ='$dob', gender='$gender', email ='$email' WHERE id='$id' ";
    //     $query_run = mysqli_query($conn, $sql);
    
    //   if ($query_run) {
    //      echo "<script>alert('Student registration success!.');</script>";

    //       header("Location: records.php");
    //   } else {
    //     echo "<script>alert('Student registration failed.');</script>";
    //     header("Location: records.php");
    // }
    // }
}

?>