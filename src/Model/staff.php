<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class staff extends Model
{
    protected string $table = 'staff';
    protected array $fillable = [
        "lembaga_pendidikan_id",
        "jabatan_staff_id",
        "nama",
        "alamat",
        "no_hp",
        "email",
        "nik",
        "jenis_kelamin",
    ];
    protected array $hidden = [];
}