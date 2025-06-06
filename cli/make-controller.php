<?php

function pascalToTitle($string)
{
    return trim(preg_replace('/(?<!^)([A-Z])/', ' $1', $string));
}

// Ambil argumen dari command line
$controllerName = $argv[1] ?? null;

if (!$controllerName) {
    echo "❌ Nama controller wajib diisi. Contoh: php cli/make-controller.php Kecamatan\n";
    exit(1);
}

$className = ucfirst($controllerName) . 'Controller';
$modelName = ucfirst($controllerName);
$modelTitle = pascalToTitle($modelName); // 🧠 Gunakan untuk teks pesan
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
    private \$${controllerName};

    public function __construct()
    {
        \$this->${controllerName} = new $modelName();
    }

    public function index(): string
    {
        try {
            \$data = \$this->${controllerName}->getAll();
            return ResponseFormatter::success('Data $modelTitle berhasil diambil', \$data);
        } catch (Exception \$e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . \$e->getMessage());
        }
    }

    public function show(int \$id): string
    {
        try {
            \$data = \$this->${controllerName}->getBy(['id' => \$id]);
            if (!\$data) {
                return ResponseFormatter::error('$modelTitle tidak ditemukan');
            }
            return ResponseFormatter::success('Data $modelTitle ditemukan', \$data);
        } catch (Exception \$e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . \$e->getMessage());
        }
    }

    public function store(array \$request): string
    {
        try {
            \$nama = \$request['nama'] ?? '';

            if (!\$nama) {
                return ResponseFormatter::error('Nama $modelTitle wajib diisi');
            }

            \$created = \$this->${controllerName}->create([
                'nama' => \$nama
            ]);

            return \$created
                ? ResponseFormatter::success('$modelTitle berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan $modelTitle');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }

        public function update(int \$id, array \$request): string
    {
        try {
            \$data = \$this->${controllerName}->getBy(['id' => \$id]);
            if (!\$data) {
                return ResponseFormatter::error('$modelTitle tidak ditemukan');
            }

            \$nama = \$request['nama'] ?? '';

            if (!\$nama) {
                return ResponseFormatter::error('Nama $modelTitle wajib diisi');
            }

            \$updated = \$this->${controllerName}->update(\$id, [
                'nama' => \$nama
            ]);

            return \$updated
                ? ResponseFormatter::success('$modelTitle berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui $modelTitle');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }

    public function destroy(int \$id): string
    {
        try {
            \$data = \$this->${controllerName}->getBy(['id' => \$id]);
            if (!\$data) {
                return ResponseFormatter::error('$modelTitle tidak ditemukan');
            }

            \$deleted = \$this->${controllerName}->delete(\$id);

            return \$deleted
                ? ResponseFormatter::success('$modelTitle berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus $modelTitle');
        } catch (Exception \$e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . \$e->getMessage());
        }
    }

}
PHP;

// Buat direktori jika belum ada
$dir = dirname($controllerPath);
if (!is_dir($dir)) {
    mkdir($dir, 0755, true);
}

file_put_contents($controllerPath, $template);
echo "✅ Controller '$className' berhasil dibuat di: $controllerPath\n";