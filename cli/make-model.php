<?php

if ($argc < 2) {
  echo "Usage: php make-model.php ClassName\n";
  exit(1);
}

$className = $argv[1];
$tableName = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $className)); // Users => users, UserProfile => user_profile

$namespace = 'Sfy\\AplikasiDataKemenagPAI\\Model';
$directory = __DIR__ . '../../src/Model'; // Ubah jika folder model kamu beda
$filePath = "$directory/$className.php";

// Bikin folder kalau belum ada
if (!is_dir($directory)) {
  mkdir($directory, 0777, true);
}

if (file_exists($filePath)) {
  echo "File model '$filePath' sudah ada.\n";
  exit(1);
}

$template = <<<PHP
<?php

namespace $namespace;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class $className extends Model
{
    protected string \$table = '$tableName';
    protected array \$fillable = [];
    protected array \$hidden = [];
}

PHP;

file_put_contents($filePath, $template);
echo "Model '$className' berhasil dibuat di $filePath\n";