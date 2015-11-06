<?php

$loader = require __DIR__.'/vendor/autoload.php';


$input = file_get_contents('php://input');


define('BOT_TOKEN', '174855306:AAE-17HpOmDsU8Qo6QaXRPT1NPvkFCQriCU');
define('BOT_NAME', 'cmejenkinsbot');
define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');

$array = json_decode($input, true);
$message = $array['build']['phase'] . ": " . $array['name'] . " #" . $array['build']['number'] . "\n" . 'http://jenkins.tobikokous.de/' . $array['build']['url'];

if (array_key_exists('status', $array['build'])) {
  $message .= "\nStatus: " . strtolower($array['build']['status']);
  /*if ($array['build']['status'] == 'SUCCESS') {
    $message .= " \U+1F389";
  }
  */
}

try {

  $telegram = new Longman\TelegramBot\Telegram(BOT_TOKEN, BOT_NAME);
  $data['chat_id'] = '-55245928';
  $data['text'] = $message;
  Longman\TelegramBot\Request::sendMessage($data);
}catch (Exception $e){
  echo $e->getMessage();
}
