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

});