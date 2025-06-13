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
      // Jika pengguna belum login, kembalikan respons 401 Unauthorized
      http_response_code(401);
      echo json_encode([
        'status' => false,
        'message' => 'Akses ditolak. Anda belum login.',
      ]);
      exit();
    }
  }
}