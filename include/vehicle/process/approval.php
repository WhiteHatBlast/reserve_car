<?php

if (isset($_POST['approval'])) {

  session_start();
  require_once("../../../_connection/config.php");

  $_id = $_POST['_id'];
  $message = $_POST['message'];
  $userId = $_SESSION['session_userID'];
  $date = date('d/m/Y');

  $sql = "UPDATE tempahan SET userID_verified=$userId, status_verified=TRUE,date_verified='".$date."',approved=TRUE, message='".$message."' WHERE _id=$_id";

  if (mysqli_query($conn, $sql)) {
    echo 1;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

}

?>