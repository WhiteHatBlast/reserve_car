<?php

if (isset($_POST['order'])) {

  require_once("../../../_connection/config.php");

  $sql = "INSERT INTO tempahan (vehicle_id, user_id, start_order, end_order, note) VALUES ('".$_POST["vehicle_id"]."','".$_POST["user_id"]."','".$_POST["start_order"]."','".$_POST["end_order"]."','".$_POST["note"]."')";

  if (mysqli_query($conn, $sql)) {
    echo 1;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

}

?>