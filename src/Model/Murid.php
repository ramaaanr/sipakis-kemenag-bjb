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

    public function getAll(array $criteria = []): array
    {
        $sql = "
      SELECT 
        m.*, 
        lp.nama AS lembaga_pendidikan
      FROM murid m
      LEFT JOIN lembaga_pendidikan lp ON m.lembaga_pendidikan_id = lp.id
      WHERE m.deleted_at IS NULL
    ";

        $params = [];
        foreach ($criteria as $field => $value) {
            $sql .= " AND m.{$field} = :{$field}";
            $params[":{$field}"] = $value;
        }

        $sql .= " ORDER BY m.id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}