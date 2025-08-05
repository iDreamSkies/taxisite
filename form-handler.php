<?php
$botToken = '123456:ABC-DEF1234ghIkl-zyx57W2v1u123ew11';
$chatId = '-1002828668884';

$name = $_POST['name'] ?? '';
$phone = $_POST['phone'] ?? '';
$from = $_POST['from'] ?? '';
$to = $_POST['to'] ?? '';
$datetime = $_POST['datetime'] ?? '';
$passengers = $_POST['passengers'] ?? '';
$carClass = $_POST['car-class'] ?? '';
$comment = $_POST['comment'] ?? '';

$message = "🚗 *Новая заявка на трансфер*\n";
$message .= "👤 Имя: $name\n";
$message .= "📞 Телефон: $phone\n";
$message .= "📍 Откуда: $from\n";
$message .= "📍 Куда: $to\n";
$message .= "🕒 Дата и время: $datetime\n";
$message .= "👥 Пассажиров: $passengers\n";
$message .= "🚘 Класс авто: $carClass\n";
$message .= "💬 Комментарий: $comment";

$response = file_get_contents("https://api.telegram.org/bot$botToken/sendMessage?" . http_build_query([
    'chat_id' => $chatId,
    'text' => $message,
    'parse_mode' => 'Markdown'
]));

if ($response) {
    echo 'OK';
} else {
    http_response_code(500);
    echo 'ERROR';
}
?>

