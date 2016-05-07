<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Senarai Staf</h1>
  </div>
</div><!--/.row-->

<?php

$_SESSION['open_staff_list'] = null;

?>

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        Senarai Staf
        <span class="pull-right">
          <span class="btn btn-success" xaction="add_staff">Tambah Staf</span>
          <span class="btn btn-success" xaction="list_staff" style="display: none">Senarai Staf</span>
        </span>
      </div>
      <div class="panel-body">

        <form class="open_create_staff" style="display: none">

          <div class="col-sm-6 form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
          </div>
          <div class="col-sm-6 form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="col-sm-12">
            <span class="pull-right">
              <input type="submit" class="btn btn-primary" value="Hantar">
            </span>
          </div>

        </form>

        <table class="table table-bordered open_staff_list">
          <thead>
          <tr>
            <th data-field="state">Bil</th>
            <th data-field="id" data-sortable="true">Nama</th>
          </tr>
          </thead>
        </table>

      </div>
    </div>
  </div>
</div>

<script>

  $('[xaction="add_staff"]').click(function(){

    $('.open_create_staff').show();
    $('.open_staff_list').hide();

    $('[xaction="list_staff"]').show();
    $('[xaction="add_staff"]').hide();

  });

  $('[xaction="list_staff"]').click(function(){

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
</script>