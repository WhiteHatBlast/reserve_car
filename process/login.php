<?php

if(isset($_POST['email']) && isset($_POST['password'])){

  require_once("../_connection/config.php");
  session_start();

  $sql = "SELECT user_id,user_email,user_roles FROM users WHERE user_email='".$_POST["email"]."' AND user_password='".md5($_POST["password"])."' AND user_roles='".$_POST["roles"]."'";

  if (mysqli_num_rows(mysqli_query($conn, $sql)) > 0) {

    $run_user = mysqli_fetch_assoc(mysqli_query($conn, $sql));

    $_SESSION['session_userID'] = $run_user['user_id'];

    echo true;
  } else {
    echo false;
  }

  mysqli_close($conn);

}

?>