<?php
//require_once 'vendor/autoload.php';          da usare per composer
require_once 'MultiProto.phar';              //prima scarica Multiproto.phar
$MultiProto = new MultiProto(glob('session/*.madeline'));
$MultiProto->exec(function($MadelineProto, $me) {
  $MadelineProto->messages->sendMessage(['peer' => '@peppelg1', 'message' => 'ciao!1!']); //tutti gli userbot salutano @peppelg1
}, false); //false = multithread spento
