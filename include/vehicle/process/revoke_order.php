<?php

if (isset($_POST['_id'])) {

  require_once("../../../_connection/config.php");

  $_id = $_POST['_id'];
  $sql = "DELETE FROM vehicle WHERE _id=$_id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo 1;

}

?>