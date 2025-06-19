<?php

namespace Sfy\AplikasiDataKemenagPAI\Middlewares;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;

class Auth
{
  public function __construct()
  {
    SessionHelper::startSession();
  }
  public static function handle()
  {
    $userLoggedIn = SessionHelper::isLoggedIn();

    if ($userLoggedIn) {
      return true;
    } else {
      header('Location: /');
      exit();
    }
  }
}
