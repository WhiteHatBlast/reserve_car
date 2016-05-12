<?php

include("_connection/config.php");

$_SESSION['open_staff_list'] = null;

$query = "SELECT * FROM users WHERE user_roles='02' OR user_roles='01'";

$result = mysqli_query($conn, $query);

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default" style="margin-top: 20px">
      <div class="panel-heading">
        Senarai Staf
        <span class="pull-right">
          <span class="btn btn-success" xaction="add_staff">Tambah Staf</span>
          <span class="btn btn-success" xaction="list_staff" style="display: none">Senarai Staf</span>
        </span>
      </div>
      <div class="panel-body">

        <form class="open_create_staff" id="create_staff" style="display: none">

          <div class="col-sm-6 form-group">
            <label>Peranan</label>
            <select class="form-control" name="roles">
              <option value="00">Sila Pilih Peranan Anda...</option>
              <option value="01">Pentadbir Sistem</option>
              <option value="02">Staf</option>
            </select>
          </div>

          <div class="open_form" style="display: none;">

            <div class="col-sm-6 form-group" style="clear:left">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="email" placeholder="Enter email">
            </div>

            <div class="col-sm-6 form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="password" placeholder="Password">
            </div>

            <div class="col-sm-12">
              <span class="pull-right">
                <input type="submit" class="btn btn-primary" value="Hantar">
              </span>
            </div>

          </div>

        </form>

        <div class="scroll">

        <table class="table table-bordered open_staff_list">
          <thead>
          <tr>
            <th data-field="bil" style="width: 30px">Bil</th>
            <th data-field="name" data-sortable="true">Nama</th>
          </tr>
          </thead>
          <tbody>

          <?php

          $index = 1;

          while($rows = mysqli_fetch_array($result)){

            echo '
              <tr>
                <td>'.$index++.'</td>
                <td>'.$rows['user_email'].'</td>
              </tr>
             ';

          }

          ?>

          </tbody>
        </table>

        </div>

      </div>
    </div>
  </div>
</div>

<script>

  $('[name="roles"]').change(function (e) {

    var value = e.currentTarget.value;

    $('.open_form').css('display', 'none');

    if (value && value !== '00') {

      $('.open_form').css('display', 'block');

    }

  });

  $('[xaction="add_staff"]').click(function () {

    $('.open_create_staff').show();
    $('.open_staff_list').hide();

    $('[xaction="list_staff"]').show();
    $('[xaction="add_staff"]').hide();

  });

  $('[xaction="list_staff"]').click(function () {

    $('.open_create_staff').hide();
    $('.open_staff_list').show();

    $('[xaction="list_staff"]').hide();
    $('[xaction="add_staff"]').show();

  });

  $(function () {
    $('#hover, #striped, #condensed').click(function () {
      var classes = 'table';

      if ($('#hover').prop('checked')) {
        classes += ' table-hover';
      }
      if ($('#condensed').prop('checked')) {
        classes += ' table-condensed';
      }
      $('#table-style').bootstrapTable('destroy')
          .bootstrapTable({
            classes: classes,
            striped: $('#striped').prop('checked')
          });
    });
  });

  function rowStyle(row, index) {
    var classes = ['active', 'success', 'info', 'warning', 'danger'];

    if (index % 2 === 0 && index / 2 < classes.length) {
      return {
        classes: classes[index / 2]
      };
    }
    return {};
  }

  $('form#create_staff').submit(function (e, tpl) {

    e.preventDefault();

    var $form = $(e.currentTarget);
    var form = XIO.FormData($form);

    swal({

      title: '',
      text: 'Adakah anda ingin mendaftar kakitangan ingin?',
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      type: 'warning',
      closeOnConfirm: false,
      closeOnCancel: true

    }, function (isConfirm) {

      if (isConfirm) {

        _.extend(form, {
          register: true
        });

        $.ajax({
          type: "POST",
          url: "process/register.php",
          data: form,
          success: function (reason) {

            if(reason == 0){

              swal('', 'Kakitangan Telah Wujud', 'error')

            } else {

              swal({

                title: '',
                text: 'Kakitangan Berjaya Didaftarkan',
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                type: 'success',
                closeOnConfirm: false

              }, function (isConfirm) {

                window.location = "index.php?flow=staff_list"

              });

            }

          }
        });

      }

    });

    return false;

  })

</script>