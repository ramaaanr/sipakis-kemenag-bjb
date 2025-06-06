<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class JenisLembagaPendidikan extends Model
{
    protected string $table = 'jenis_lembaga_pendidikan';
    protected array $fillable = ['nama'];
    protected array $hidden = ['deleted_at'];
}