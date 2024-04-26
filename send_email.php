<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем данные из формы
    $phoneNumber = $_POST["phoneNumber"];
    $email = $_POST["email"];
// Отправляем уведомление пользователю
    $user_subject = "Ваша заявка принята";
    $user_body = "Спасибо за ваше сообщение! Мы рассмотрим ваш запрос в ближайшее время.";
    $headers = "From: your_website@example.com";
    mail($email, $user_subject, $user_body, $headers);
    // Адрес электронной почты, на который отправляется сообщение
    $to = "cherch00@yandex.ru";

    // Тема сообщения
    $subject = "Новая заявка от пользователя";

    // Сообщение
    $message = "Новая заявка от пользователя:\n\n";
    $message .= "Номер телефона: $phoneNumber\n";
    $message .= "Email: $email\n";

    // Дополнительные заголовки
    $headers = "From: webmaster@example.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Отправляем сообщение
    mail($to, $subject, $message, $headers);
   
    header("Location: index.html");
    exit();
}

?>
