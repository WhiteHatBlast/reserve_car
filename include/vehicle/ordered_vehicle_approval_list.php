<?php

include("_connection/config.php");

$query = "SELECT * FROM vehicle as a, tempahan as b, users as c where a._id=b.vehicle_id AND c.user_id=b.user_id";
$result = mysqli_query($conn, $query);

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default" style="margin-top: 20px">
      <div class="panel-heading">
        Senarai Kenderaan Di Tempah
      </div>
      <div class="panel-body">
        <div class="scroll">
          <table class="table table-bordered open_vehicle_list">
            <thead>
            <tr>
              <th data-field="bil" style="width: 30px">Bil</th>
              <th data-field="designation" data-sortable="true">Penjawatan</th>
              <th data-field="start_order" data-sortable="true">Tarikh Mula</th>
              <th data-field="end_order" data-sortable="true">Tarikh Akhir</th>
              <th data-field="verified" class="width-140 text-center" data-sortable="true">Pengesahan</th>
              <th data-field="approved" class="width-140 text-center" data-sortable="true">Status</th>
              <th data-field="approval" class="width-140 text-center" data-sortable="true">Tindakan</th>
            </tr>
            </thead>
            <tbody>

            <?php

            $index = 1;

            while ($rows = mysqli_fetch_array($result)) {

              echo '
              <tr class="" xorder="' . $rows['_id'] . '">
                <td>' . $index++ . '</td>
                <td>' . $rows['designation'] . '</td>
                <td>' . $rows['start_order'] . '</td>
                <td>' . $rows['end_order'] . '</td>
                <td class="text-center">';
              if ($rows['status_verified'] == 0) {
                echo "Belum Sah";
              } else {
                echo "Disahkan";
              }
              echo '</td><td class="text-center">';
              if ($rows['approved'] == 0) {
                echo "Belum Diterima";
              } else {
                echo "Diterima";
              }
              echo '</td><td class="text-center"><span xapproval="' . $rows['_id'] . '" class="btn btn-primary btn-sm">Sahkan</span></td></tr>
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

<script type="text/javascript">

  $('[xapproval]').click(function (e, tpl) {

    var _id = $(e.currentTarget).attr('xapproval');

    swal({
      title: "",
      text: "Adakah anda ingin mengesahkan tempahan ini?",
      type: "input",
      confirmButtonText: 'Ya',
      cancelButtonText: 'Tidak',
      showCancelButton: true,
      closeOnConfirm: false,
      animation: "slide-from-top",
      inputPlaceholder: "Sila masukkan message anda"
    }, function (message) {
      if (message === false) return false;
      if (message === "") {
        swal.showInputError("Sila masukkan message anda");
        return false
      }

      $.ajax({
        type: "POST",
        url: "include/vehicle/process/approval.php",
        data: {_id: _id, approval: true, message: message},
        success: function (reason) {

          swal({

            title: '',
            text: 'Tempahan Berjaya disahkan',
            confirmButtonText: "Ya",
            type: 'success',
            closeOnConfirm: false

          }, function () {

            switch (reason) {

              case '1':
                window.location = "index.php?flow=ordered_vehicle_approval_list";
                break;

            }

          });

        }
      })

    });


  });
  
</script>