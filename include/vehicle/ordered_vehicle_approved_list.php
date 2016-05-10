<?php

include("_connection/config.php");

$query = "SELECT * FROM vehicle as a, tempahan as b, users as c where a._id=b.vehicle_id AND c.user_id=b.user_id AND approved=TRUE";
$result = mysqli_query($conn, $query);

?>

<?php

if(isset($_REQUEST['_id'])){

  $_id = $_REQUEST['_id'];

  $query = "SELECT * FROM tempahan WHERE _id=$_id";
  $row = mysqli_fetch_assoc(mysqli_query($conn, $query));

  $key_personID = $row['userID_verified'];
  $query2 = "SELECT * FROM users WHERE user_id=$key_personID";
  $key_person = mysqli_fetch_assoc(mysqli_query($conn, $query2));

  $query3 = "SELECT * FROM vehicle WHERE _id='".$row['vehicle_id']."'";
  $car = mysqli_fetch_assoc(mysqli_query($conn, $query3));

  ?>

  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default" style="margin-top: 20px">
        <div class="panel-heading">
          Tempah Kenderaan :
        </div>
        <div class="panel-body">

          <div class="row">

            <div class="col-md-6 form-group">
              <label>Email</label>
              <p><?=$key_person['user_email'];?></p>
            </div>

            <div class="col-md-6 form-group">
              <label>Maklumat</label>
              <p><?=$row['note'];?></p>
            </div>

            <div class="col-md-6 form-group">
              <label>Penjawatan</label>
              <p><?=$car['designation'];?></p>
            </div>

            <div class="col-md-6 form-group">
              <label>Pegangan</label>
              <p><?=$car['carry'];?></p>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <?php

} else {

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default" style="margin-top: 20px">
      <div class="panel-heading">
        Senarai Tempahan Kenderaan Diterima
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
              <tr class="cursor-cyan" xview="' . $rows['_id'] . '">
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
              echo '</td></tr>
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

  $('[xview]').click(function(e, tpl){

    var _id = $(e.currentTarget).attr('xview');

    window.location = "index.php?flow=ordered_vehicle_approved_list&_id="+_id;

  })

</script>