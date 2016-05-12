<?php

include("_connection/config.php");

$_SESSION['open_user_list'] = null;

$query = "SELECT * FROM users WHERE user_roles='03'";

$result = mysqli_query($conn, $query);

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default" style="margin-top: 20px">
      <div class="panel-heading">
        Senarai Pengguna
        <span class="pull-right">
          <span class="btn btn-success" xaction="list_user" style="display: none">Senarai Pengguna</span>
        </span>
      </div>
      <div class="panel-body">

        <div class="scroll">

        <table class="table table-bordered open_user_list">
          <thead>
          <tr>
            <th data-field="bil" style="width: 30px">Bil</th>
            <th data-field="name" data-sortable="true">Email</th>
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

  $('[xaction="list_user"]').click(function () {

    $('.open_user_list').show();

    $('[xaction="list_user"]').hide();

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

</script>