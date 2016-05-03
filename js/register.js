$("form#register").submit(function (e) {

  e.preventDefault();

  var $form = $(e.currentTarget);
  var form = XIO.FormData($form);

  _.extend(form, {
    register: true
  });

  $.ajax({
    type: "POST",
    url: "process/register.php",
    data: form,
    success: function (html) {

      console.log(html)

    }
  });

  return false;

});