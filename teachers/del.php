<?php 
include('../config.php');

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM student WHERE id='$id' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        header('Location: records.php'); 
    }
    else
    {
        echo "<script>alert('Your Data is NOT DELETED');</script>";      
        header('Location: records.php'); 
    }   
}
?>