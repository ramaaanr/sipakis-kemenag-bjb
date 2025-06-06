<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class LembagaPendidikan extends Model
{
    protected string $table = 'lembaga_pendidikan';
    protected array $fillable = [
        'kecamatan_id',
        'jenis_lembaga_pendidikan_id',
        'nama',
        'nspp',
        'npsn',
        'jenjang',
        'alamat',
        'no_telepon',
        'email',
    ];
    protected array $hidden = ['deleted_at'];
}