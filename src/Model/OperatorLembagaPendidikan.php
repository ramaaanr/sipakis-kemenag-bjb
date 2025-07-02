<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class OperatorLembagaPendidikan extends Model
{
  protected string $table = 'operator_lembaga_pendidikan';
  protected array $fillable = [
    'user_id',
    'lembaga_pendidikan_id',
  ];
  protected array $hidden = ['deleted_at'];
  public function getAllWithRelations(array $criteria = []): array
  {
    $sql = "
      SELECT 
        olp.*, 
        u.username AS username, 
        lp.nama AS lembaga_pendidikan
      FROM operator_lembaga_pendidikan olp
      LEFT JOIN users u ON olp.user_id = u.id
      LEFT JOIN lembaga_pendidikan lp ON olp.lembaga_pendidikan_id = lp.id
      WHERE olp.deleted_at IS NULL
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
  public function getByWithRelations(array $criteria = []): ?array
  {
    $sql = "
      SELECT 
        olp.*, 
        u.username AS username, 
        lp.nama AS lembaga_pendidikan
      FROM operator_lembaga_pendidikan olp
      LEFT JOIN users u ON olp.user_id = u.id
      LEFT JOIN lembaga_pendidikan lp ON olp.lembaga_pendidikan_id = lp.id
      WHERE olp.deleted_at IS NULL
    ";

    $params = [];
    foreach ($criteria as $field => $value) {
      $sql .= " AND olp.{$field} = :{$field}";
      $params[":{$field}"] = $value;
    }

    $sql .= " ORDER BY lp.id DESC LIMIT 1";

    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);

    $result = $stmt->fetch(\PDO::FETCH_ASSOC);

    return $result ?: null;
  }
}