$("form#login").submit(function (e) {

  e.preventDefault();

  var $form = $(e.currentTarget);
  var form = XIO.FormData($form);

  $.ajax({
    type: "POST",
    url: "process/login.php",
    data: form,
    success: function (html) {

      if (html == true) {

        swal(
          {
            title: '',
            type: 'success',
            text: "Log Masuk Berjaya"
          }, function(confirm){

            if(confirm){

              window.location = "index.php";

            }

        });

      }
      else {
        swal('', 'Nama pengguna / Kata laluan Salah', 'warning')
      }
    }
  });

  return false;

});

$('[xaction="register"]').click(function (e, tpl) {

  window.location = "register.php"

});