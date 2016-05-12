<?php

if(PHP_SESSION_NONE){

  session_start();

  $userId = $_SESSION['session_userID'];

  if(!$userId){
    header('Location:login.php');
  }

  include("include/findOneUser.php");

}

?>

<?php

 function  rolesAllowed($user_role, $roles)
{

  foreach ((array) $roles as $role) {
    if ($role == $user_role) {
      return true;
    }
  }

}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>ALK - AKADEMI LATIHAN KETENTERAAN ( Universiti Pertahanan Nasional Malaysia )
  </title>

  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/shining.css" rel="stylesheet">
  <link href="css/sweetalert.css" rel="stylesheet">

  <!--Icons-->
  <script src="js/lumino.glyphs.js"></script>

  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->
  <script src="js/jquery-1.11.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/sweetalert.min.js"></script>

</head>

<body style="background:#71c4ff;" class="shine-me">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
        <span class="sr-only">Lihat</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><span>ALK</span> KETENTERAAN</a>
      <ul class="user-menu">
        <li class="dropdown pull-right">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <svg class="glyph stroked male-user">
              <use xlink:href="#stroked-male-user"></use>
            </svg>
            <?php echo $user_email;?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li>
              <a href="#">
                <svg class="glyph stroked male-user">
                  <use xlink:href="#stroked-male-user"></use>
                </svg>
                Profil
              </a>
            </li>
            <li>
              <a href="#" onclick="XIO.logout();">
                <svg class="glyph stroked cancel">
                  <use xlink:href="#stroked-cancel"></use>
                </svg>
                Logout
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </div>

  </div><!-- /.container-fluid -->
</nav>

<?php include("include/nav.php"); ?>

<div class="col-sm-7 col-sm-offset-1 col-lg-9 col-lg-offset-3 main">
  <div class="row">
    <ol class="breadcrumb">
      <li>
        <a href="#">
          <svg class="glyph stroked home">
            <use xlink:href="#stroked-home"></use>
          </svg>
        </a>
      </li>
      <li class="active">Utama</li>
    </ol>
  </div><!--/.row-->

  <?php

  $flow = null;

  if(isset($_REQUEST['flow'])){
    $flow = $_REQUEST['flow'];
  }

  switch($flow){

    case 'organization_list':
      include("include/organization/list.php");
      ?>

        <script>
          $('[href="#organization"]').trigger('click')
        </script>

      <?php
      break;

      case 'staff_list':
      include("include/staff/list.php");
      ?>

        <script>
          $('[href="#admin"]').trigger('click')
        </script>

      <?php
      break;

      case 'vehicle_carryOnList':
      include("include/vehicle/vehicle_carryOnList.php");
      ?>

        <script>
          $('[href="#vehicle"]').trigger('click')
        </script>

      <?php
      break;

      case 'order_vehicle_list':
      include("include/vehicle/order_vehicle_list.php");
      ?>

        <script>
          $('[href="#vehicle"]').trigger('click')
        </script>

      <?php
      break;

      case 'ordered_vehicle_list':
      include("include/vehicle/ordered_vehicle_list.php");
      ?>

        <script>
          $('[href="#vehicle"]').trigger('click')
        </script>

      <?php
      break;

      case 'ordered_vehicle_approval_list':
      include("include/vehicle/ordered_vehicle_approval_list.php");
      ?>

        <script>
          $('[href="#vehicle"]').trigger('click')
        </script>

      <?php
      break;

      case 'ordered_vehicle_approved_list':
      include("include/vehicle/ordered_vehicle_approved_list.php");
      ?>

        <script>
          $('[href="#vehicle"]').trigger('click')
        </script>

      <?php
      break;

    default:
      include("include/dashboard.php");
      ?>

    <script>
      $('[href="#organization"]').trigger('click');
      $('[href="#admin"]').trigger('click');
      $('[href="#vehicle"]').trigger('click');
    </script>

  <?php
      break;


  }

  ?>

</div>  <!--/.main-->

<?php

if(!isset($_REQUEST['flow'])){

?>

<script src="js/chart.min.js"></script>
<script src="js/chart-data.js"></script>

<?php } ?>

<script src="js/bootstrap-datepicker.js"></script>
<script src="js/bootstrap-table.js"></script>
<script src="js/functions.js"></script>
<script src="js/lodash.js"></script>
<script>

  !function ($) {
    $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
      $(this).find('em:first').toggleClass("glyphicon-minus");
    });
    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
  }(window.jQuery);

  $(window).on('resize', function () {
    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
  })
  $(window).on('resize', function () {
    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
  })
</script>
</body>

</html>
