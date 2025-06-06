<?php

// Ambil argumen dari command line
$controllerName = $argv[1] ?? null;

if (!$controllerName) {
  echo "❌ Nama controller wajib diisi. Contoh: php cli/make-controller.php Kecamatan\n";
  exit(1);
}

$className = ucfirst($controllerName) . 'Controller';
$modelName = ucfirst($controllerName);
$namespace = "Sfy\\AplikasiDataKemenagPAI\\Controller";
$modelNamespace = "Sfy\\AplikasiDataKemenagPAI\\Model\\$modelName";
$responseFormatterNamespace = "Sfy\\AplikasiDataKemenagPAI\\Helpers\\ResponseFormatter";

$controllerPath = __DIR__ . "/../src/Controller/$className.php";

$template = <<<PHP
<?php

namespace $namespace;

use $responseFormatterNamespace;
use $modelNamespace;
use Exception;

class $className
{
    private $modelName \$${controllerName};

    public function __construct()
    {
        \$this->${controllerName} = new $modelName();
    }

    public function index(): string
    {
        try {
            \$data = \$this->${controllerName}->getAll();
            return ResponseFormatter::success('Data $controllerName berhasil diambil', \$data);
        } catch (Exception \$e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . \$e->getMessage());
        }
    }

    public function show(int \$id): string
    {
        try {
            \$data = \$this->${controllerName}->getBy(['id' => \$id]);;
            if (!\$data) {
                return ResponseFormatter::error('$modelName tidak ditemukan');
            }
            return ResponseFormatter::success('Data $modelName ditemukan', \$data);
        } catch (Exception \$e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . \$e->getMessage());
        }
    }

    public function store(array \$request): string
    {
        try {
            \$nama = \$request['nama'] ?? '';

            if (!\$nama) {
                return ResponseFormatter::error('Nama $controllerName wajib diisi');
            }

            \$created = \$this->${controllerName}->create([
                'nama' => \$nama
            ]);

            return \$created
                ? ResponseFormatter::success('$modelName berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan $modelName');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }

    public function update(int \$id, array \$request): string
    {
        try {
            \$nama = \$request['nama'] ?? '';

            if (!\$nama) {
                return ResponseFormatter::error('Nama $controllerName wajib diisi');
            }

            \$updated = \$this->${controllerName}->update(\$id, [
                'nama' => \$nama
            ]);

            return \$updated
                ? ResponseFormatter::success('$modelName berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui $modelName');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }

    public function destroy(int \$id): string
    {
        try {
            \$deleted = \$this->${controllerName}->delete(\$id);

            return \$deleted
                ? ResponseFormatter::success('$modelName berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus $modelName');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }
}
PHP;

// Cek apakah foldernya ada
$dir = dirname($controllerPath);
if (!is_dir($dir)) {
  mkdir($dir, 0755, true);
}

// Simpan file
file_put_contents($controllerPath, $template);

echo "✅ Controller '$className' berhasil dibuat di: $controllerPath\n";