<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Utama</h1>
  </div>
</div><!--/.row-->

<?php

include("_connection/config.php");

if(rolesAllowed($user_roles, [01,02])){

  $query = "SELECT * FROM tempahan";
  $row = mysqli_num_rows(mysqli_query($conn, $query));

}

if(rolesAllowed($user_roles, [03])){

  $userId = $_SESSION['session_userID'];

  $query = "SELECT * FROM tempahan WHERE user_id=$userId";
  $row = mysqli_num_rows(mysqli_query($conn, $query));

}

?>

<div class="row">
  <div class="col-xs-12 col-md-6 col-lg-4">
    <div class="panel panel-blue panel-widget ">
      <div class="row no-padding">
        <div class="col-sm-3 col-lg-3 widget-left">
          <svg class="glyph stroked bag">
            <use xlink:href="#stroked-bag"></use>
          </svg>
        </div>
        <div class="col-sm-9 col-lg-7 widget-right">
          <div class="large"><?=$row;?></div>
          <div class="text-muted">Tempah Kenderaan</div>
        </div>
      </div>
    </div>
  </div>
</div><!--/.row-->