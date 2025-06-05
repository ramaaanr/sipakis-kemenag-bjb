<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use PDOException;

class MDT
{
  private $db;

  public function __construct()
  {
    $config = require __DIR__ . '/../Config/database.php';

    try {
      $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['database']};charset=utf8";
      $this->db = new PDO($dsn, $config['username'], $config['password']);
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      die("Database connection failed: " . $e->getMessage());
    }
  }

  // Get all records
  public function getAll($status)
  {
    $operator = $status == 'DISETUJUI' ? '=' : '!=';

    $stmt = $this->db->prepare("SELECT 
            id, 
            lembaga, 
            nomor_statistik, 
            alamat, 
            nama_kepala, 
            jumlah_murid, 
            status, 
            keterangan, 
            jumlah_pengajar 
            FROM lembaga_mdt
            WHERE deleted_at is NULL AND status $operator 'DISETUJUI' ");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }

  // Get a single record by ID
  public function getById($id)
  {
    $stmt = $this->db->prepare("SELECT * FROM lembaga_mdt WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  // Update a record by ID
  public function edit($id, $data)
  {
    $query = "UPDATE lembaga_mdt SET 
            lembaga = :lembaga,
            status = :status,
            nomor_statistik = :nomor_statistik,
            alamat = :alamat,
            nama_kepala = :nama_kepala,
            jumlah_murid = :jumlah_murid,
            jumlah_pengajar = :jumlah_pengajar
            WHERE id = :id";


    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':lembaga', $data['lembaga']);
    $stmt->bindParam(':nomor_statistik', $data['nomor_statistik']);
    $stmt->bindParam(':alamat', $data['alamat']);
    $stmt->bindParam(':nama_kepala', $data['nama_kepala']);
    $stmt->bindParam(':jumlah_murid', $data['jumlah_murid']);
    $stmt->bindParam(':jumlah_pengajar', $data['jumlah_pengajar']);

    return $stmt->execute();
  }

  public function updateStatus($id, $data)
  {
    $query = "UPDATE lembaga_mdt SET status = :status, keterangan = :keterangan WHERE id = :id";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':status', $data['status']);
    $stmt->bindParam(':keterangan', $data['keterangan']);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
  }

  // Soft delete a record by ID (if applicable)
  public function softDelete($id)
  {
    $stmt = $this->db->prepare("UPDATE lembaga_mdt SET deleted_at = NOW() WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    return $stmt->execute();
  }

  // Add a new lembaga_mdt record
  public function add($data)
  {
    $query = "INSERT INTO lembaga_mdt (lembaga, nomor_statistik, alamat, nama_kepala, jumlah_murid, jumlah_pengajar) 
                  VALUES (:lembaga, :nomor_statistik, :alamat, :nama_kepala, :jumlah_murid, :jumlah_pengajar)";
    $stmt = $this->db->prepare($query);
    $stmt->bindParam(':lembaga', $data['lembaga']);
    $stmt->bindParam(':nomor_statistik', $data['nomor_statistik']);
    $stmt->bindParam(':alamat', $data['alamat']);
    $stmt->bindParam(':nama_kepala', $data['nama_kepala']);
    $stmt->bindParam(':jumlah_murid', $data['jumlah_murid']);
    $stmt->bindParam(':jumlah_pengajar', $data['jumlah_pengajar']);

    return $stmt->execute();
  }
}