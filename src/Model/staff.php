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
    public function getAll(array $criteria = []): array
    {
        $sql = "
      SELECT 
        s.*, 
        lp.nama AS lembaga_pendidikan, 
        js.nama AS jabatan
      FROM staff s
      LEFT JOIN jabatan_staff js ON s.jabatan_staff_id = js.id
      LEFT JOIN lembaga_pendidikan lp ON s.lembaga_pendidikan_id = lp.id
      WHERE s.deleted_at IS NULL
    ";

        $params = [];
        foreach ($criteria as $field => $value) {
            $sql .= " AND s.{$field} = :{$field}";
            $params[":{$field}"] = $value;
        }

        $sql .= " ORDER BY s.id DESC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}