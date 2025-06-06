<?php

$resource = $argv[1] ?? null;

if (!$resource) {
  echo "❌ Nama resource wajib diisi. Contoh: php cli/make-route.php murid\n";
  exit;
}

$routeFile = __DIR__ . '../../src/Config/routing.php'; // Ubah jika folder model kamu beda
// atau file routing kamu
$stubPath = __DIR__ . '/stubs/route.stub';
if (!file_exists($stubPath)) {
  echo "❌ File stub tidak ditemukan: $stubPath\n";
  exit;
}

$stub = file_get_contents($stubPath);

// Ubah `{{resource}}` dan `{{Resource}}` untuk namespace atau variabel
$stub = str_replace('{{resource}}', $resource, $stub);
$stub = str_replace('{{Resource}}', ucfirst($resource), $stub); // yang ini buat nama Controller

$content = file_get_contents($routeFile);
$marker = '// ✅ [ROUTE_REGISTER_MARKER]';

if (strpos($content, $marker) === false) {
  echo "❌ Marker \"$marker\" tidak ditemukan di file route.\n";
  exit;
}

$newContent = str_replace($marker, $stub . PHP_EOL . '        ' . $marker, $content);
file_put_contents($routeFile, $newContent);

echo "✅ Route untuk controller '$resource' berhasil ditambahkan.\n";