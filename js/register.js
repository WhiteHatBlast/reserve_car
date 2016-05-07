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
    success: function (reason) {

      if(reason == 0){

        swal('', 'Maklumat Anda Telah Wujud', 'error')

      } else {

        swal('', 'Maklumat Anda Berjaya Didaftarkan', 'success')

      }

    }
  });

  return false;

});