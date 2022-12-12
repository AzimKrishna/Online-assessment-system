<?php 
include('../config.php');

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM exm_list WHERE exid='$id' ";
    $query_run = mysqli_query($conn, $query);

    $exid=$_POST['exid'];
    $query = "DELETE FROM qstn_list WHERE exid='$id' ";
    $query_run = mysqli_query($conn, $query);

    $query = "DELETE FROM atmpt_list WHERE exid='$id' ";
    $query_run = mysqli_query($conn, $query);
    
    if($query_run)
    {
        header('Location: exams.php'); 
    }
    else
    {
        echo "<script>alert('Your Data is NOT DELETED');</script>";      
        header('Location: exams.php'); 
    }   


}
?>