<?php

if (isset($_POST['_id'])) {

  require_once("../../../_connection/config.php");

  $_id = $_POST['_id'];
  $sql = "UPDATE tempahan SET revoke_order=TRUE WHERE _id=$_id";
  mysqli_query($conn, $sql);
  mysqli_close($conn);

  echo 1;

}

?>