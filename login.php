<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log Masuk Sistem</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/datepicker3.css" rel="stylesheet">
  <link href="css/styles.css" rel="stylesheet">
  <link href="css/shining.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/sweetalert.css">

  <!--[if lt IE 9]>
  <script src="js/respond.min.js"></script>
  <![endif]-->

</head>

<body style="background:#71c4ff;" class="shine-me">

<div class="row align-center" align="center">
  <span class="text-center">
    <span class="font-size-30">ALK</span><br/>
      <span class="font-size-20 clear-left">AKADEMI LATIHAN KETENTERAAN</span><br/>
        <span class="font-size-15 clear-left">( Universiti Pertahanan Nasional Malaysia )</span><br/>
          <span class="font-size-50 clear-left">SISTEM PENGURUSAN MAKLUMAT TRUP KENDERAAN</span>
  </span>
</div>

<div id="add_err" align="center"></div>

<div class="row m-t-50">
  <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
    <div class="login-panel panel panel-default">
      <div class="panel-heading">Log Masuk</div>
      <div class="panel-body">
        <form role="form" autocomplete="off" id="login">
          <fieldset>
            <div class="form-group">
              <select class="form-control" name="roles">
                <option value="00">Sila Pilih Peranan Anda...</option>
                <option value="01">Pentadbir Sistem</option>
                <option value="02">Staf</option>
                <option value="03">Pengguna</option>
              </select>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" autocomplete="off" id="email" value="" name="email"
                     placeholder="Emel">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" autocomplete="off" id="password" value="" name="password"
                     placeholder="Kata laluan">
            </div>
            <button type="submit" class="btn btn-primary">Log Masuk</button>
            <span xaction="register" class="btn btn-warning">Daftar Akaun</span>
          </fieldset>
        </form>
      </div>
    </div>
  </div><!-- /.col-->
</div><!-- /.row -->

<?php include("include/functions.php"); ?>

</body>

</html>
