<?php

namespace Sfy\AplikasiDataKemenagPAI\Core;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Config\Database;

abstract class Model
{
  protected PDO $db;
  protected string $table;
  protected array $fillable = [];
  protected array $hidden = [];

  public function __construct()
  {
    $this->db = Database::getConnection();
  }

  public function getBy(array $criteria): ?array
  {
    [$sql, $params] = $this->buildSelectQuery($criteria, true);
    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ? $this->filterHidden($result) : null;
  }

  public function getAll(array $criteria = []): array
  {
    [$sql, $params] = $this->buildSelectQuery($criteria);
    $stmt = $this->db->prepare($sql);
    $stmt->execute($params);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return array_map([$this, 'filterHidden'], $results);
  }

  public function create(array $data): bool
  {
    $data = array_intersect_key($data, array_flip($this->fillable));
    $columns = implode(', ', array_keys($data)) . ', created_at';
    $placeholders = ':' . implode(', :', array_keys($data)) . ', NOW()';

    $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
    $stmt = $this->db->prepare($sql);

    return $stmt->execute($data);
  }

  public function update(int $id, array $data): bool
  {
    $data = array_intersect_key($data, array_flip($this->fillable));
    $fields = array_map(fn($f) => "$f = :$f", array_keys($data));
    $sql = "UPDATE {$this->table} SET " . implode(', ', $fields) . " WHERE id = :id";
    $data['id'] = $id;

    $stmt = $this->db->prepare($sql);
    return $stmt->execute($data);
  }

  public function delete(int $id): bool
  {
    $stmt = $this->db->prepare("UPDATE {$this->table} SET deleted_at = NOW() WHERE id = :id");
    return $stmt->execute([':id' => $id]);
  }
  public function forceDelete(int $id): bool
  {

    $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
    return $stmt->execute([':id' => $id]);
  }


  protected function buildSelectQuery(array $criteria = [], bool $limitOne = false): array
  {
    $sql = "SELECT * FROM {$this->table} WHERE deleted_at IS NULL";
    $params = [];

    foreach ($criteria as $field => $value) {
      $sql .= " AND {$field} = :{$field}";
      $params[":{$field}"] = $value;
    }

    $sql .= " ORDER BY id DESC";
    if ($limitOne) $sql .= " LIMIT 1";

    return [$sql, $params];
  }

  protected function filterHidden(array $record): array
  {
    foreach ($this->hidden as $field) {
      unset($record[$field]);
    }
    return $record;
  }
}
