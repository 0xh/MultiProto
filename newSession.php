<?php
require_once 'vendor/autoload.php';
if (!file_exists('sessions'))
  mkdir('sessions');
$session = 'sessions/'.trim(readline('Inserisci il nome della sessione: ')).'.madeline';
$MadelineProto = new \danog\MadelineProto\API($session, array('logger' => array('logger' => 0), 'updates' => array('handle_updates' => false)));
$MadelineProto->start();
$MadelineProto->session = $session;
$MadelineProto->serialize($session);
echo 'Fatto!';
exit;
