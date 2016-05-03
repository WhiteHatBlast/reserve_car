<?php

include("_connection/config.php");

$sql = "SELECT * FROM users WHERE user_id=$userId";

if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

  $run_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));
  $user_email = $run_user['user_email'];
  $user_roles = $run_user['user_roles'];

}

mysqli_close($conn);
?>