<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use PDOException;

class StaffMDT
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

  // Get all staff records
  public function getAll($status)
  {
    $operator = $status == 'DISETUJUI' ? '=' : '!=';

    $stmt = $this->db->prepare("SELECT 
    staff_mdt.id,
    staff_mdt.lembaga_id,
    staff_mdt.nama,
    staff_mdt.nik,
    staff_mdt.jabatan,
    staff_mdt.alamat,
    staff_mdt.keterangan,
    staff_mdt.status,
    lembaga_mdt.lembaga
FROM 
    staff_mdt
JOIN 
    lembaga_mdt ON staff_mdt.lembaga_id = lembaga_mdt.id
WHERE
    staff_mdt.deleted_at is NULL
AND 
    staff_mdt.status $operator 'DISETUJUI' ;
");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get a single staff record by ID
  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM staff_mdt WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Update a staff record by ID
  public function edit($id, $data)
  {
    $query = "UPDATE staff_mdt SET 
              lembaga_id = :lembaga_id,
              nama = :nama,
              nik = :nik,
              status = :status,
              jabatan = :jabatan,
              alamat = :alamat
              WHERE id = :id";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':lembaga_id', $data['lembaga_id']);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':nik', $data['nik']);
    $stmt->bindParam(':jabatan', $data['jabatan']);
    $stmt->bindParam(':alamat', $data['alamat']);

    return $stmt->execute();
  }

  public function updateStatus($id, $data)
  {
    $query = "UPDATE staff_mdt SET status = :status, keterangan = :keterangan WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':keterangan', $data['keterangan']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  // Soft delete a staff record by ID (if applicable)
  public function softDelete($id)
  {
    $stmt = $this->db->prepare("UPDATE staff_mdt SET deleted_at = NOW() WHERE id = :id");
    $stmt->bindParam(':id', $id);

    return $stmt->execute();
  }

  // Add a new staff_mdt record
  public function add($data)
  {
    $query = "INSERT INTO staff_mdt (lembaga_id, nama, nik, jabatan, alamat) 
              VALUES (:lembaga_id, :nama, :nik, :jabatan, :alamat)";

    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':lembaga_id', $data['lembaga_id']);
    $stmt->bindParam(':nama', $data['nama']);
    $stmt->bindParam(':nik', $data['nik']);
    $stmt->bindParam(':jabatan', $data['jabatan']);
    $stmt->bindParam(':alamat', $data['alamat']);

    return $stmt->execute();
  }
}