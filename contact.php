
<html lang="ru">

<head>
        <title>Форма обратной связи</title>
</head>

<body>

<?php

// КЛЮЧИ

define('SITE KEY', '6Ldr5ccUAAAAAAo1EkKX7urj5Dkvl14acauFluEB');
define('SECRET KEY', '6Ldr5ccUAAAAAC6DJSIPWWcCYgB1FYb-R3rdKV8k');

//ОБРАБОТКА ЗАПРОСА

if($_POST){

    //СОЗДАЕМ ФУНКЦИЮ КОТОРАЯ ДЕЛАЕТ ЗАПРОС НА GOOGLE СЕРВИС

    function getCaptcha($SecretKey) {
        $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".SECRET_KEY."&response={$SecretKey}");
        $Return = json_decode($Response);
        return $Return;
    }

    //ПРОИЗВОДИМ ЗАПРОС НА GOOGLE СЕРВИС И ЗАПИСЫВАЕМ ОТВЕТ

    $Return = getCaptcha($_POST['g-recaptcha-response']);

    //ВЫВОДИМ НА ЭКРАН ПОЛУЧЕННЫЙ ОТВЕТ

    var_dump($Return);

    // ЕСЛИ ЗАПРОС УДАЧНО ОТПРАВЛЕН И ЗНАЧЕНИЕ score БОЛЬШЕ 0,3 ВЫПОЛНЯЕМ КОД

    if($Return->success == true && $Return->score > 0.3){
echo "Succes!";
}
else {
echo "You are Robot";
}
}

if (!isset($_POST['name']) and !isset($_POST['email'])) { ?>



             <form class="form" action="contact.php" method="post">
                 <div class="form-row">
                 <div class="col col-md-6">

        <label class="lable_name col-form-label-lg" for="NAME">Ваше Имя<span class="star">*</span></label>
        <input id="NAME" class="form-control form-control-lg" type="text" name="name" placeholder="Имя/Название организации" required>
                 </div>

                 <div class="col col-md-6">

        <label class="lable_email col-form-label-lg" for = "EMAIL">Ваш эл. адрес<span class="star">*</span></label>
        <input class="form-control form-control-lg" id="EMAIL" type="email" name="email" placeholder="Введите электронный адрес" required>
                 </div>
                 </div>
                 <div class="form-row">
                     <div class="col">

         <label class="col-form-label-lg" for="MSG">Текст сообщения</label>
        <textarea id="MSG" class="contact_message form-control form-control-lg" type="text"  name="msg" placeholder="Оставьте свое сообщение"></textarea>
                     </div>
                 </div>
                 <input type="hidden" id="g-recaptcha-response" name="g-recaptcha-response" />
                 <div class="contact__btn">
                 <button type="submit" class="btn btn-outline-success">Отправить сообщение</button>
                 </div>
             </form>



<?php } else {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);
    $name = urldecode($name);
    $email = urldecode($email);
    $msg = urldecode($msg);
    $name = trim($name);
    $email = trim($email);
    $to = "ella.vrubel@yandex.ru";
    $subject = 'Contact Form';
    $headers = "From: {$_POST['email']}\r\n";
    $result = mail($to, $subject, $msg, $headers);
    if ($result) {
        echo "Спасибо за отправку вашего сообщения! Я внимательно ознакомлюсь с предложением в ближайшее время и отвечу вам.";
    } else {
        echo "Ошибка. Сообщение не отправлено! Проверьте правильность введенных данных";
    } else {
    http_response_code(403);
    echo "Попробуйте еще раз";

}
}
?>

</body>
</html>