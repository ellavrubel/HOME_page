$(document).ready(function () {

    $('#sendmail').on('click', function () {
            var email = $('#EMAIL').val().trim();
            var name = $('#NAME').val().trim();
            var message = $('#MSG').val().trim();

            if (email === "") {
                $('#errorMess').text('Введите email');

                return false;
            } else if (name === "") {
                $('#errorMess').text('Введите имя/наименование организации');

                return false;
            } else if (message.length < 5){
                $('#errorMess').text('Напишите чуть больше по сути вашего обращения');
                return false;
            }

            $('#errorMess').text('');




    });

})