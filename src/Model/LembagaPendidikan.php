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

  public function getAll(array $criteria = []): array
  {
    $sql = "
      SELECT 
        lp.*, 
        k.nama AS nama_kecamatan, 
        j.nama AS jenis_lembaga
      FROM lembaga_pendidikan lp
      LEFT JOIN kecamatan k ON lp.kecamatan_id = k.id
      LEFT JOIN jenis_lembaga_pendidikan j ON lp.jenis_lembaga_pendidikan_id = j.id
      WHERE lp.deleted_at IS NULL
    ";

    $params = [];
    foreach ($criteria as $field => $value) {
      $sql .= " AND lp.{$field} = :{$field}";
      $params[":{$field}"] = $value;
    }

    $sql .= " ORDER BY lp.id DESC";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }
  public function getBy(array $criteria = []): ?array
  {
    $sql = "
      SELECT 
        lp.*, 
        k.nama AS nama_kecamatan, 
        j.nama AS jenis_lembaga
      FROM lembaga_pendidikan lp
      LEFT JOIN kecamatan k ON lp.kecamatan_id = k.id
      LEFT JOIN jenis_lembaga_pendidikan j ON lp.jenis_lembaga_pendidikan_id = j.id
      WHERE lp.deleted_at IS NULL
    ";

    $params = [];
    foreach ($criteria as $field => $value) {
      $sql .= " AND lp.{$field} = :{$field}";
      $params[":{$field}"] = $value;
    }

    $sql .= " ORDER BY lp.id DESC LIMIT 1";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    return $result ?: null;
  }
}
