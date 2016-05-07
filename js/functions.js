var XIO = undefined;

$(document).ready(function () {

  XIO = {};

  XIO.FormData = function ($form) {

    return _($form.serializeArray()).reduce(function (acc, field) {

      if (!/^__[a-z]./.test(field.name)) {
        acc[field.name] = field.value;
      }

      return acc;

    }, {});

  };

  XIO.logout = function(){

    $.ajax({
      type: "POST",
      url: "process/logout.php",
      success: function () {
        window.location = "login.php"
      }
    });

  }

  // Change the selector if needed
  var $table = $('table.scroll'),
    $bodyCells = $table.find('tbody tr:first').children(),
    colWidth;

// Adjust the width of thead cells when window resizes
  $(window).resize(function() {
    // Get the tbody columns width array
    colWidth = $bodyCells.map(function() {
      return $(this).width();
    }).get();

    // Set the width of thead columns
    $table.find('thead tr').children().each(function(i, v) {
      $(v).width(colWidth[i]);
    });
  }).resize(); // Trigger resize handler

});