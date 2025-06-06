<?php

namespace Sfy\AplikasiDataKemenagPAI\Helpers;

class ResponseFormatter
{
  public static function success(string $message, $data = null): string
  {
    return json_encode([
      'status'  => true,
      'message' => $message,
      'data'    => $data
    ]);
  }

  public static function error(string $message, $data = null): string
  {
    return json_encode([
      'status'  => false,
      'message' => $message,
      'data'    => $data
    ]);
  }
}