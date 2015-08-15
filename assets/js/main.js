var filesForm = {
    'team': 'Equipo',
    'city': 'Ciudad ',
    'url_image': 'Imagen ',
    'name-user': 'Nombre ',
    'last-name': 'Apellido ',
    'birthday': 'Cumpleaños',
    'email': 'email',
    'phone': 'Teléfono',
    'address': 'Dirección',
    'student_number': 'Número de estudiante ',
    'name-user-2': 'Nombre ',
    'last-name-2': 'Apellido miembro 2',
    'birthday-2': 'Cumpleaños miembro 2',
    'email-2': 'email miembro 2',
    'phone-2': 'Teléfono miembro 2',
    'address-2': 'Dirección miembro 2',
    'student_number-2': 'Número de estudiante miembro 2',
};

$(function () {
    var $erros = $('.content-p'),
        $file = $('#file'),
        fileName;
    /* Form */
    $('#form').on("submit", function (e) {
        e.preventDefault();

        $('.loading').addClass('show');
        $('.loading .spinner').addClass('show');
        var fields = $(this).serializeArray();
        $.post($(this).attr('action'), fields, responseForm, 'json');

    });

    function responseForm(r) {
        $('.loading').removeClass('show');
        $('.loading .spinner').removeClass('show');

        if (!r.success) {
            var res = r.errors.split("**"),
                html = '';
            $("input").css({'border-color': '#e0e0e0'});

            $('.content-error').addClass('show');

            for (var i = 0; i < res.length - 1; i++) {
                var str = res[i].trim();
                $("input[name='" + str + "']").css({'border-color': '#D60C41'}, {'background-color': 'red'});
                html += "<li> El valor del campo " + filesForm[str] + " no es valido</li>";

            }
            $erros.html(html);
        }
        else {
            $('main').append(" <span class='thanks'>Gracias por inscribirte, en cuanto verifiquemos los datos te confirmaremos vía correo electrónico tu participación en Red Bull.</span>");
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
            request = new XMLHttpRequest(),
            x,
            baseUrl = $('body').data('url');

        var formdata = new FormData(form);
        formdata.append('file_name', file)
        request.open('post', baseUrl + 'uploadImage');
        request.send(formdata);

        x = request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request)
                var myArr = JSON.parse(request.responseText);
                successImage(myArr);
            }
        }

    }

    function successImage(myArr) {
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