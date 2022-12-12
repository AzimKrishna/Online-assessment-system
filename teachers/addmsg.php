<?php 
include('../config.php');

if (isset($_POST["addmsg"])) {
    $feedback = mysqli_real_escape_string($conn, $_POST["feedback"]);
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $sql = "INSERT INTO message (fname, feedback) VALUES ('$fname', '$feedback')";
    $result = mysqli_query($conn, $sql);
      if ($result) {
        echo "<script>alert('Message sent successfully!.');</script>";

          header("Location: messages.php");
      } else {
        echo "<script>alert('Message sent failed.');</script>";
        header("Location: messages.php.php");
    }
    }
?>