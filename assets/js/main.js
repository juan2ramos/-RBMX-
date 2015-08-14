$(function () {

    /* Form */
    $('#form').on("submit", function (e) {
        e.preventDefault();
        var fields = $(this).serializeArray();

        $.post($(this).attr('action'), fields, responseForm, 'json');
       // $('#button').prop("disabled", true);


    });

    function responseForm(r) {

        if (!r.success) {

            alert("Revisa los campos");
            console.log(r.errors);
           // $('#button').prop("disabled", false);
        }
        else {
            alert('ss');
            $('#form').hide( "slow" );

            console.log(r.success);
          //  $('#form').append("<span class='message'>" + r.message + "<span>");
        }
    }



});


