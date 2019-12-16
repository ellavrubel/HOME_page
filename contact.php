<?php

//echo "OK";
//return;

// КЛЮЧИ

//define('SECRET_KEY', '6Ldr5ccUAAAAAC6DJSIPWWcCYgB1FYb-R3rdKV8k');

//ОБРАБОТКА ЗАПРОСА

//if ($_POST) {
    //СОЗДАЕМ ФУНКЦИЮ КОТОРАЯ ДЕЛАЕТ ЗАПРОС НА GOOGLE СЕРВИС

   // function getCaptcha($SecretKey)
    //{
       // $Response = file_get_contents(
         //   "https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}"
      //  );
      //  $Return = json_decode($Response);
     //   return $Return;
    //}

    //ПРОИЗВОДИМ ЗАПРОС НА GOOGLE СЕРВИС И ЗАПИСЫВАЕМ ОТВЕТ

   // $Return = getCaptcha($_POST['g-recaptcha-response']);

    //ВЫВОДИМ НА ЭКРАН ПОЛУЧЕННЫЙ ОТВЕТ

   // var_dump($Return);

    // ЕСЛИ ЗАПРОС УДАЧНО ОТПРАВЛЕН И ЗНАЧЕНИЕ score БОЛЬШЕ 0,3 ВЫПОЛНЯЕМ КОД

    //if ($Return->success == true && $Return->score > 0.3) {
   //     echo "Succes!";
   // } else {
    //    echo "You are Robot";
    //}
//}

if (!isset($_POST['name']) and !isset($_POST['email'])) {
    return false;
    // add redirect
} else {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $msg = htmlspecialchars($_POST['msg']);
    $name = urldecode($name);
    $email = urldecode($email);
    $msg = urldecode($msg);
    $name = trim($name);
    $email = trim($email);
    $to = 'ella.vrubel@yandex.ru';
    $subject = '=?utf-8?B?' . base64_encode('webella-message' . '?=');
    $headers = 'From: email\r\nReply-to: $email\r\nContent-type: text-html; charset=utf-8\r\n';

    $result = mail($to, $subject, $msg, $headers);
    echo $result;
}
?>