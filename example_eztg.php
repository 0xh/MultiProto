<?php
//require_once 'vendor/autoload.php';          da usare per composer
require_once 'MultiProto.phar';              //prima scarica Multiproto.phar
$MultiProto = new MultiProto(glob('session/*.madeline'));
$EzTGCallback = function($update, $EzTG) use($MultiProto) {
  if (isset($update->message->text) and $update->message->text == 'saluta') { //se il bot riceve saluta
    $MultiProto->exec(function($MadelineProto, $me) use($update, $EzTG) {
      $MadelineProto->messages->sendMessage(['peer' => $update->message->chat->id, 'message' => 'ciao!1!']); //tutti gli userbot salutano
    }, false); //false = multithread spento
  }
};
$EzTG = new EzTG(array('token' => 'token', 'callback' => $EzTGCallback));
