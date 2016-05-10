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
            </tr>
            </thead>
            <tbody>

            <?php

            $index = 1;

            while ($rows = mysqli_fetch_array($result)) {

              echo '
              <tr class="cursor-cyan" xorder="' . $rows['_id'] . '">
                <td>' . $index++ . '</td>
                <td>' . $rows['designation'] . '</td>
                <td>' . $rows['start_order'] . '</td>
                <td>' . $rows['end_order'] . '</td>
                <td class="text-center">';
                if($rows['status_verified'] == 0){
                  echo "Belum Sah";
                } else {
                  echo "Disahkan";
                }
              echo '</td><td class="text-center">';
                if($rows['approved'] == 0){
                  echo "Belum Diterima";
                } else {
                  echo "Diterima";
                }
              echo '</td>
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