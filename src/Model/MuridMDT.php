<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use PDOException;

class MuridMDT
{
  private $db;

  public function __construct()
  {
    $config = require __DIR__ . '/../Config/database.php';

    try {
      $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8mb4";
      $this->db = new PDO($dsn, $config['username'], $config['password']);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
    }
  }

  // Get all murid records
  public function getAll($status)
  {
    $operator = $status == 'DISETUJUI' ? '=' : '!=';
    $stmt = $this->db->prepare("SELECT 
      murid_mdt.id,
      murid_mdt.lembaga_id,
      murid_mdt.nama,
      murid_mdt.ttl,
      murid_mdt.nisn,
      murid_mdt.jenis_kelamin,
      murid_mdt.rombel_kelas,
      murid_mdt.tingkat,
      murid_mdt.keterangan,
      murid_mdt.status,
      lembaga_mdt.lembaga
    FROM 
      murid_mdt
    JOIN 
      lembaga_mdt ON murid_mdt.lembaga_id = lembaga_mdt.id
    WHERE
      murid_mdt.deleted_at IS NULL
    AND
      murid_mdt.status $operator 'DISETUJUI' 
      ;
    ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get a single murid record by ID
  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM murid_mdt WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Update a murid record by ID
  public function edit($id, $data)
  {
    $query = "UPDATE murid_mdt SET 
                lembaga_id = :lembaga_id,
                nama = :nama,
                ttl = :ttl,
                status = :status,
                nisn = :nisn,
                jenis_kelamin = :jenis_kelamin,
                rombel_kelas = :rombel_kelas,
                tingkat = :tingkat
              WHERE id = :id";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':lembaga_id', $data['lembaga_id']);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':ttl', $data['ttl']);
    $stmt->bindParam(':nisn', $data['nisn']);
    $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
    $stmt->bindParam(':rombel_kelas', $data['rombel_kelas']);
    $stmt->bindParam(':tingkat', $data['tingkat']);

    return $stmt->execute();
  }
  public function updateStatus($id, $data)
  {
    $query = "UPDATE murid_mdt SET status = :status, keterangan = :keterangan WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':keterangan', $data['keterangan']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }
  // Soft delete a murid record by ID
  public function softDelete($id)
  {
    $stmt = $this->db->prepare("UPDATE murid_mdt SET deleted_at = NOW() WHERE id = :id");
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  // Add a new murid_mdt record
  public function add($data)
  {
    $query = "INSERT INTO murid_mdt (lembaga_id, nama, ttl, nisn, jenis_kelamin, rombel_kelas, tingkat) 
              VALUES (:lembaga_id, :nama, :ttl, :nisn, :jenis_kelamin, :rombel_kelas, :tingkat)";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':lembaga_id', $data['lembaga_id']);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':ttl', $data['ttl']);
    $stmt->bindParam(':nisn', $data['nisn']);
    $stmt->bindParam(':jenis_kelamin', $data['jenis_kelamin']);
    $stmt->bindParam(':rombel_kelas', $data['rombel_kelas']);
    $stmt->bindParam(':tingkat', $data['tingkat']);

    return $stmt->execute();
  }
}