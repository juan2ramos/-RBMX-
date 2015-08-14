$(function () {
    var $erros = $('.content-p'),
        $file = $('#file'),
        fileName;
    /* Form */
    $('#form').on("submit", function (e) {
        e.preventDefault();


        var fields = $(this).serializeArray();

        $.post($(this).attr('action'), fields, responseForm, 'json');

    });

    function responseForm(r) {

        if (!r.success) {

            $erros.html(r.errors);
            $('.content-error').addClass('show');
            console.log(r.errors);
        }
        else {

            $('#form').slideUp("slow");
        }
    }

    $('.close').on('click', function () {
        $('.content-error').removeClass('show');
    });


    $file.on('change', function () {
        $('.spinner').addClass('show');
        if (this.files[0].size < 2400000) {
            fileName = this.files[0].name;
            uploadImage(this.files[0]);

        } else {
            alert("El tamaño de la imagen debe ser inferior a 2MB");
        }

    });
    function uploadImage(file) {
        var reader = new FileReader(file);

        reader.readAsDataURL(file);

        reader.onload = function (e) {
            var data = e.target.result;
            switch (file.type) {

                case "image/png":
                    saveImage(file);
                    break;
                case "image/jpeg":
                    saveImage(file);
                    break;
                case "application/pdf":
                    saveImage(file);
                    break;
                case "application/vnd.openxmlformats-officedocument.wordprocessingml.document":
                    saveImage(file);
                    break;
                default:
                    alert("el archivo no es soportado");
                    throw new Error('Invalid action.');
                    break;
            }
        };

    }
    function saveImage(file) {
        var form = document.querySelector('form'),
            request= new XMLHttpRequest(),
            x,
            baseUrl = $('body').data('url');

        var formdata= new FormData(form);
        formdata.append('file_name',file)
        request.open('post', baseUrl + 'uploadImage');
        request.send(formdata);

        x=request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request)
                var myArr = JSON.parse(request.responseText);
                successImage(myArr);
            }
        }

    }
    function successImage(myArr){
        $('.spinner').removeClass('show');
        $('#urlImage').val(myArr.name);
        $('.fileUp').text('Archivo: ' + fileName);

    }

    $file.on('dragover', function () {

        $('.fileUp').addClass('hoverFile');

    });
    $file.on('dragleave', removeElement);
    $file.on('drop', removeElement);

    function removeElement() {
        $('.fileUp').removeClass('hoverFile');
    }
});