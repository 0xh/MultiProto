<?php
class MultiProto {
  protected $sessions = array();
  public function __construct($sessions) {
    if (!is_array($sessions))
    return false;
    foreach ($sessions as $session) {
      if (file_exists($session)) {
        try {
          $i = new \danog\MadelineProto\API($session, array('logger' => array('logger' => 0), 'updates' => array('handle_updates' => false)));
          $me = $i->get_self();
          if (is_array($me)) {
            array_push($this->sessions, array($i, $me));
          }
        } catch (Exception $e) {
        }
      }
    }
    return $this;
  }
  public function exec($function, $async = 0) {
    if (is_callable($function)) {
      foreach ($this->sessions as $session) {
        if ($async === true) {
          $pid = pcntl_fork();
          if ($pid == -1) {
            die('Could not fork');
          } else if ($pid) {
          } else {
            $function($session[0], $session[1]);
            exit;
          }
        } else {
          $function($session[0], $session[1]);
        }
      }
    }
    return true;
  }
}
