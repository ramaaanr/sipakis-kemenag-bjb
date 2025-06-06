<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class Kecamatan extends Model
{
    protected string $table = 'kecamatan';
    protected array $fillable = ['nama', 'deleted_at'];
    protected array $hidden = ['deleted_at'];
}