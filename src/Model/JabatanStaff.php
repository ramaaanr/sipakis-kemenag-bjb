<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class JabatanStaff extends Model
{
    protected string $table = 'jabatan_staff';
    protected array $fillable = ['nama'];
    protected array $hidden = ['deleted_at'];
}