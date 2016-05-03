<div class="row">
  <div class="col-lg-12">
    <h1 class="page-header">Senarai Staf</h1>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-xs-12">
    <div class="panel panel-default">
      <div class="panel-heading">Styled Table</div>
      <div class="panel-body">
        <table data-toggle="table" data-url="tables/data1.json"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
          <thead>
          <tr>
            <th data-field="state" data-checkbox="true" >Item ID</th>
            <th data-field="id" data-sortable="true">Item ID</th>
            <th data-field="name"  data-sortable="true">Item Name</th>
            <th data-field="price" data-sortable="true">Item Price</th>
          </tr>
          </thead>
        </table>
        <script>
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
      </div>
    </div>
  </div>
</div>