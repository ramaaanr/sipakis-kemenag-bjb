<?php

namespace Sfy\AplikasiDataKemenagPAI\Middlewares;

class Middleware
{

  public static function Auth()
  {
    $auth = new Auth();
    $auth->handle();
  }
}