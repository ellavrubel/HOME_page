<html>
<head>
    <title>Форма заявки с сайта</title>
</head>
<body>
<?php

if (!isset($_POST['name']) and !isset($_POST['email'])) {
    ?>
    <form action="contact.php" method="post">
        <input type="text" name="name" placeholder="Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" class="textarea" name ="msg">
        <input type="submit" value="SEND MASSAGE">
    </form> <?php

} else {
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
        echo "message sent";
    } else {
        echo "something went wrong";
    }
}
?>
</body>
</html>