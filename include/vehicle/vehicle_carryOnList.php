<?php

include("_connection/config.php");

$_SESSION['open_vehicle_list'] = null;

$mode = null;

if(isset($_REQUEST['mode'])){
  if($_REQUEST['mode'] == 'edit'){
    $mode = true;
  }
}

if($mode) {

  $_id = $_REQUEST['_id'];
  $query = "SELECT * FROM vehicle WHERE _id=$_id";
  $result = mysqli_fetch_assoc(mysqli_query($conn, $query));

} else {

  $query = "SELECT * FROM vehicle";
  $result = mysqli_query($conn, $query);

}

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default" style="margin-top: 20px">
      <div class="panel-heading">
        <?php if(!isset($_REQUEST['mode'])){ ?> Senarai Kenderaan
        <span class="pull-right">
          <span class="btn btn-success" xaction="add_vehicle">Tambah Kenderaan</span>
          <span class="btn btn-success" xaction="list_vehicle" style="display: none">Senarai Kenderaan</span>
        </span>
        <?php } else { echo "Kemaskini :";  } ?>
      </div>
      <div class="panel-body">

        <?php

        if(isset($_REQUEST['mode'])){

          $mode = $_REQUEST['mode'];

          if($mode = 'edit'){

            ?>

            <form class="edit_vehicle" id="edit_vehicle">

              <div class="col-sm-6 form-group">
                <label for="designation">Penjawatan</label>
                <input type="text" class="form-control" name="designation" placeholder="Pegangan" value="<?php echo $result['designation']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="carry">Pegangan</label>
                <input type="text" class="form-control" name="carry" placeholder="Pegangan" value="<?php echo $result['carry']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="type_vehicle">Jenis Kenderaan</label>
                <input type="text" class="form-control" name="type_vehicle" placeholder="Jenis Kenderaan" value="<?php echo $result['type_vehicle']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="registration_no">No Daftar</label>
                <input type="text" class="form-control" name="registration_no" placeholder="No Daftar" value="<?php echo $result['registration_no']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="date_created">Tarikh Termasuk Khidmat</label>
                <input type="text" class="form-control" name="date_created" placeholder="Tarikh Termasuk Khidmat" value="<?php echo $result['date_created']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="measure_km">Bacaan (KM)</label>
                <input type="text" class="form-control" name="measure_km" placeholder="Bacaan (KM)" value="<?php echo $result['measure_km']; ?>">
              </div>

              <div class="col-sm-6 form-group">
                <label for="price">Harga</label>
                <input type="text" class="form-control" name="price" placeholder="0" value="<?php echo $result['price']; ?>">
              </div>

              <div class="col-sm-12">
                <span class="pull-right">
                  <span class="btn btn-warning" xaction="back_to_vehicle_list">Kembali</span>
                  <input type="submit" class="btn btn-primary" value="Simpan">
                </span>
              </div>

            </form>

            <?php

          }

        } else {

          ?>

          <form class="open_create_vehicle" id="create_vehicle" style="display: none">

            <div class="col-sm-6 form-group">
              <label for="designation">Penjawatan</label>
              <input type="text" class="form-control" name="designation" placeholder="Penjawatan">
            </div>

            <div class="col-sm-6 form-group">
              <label for="carry">Pegangan</label>
              <input type="text" class="form-control" name="carry" placeholder="Pegangan">
            </div>

            <div class="col-sm-6 form-group">
              <label for="type_vehicle">Jenis Kenderaan</label>
              <input type="text" class="form-control" name="type_vehicle" placeholder="Jenis Kenderaan">
            </div>

            <div class="col-sm-6 form-group">
              <label for="registration_no">No Daftar</label>
              <input type="text" class="form-control" name="registration_no" placeholder="No Daftar">
            </div>

            <div class="col-sm-6 form-group">
              <label for="date_created">Tarikh Termasuk Khidmat</label>
              <input type="text" class="form-control" name="date_created" placeholder="Tarikh Termasuk Khidmat">
            </div>

            <div class="col-sm-6 form-group">
              <label for="measure_km">Bacaan (KM)</label>
              <input type="text" class="form-control" name="measure_km" placeholder="Bacaan (KM)">
            </div>

            <div class="col-sm-6 form-group">
              <label for="price">Harga</label>
              <input type="text" class="form-control" name="price" placeholder="0">
            </div>

            <div class="col-sm-12">
            <span class="pull-right">
              <input type="submit" class="btn btn-primary" value="Hantar">
            </span>
            </div>

          </form>

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
                <th data-field="edit" data-sortable="true">Kemaskini</th>
              </tr>
              </thead>
              <tbody>

              <?php

              $index = 1;

              while($rows = mysqli_fetch_array($result)){

                echo '
              <tr>
                <td>'.$index++.'</td>
                <td>'.$rows['designation'].'</td>
                <td>'.$rows['carry'].'</td>
                <td>'.$rows['type_vehicle'].'</td>
                <td>'.$rows['registration_no'].'</td>
                <td>'.$rows['date_created'].'</td>
                <td>'.$rows['measure_km'].'</td>
                <td>'.$rows['price'].'</td>
                <td>
                  <span class="btn btn-primary btn-xs" xedit='.$rows['_id'].'>edit</span>
                  <span class="btn btn-danger btn-xs" xremove='.$rows['_id'].'>hapus</span>
                </td>
              </tr>
             ';

              }

              ?>

              </tbody>
            </table>

          </div>

        <?php

        }

        ?>

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

  $('[xaction="add_vehicle"]').click(function () {

    $('.open_create_vehicle').show();
    $('.open_vehicle_list').hide();

    $('[xaction="list_vehicle"]').show();
    $('[xaction="add_vehicle"]').hide();

  });

  $('[xaction="list_vehicle"]').click(function () {

    $('.open_create_vehicle').hide();
    $('.open_vehicle_list').show();

    $('[xaction="list_vehicle"]').hide();
    $('[xaction="add_vehicle"]').show();

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

  $('form#create_vehicle').submit(function (e, tpl) {

    e.preventDefault();

    var $form = $(e.currentTarget);
    var form = XIO.FormData($form);

    swal({

      title: '',
      text: 'Adakah anda ingin mendaftar kenderaan ini?',
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
          url: "include/vehicle/process/register.php",
          data: form,
          success: function () {

            swal({

              title: '',
              text: 'Kenderaan Berjaya Didaftarkan',
              confirmButtonText: "Ya",
              cancelButtonText: "Tidak",
              type: 'success',
              closeOnConfirm: false

            }, function () {

              window.location = "index.php?flow=vehicle_carryOnList"

            });

          }
        });

      }

    });

    return false;

  });


  $('form#edit_vehicle').submit(function (e, tpl) {

    e.preventDefault();

    var $form = $(e.currentTarget);
    var form = XIO.FormData($form);

    swal({

      title: '',
      text: 'Adakah anda ingin menyimpan kenderaan ini?',
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

        <?php if(isset($_REQUEST['mode'])) { ?>

        _.extend(form, {
          _id: <?php echo $_REQUEST['_id']; ?>
        });

        <?php } ?>

        $.ajax({
          type: "POST",
          url: "include/vehicle/process/register.php",
          data: form,
          success: function (reason) {

            swal({

              title: '',
              text: 'Kenderaan Berjaya Disimpan',
              confirmButtonText: "Ya",
              cancelButtonText: "Tidak",
              type: 'success',
              closeOnConfirm: false

            }, function () {

              window.location = "index.php?flow=vehicle_carryOnList"

            });

          }
        });

      }

    });

    return false;

  });

  $('[xedit]').click(function(e, tpl){

    var _id = $(e.currentTarget).attr('xedit');

    window.location = "index.php?flow=vehicle_carryOnList&mode=edit&_id="+_id

  });

  $('[xaction="back_to_vehicle_list"]').click(function () {

    window.location = "index.php?flow=vehicle_carryOnList";

  })

</script>