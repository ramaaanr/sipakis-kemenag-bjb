<?php

namespace Sfy\AplikasiDataKemenagPAI\Helpers;

class ViewHelper
{
  public static function render(string $path, array $data = []): void
  {
    $baseDir = dirname(__DIR__, 2) . '/src/View/';
    $file = $baseDir . str_replace('.', '/', $path) . '.php';

    if (file_exists($file)) {
      extract($data);
      include $file;
    } else {
      http_response_code(404);
      echo "View not found: " . $file;
    }
  }
}