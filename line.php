<?php

const LOG_DIR = __DIR__ . '/logs';
const DATA_DIR = __DIR__ . '/data';
const USERDATA_DIR = DATA_DIR . '/users';
const USERDATA_SUFFIX = '.dat';

require_once __DIR__ . 'config.php';

// defines
const DS = DIRECTORY_SEPARATOR;
const NL = "\n";
$hour = (int)date('H');
if (4 <= $hour && $hour <= 12) {
  define('GREETING', 'おはようございます');
} elseif (12 <= $hour && $hour <= 20) {
  define('GREETING', 'こんにちは');
} else {
  define('GREETING', 'こんばんは');
}

// functions
function reply(array $messages, bool $exit = true) {
  global $conf;
  global $reply_token;

  $request_data = array(
    'replyToken' => $reply_token,
    'messages' => array($messages),
  );

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, 'https://api.line.me/v2/bot/message/reply');
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($request_data));
  curl_setopt($curl, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $conf['channel_access_token']
  ));

  $result = curl_exec($curl);
  curl_close($curl);

  if($exit === true) {
    exit();
  }

  return $result;
}
