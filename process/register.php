<?php

  if(isset($_POST['register'])){

    require_once("../_connection/config.php");

    $sql = "INSERT INTO users (user_email, user_password, user_roles) VALUES ('".$_POST["email"]."', '".md5($_POST["password"])."', '03')";

    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);

  }

?>