$(document).ready(function () {

    $('#sendmail').on('click', function () {
        var email = $('#EMAIL').val().trim();
        var name = $('#NAME').val().trim();
        var message = $('#MSG').val().trim();

        if (name === "") {
            $('#errorMess').text('Введите имя/наименование организации');

            return false;
        } else if (email === "") {
            $('#errorMess').text('Введите email');

            return false;
        } else if (message.length < 5) {
            $('#errorMess').text('Напишите чуть больше по сути вашего обращения');
            return false;
        }

        $('#errorMess').text('');

        $.ajax({

            url: 'contact.php',
            type: 'POST',
            cache: false,
            data: {'email': email, 'name': name, 'message': message},
            dataType: 'html',
            beforeSend: function () {
                $('#sendmail').prop('disabled', true);
            },
            success: function (data) {
                if (!data) {
                    message =
                    $('#status').append(message);
                    // alert("Ошибка. Сообщение не отправлено! Проверьте правильность введенных данных");
                } else {
                    $('.form').trigger('reset');
                    // alert('Спасибо! Я внимательно ознакомлюсь с предложением и в ближайшее время свяжусь с вами.');
                }

                $('#sendmail').prop('disabled', false);

            }
        })

    });

});