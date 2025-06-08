<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class Murid extends Model
{
    protected string $table = 'murid';
    protected array $fillable = [
        "lembaga_pendidikan_id",
        "jabatan_staff_id",
        "nama",
        "alamat",
        "tempat_tanggal_lahir",
        "rombel_kelas",
        "nisn",
        "tingkat",
        "jenis_kelamin",
    ];
    protected array $hidden = [];
}