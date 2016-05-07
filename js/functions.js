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

});