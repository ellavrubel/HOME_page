$(document).ready(function () {

    $('#sendmail').on('click', function () {
        var email = $('#EMAIL').val().trim();
        var name = $('#NAME').val().trim();
        var message = $('#MSG').val().trim();

        if (name === "") {
            $('.lable_name').css({'visibility':'visible'});

            return false;
        } else if (email === "") {
            $('.lable_email').css({'visibility':'visible'});

            return false;
        } else if (message.length < 5) {
            $('.lable_msg').css({'visibility':'visible'});
            return false;
        }

        $('.lable_name, .lable_email, .lable_msg').css({'visibility':'hidden'});

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
                    var errorMessage = 'Сервер не отвечает. Сообщение не отправлено! Попробуйте связаться со мной не через сайт.';
                    $('#status').append(errorMessage).css({'visibility':'visible'});

                } else {
                    $('.form').trigger('reset');
                    var successMessage = 'Сервер не отвечает. Сообщение не отправлено! Попробуйте связаться со мной не через сайт.';
                        // 'Спасибо! Я внимательно ознакомлюсь с предложением и в ближайшее время свяжусь с вами.';
                    $('#status').append(successMessage).css({'visibility':'visible'});
                }

                $('#sendmail').prop('disabled', false);

            }
        })

    });

});