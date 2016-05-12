<?php

include("_connection/config.php");

$query = "SELECT * FROM vehicle WHERE publish=true";
$result = mysqli_query($conn, $query);

?>

<?php

if (isset($_REQUEST['mode'])) {

  $_id = $_REQUEST['_id'];

  $query = "SELECT * FROM vehicle WHERE publish=true AND _id=$_id";
  $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

  ?>


  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default" style="margin-top: 20px">
        <div class="panel-heading">
          Tempah Kenderaan :
        </div>
        <div class="panel-body">

          <div class="row">

            <form id="order_vehicle">

              <div class="col-md-6 form-group">
                <label for="date_created">Tempah dari :</label>
                <div class="input-group date" data-provide="datepicker">
                  <input type="text" name="start_order" class="form-control" value="">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-6 form-group">
                <label for="date_created">Tempah Hingga :</label>
                <div class="input-group date" data-provide="datepicker">
                  <input type="text" name="end_order" class="form-control" value="">
                  <div class="input-group-addon">
                    <span class="glyphicon glyphicon-th"></span>
                  </div>
                </div>
              </div>

              <div class="col-md-12 form-group">
                <label for="note">Catatan</label>
                <textarea name="note" class="form-control" rows="7"></textarea>
              </div>

              <div class="col-sm-12">
              <span class="pull-right">
                <span class="btn btn-warning" xaction="back_to_vehicle_list">Kembali</span>
                <input type="submit" class="btn btn-primary" value="Simpan">
              </span>
              </div>

            </form>

          </div>

        </div>
      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default" style="margin-top: 20px">
        <div class="panel-heading">
          Tempahan Dibuka
        </div>
        <div class="panel-body">
          <div class="scroll">
            <table class="table table-bordered open_vehicle_list">
              <thead>
              <tr>
                <th data-field="bil" style="width: 30px">Bil</th>
                <th data-field="designation" data-sortable="true">Penjawatan</th>
                <th data-field="carry" data-sortable="true">Pegangan</th>
                <th data-field="type_vehicle" data-sortable="true">Jenis Kenderaan</th>
                <th data-field="registration_no" data-sortable="true">No Daftar</th>
                <th data-field="date_created" data-sortable="true">Tarikh Termasuk Khidmat</th>
                <th data-field="measure_km" data-sortable="true">Bacaan (KM)</th>
                <th data-field="price" data-sortable="true">Harga</th>
                <th data-field="price" data-sortable="true" class="text-center">Tindakan</th>
              </tr>
              </thead>
              <tbody>

              <?php

              $index = 1;

              while ($rows = mysqli_fetch_array($result)) {

                echo '
              <tr class="cursor-cyan">
                <td xorder="' . $rows['_id'] . '">' . $index++ . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['designation'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['carry'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['type_vehicle'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['registration_no'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['date_created'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['measure_km'] . '</td>
                <td xorder="' . $rows['_id'] . '">' . $rows['price'] . '</td>
              </tr>
             ';

              }

              ?>

              <?php if (mysqli_num_rows($result) == 0) { ?>

                <tr>
                  <td colspan="9">Tiada data untuk dipaparkan</td>
                </tr>

              <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<script type="text/javascript">

  $('[xorder]').click(function (e, tpl) {

    var _id = $(e.currentTarget).attr('xorder');

    window.location = "index.php?flow=order_vehicle_list&mode=order&_id=" + _id

  });

  $('[xaction=back_to_vehicle_list]').click(function(){

    window.location = "index.php?flow=order_vehicle_list"

  });

  $('form#order_vehicle').submit(function(e, tpl){

    e.preventDefault();

    var $form = $(e.currentTarget);
    var form = XIO.FormData($form);

    _.extend(form, {
      order: true
    });

    <?php

      if(isset($_REQUEST['_id'])){
        $vehicle_id = $_REQUEST['_id'];
        $user_id = $_SESSION['session_userID'];
        ?>

        _.extend(form, {

          vehicle_id: <?php echo $vehicle_id; ?>,
          user_id: <?php echo $user_id; ?>

        });

        <?php
      }

    ?>

    swal({

      title: '',
      text: 'Adakah anda ingin menempah kenderaan ini?',
      showCancelButton: true,
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      type: 'warning',
      closeOnConfirm: false,
      closeOnCancel: true

    }, function (isConfirm) {

      if (isConfirm) {

        $.ajax({
          type: "POST",
          url: "include/vehicle/process/order.php",
          data: form,
          success: function (reason) {

            swal({

              title: '',
              text: 'Tempahan Kenderaan Berjaya Dihantar',
              confirmButtonText: "Ya",
              cancelButtonText: "Tidak",
              type: 'success',
              closeOnConfirm: false

            }, function () {

              switch (reason) {

                case '1':
                  window.location = "index.php?flow=ordered_vehicle_list";
                  break;

              }

            });

          }

        });

      }
    });

  })
</script>