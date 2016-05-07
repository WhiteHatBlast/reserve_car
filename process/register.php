<?php

  if(isset($_POST['register'])){

    require_once("../_connection/config.php");

    $roles = '03';

    if(isset($_POST['roles'])){

      $roles = $_POST['roles'];

    }

    $checkQuery = "SELECT * FROM users WHERE user_email='".$_POST["email"]."' AND user_roles='".$roles."'";

    if(mysqli_num_rows(mysqli_query($conn, $checkQuery)) > 0){

      echo 0;

    } else {

      $sql = "INSERT INTO users (user_email, user_password, user_roles) VALUES ('".$_POST["email"]."', '".md5($_POST["password"])."', '".$roles."')";

      if (mysqli_query($conn, $sql)) {
        echo 1;
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }

    }

    mysqli_close($conn);

  }

?>