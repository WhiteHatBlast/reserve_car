<?php

// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');

  if (isset($_POST['register'])) {

    require_once("../../../_connection/config.php");

    $designation = $_POST['designation'];
    $carry = $_POST['carry'];
    $date_created = $_POST['date_created'];
    $measure_km = $_POST['measure_km'];
    $price = $_POST['price'];
    $registration_no = $_POST['registration_no'];
    $type_vehicle = $_POST['type_vehicle'];

    if(isset($_POST['_id'])){
      $_id = $_POST['_id'];
      $publish = $_POST['publish'];

      switch($publish){

        case '1':
          $publish = true;
          break;

        case '2':
          $publish = false;
          break;

      }

      $sql = "UPDATE vehicle SET designation='".$designation."',carry='".$carry."',type_vehicle='".$type_vehicle."',registration_no='".$registration_no."',date_created='".$date_created."',measure_km='".$measure_km."',price='".$price."',publish='".$publish."' WHERE _id=$_id";
    }
    else {
      $sql = "INSERT INTO vehicle(designation,carry,type_vehicle,registration_no,date_created,measure_km,price) VALUES ('".$designation."','".$carry."','".$type_vehicle."','".$registration_no."','".$date_created."','".$measure_km."','".$price."')";
    }

    mysqli_query($conn, $sql);
    mysqli_close($conn);

  }

?>