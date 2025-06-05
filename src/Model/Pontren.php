<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use PDOException;

class Pontren
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
    lembaga_pontren.id,
    lembaga_pontren.nspp,
    lembaga_pontren.npsn,
    lembaga_pontren.nama_lembaga,
    lembaga_pontren.grup,
    lembaga_pontren.jenjang,
    lembaga_pontren.kecamatan_id,
    kecamatan.nama_kecamatan,
    lembaga_pontren.alamat,
    lembaga_pontren.jumlah_santri_pria,
    lembaga_pontren.jumlah_santri_wanita,
    lembaga_pontren.jumlah_keseluruhan,
    lembaga_pontren.deleted_at,
    lembaga_pontren.status,
    lembaga_pontren.keterangan
FROM 
    lembaga_pontren
JOIN 
    kecamatan ON lembaga_pontren.kecamatan_id = kecamatan.id
 WHERE lembaga_pontren.deleted_at IS NULL AND lembaga_pontren.status $operator 'DISETUJUI' ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get a single record by ID
    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM lembaga_pontren WHERE id = :id AND deleted_at IS NULL");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Update a record by ID
    public function edit($id, $data)
    {
        // Extract and quote the necessary data
        $nspp = $this->db->quote($data['nspp']);
        $status = $this->db->quote($data['status']);
        $npsn = $this->db->quote($data['npsn']);
        $nama_lembaga = $this->db->quote($data['nama_lembaga']);
        $grup = $this->db->quote($data['grup']);
        $jenjang = $this->db->quote($data['jenjang']);
        $kecamatan_id = $this->db->quote($data['kecamatan_id']);
        $alamat = $this->db->quote($data['alamat']);
        $jumlah_santri_pria = $this->db->quote($data['jumlah_santri_pria']);
        $jumlah_santri_wanita = $this->db->quote($data['jumlah_santri_wanita']);
        $jumlah_keseluruhan = $this->db->quote($data['jumlah_keseluruhan']);

        // Prepare the SQL query
        $sql = "UPDATE lembaga_pontren SET nspp = $nspp, npsn = $npsn, status = $status, nama_lembaga = $nama_lembaga, grup = $grup, jenjang = $jenjang, kecamatan_id = $kecamatan_id, alamat = $alamat, jumlah_santri_pria = $jumlah_santri_pria, jumlah_santri_wanita = $jumlah_santri_wanita, jumlah_keseluruhan = $jumlah_keseluruhan WHERE id = $id";

        // Bind and execute the query
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        // Return the query for debugging purposes
        return $sql;
    }
    public function updateStatus($id, $data)
    {
        $query = "UPDATE lembaga_pontren SET status = :status, keterangan = :keterangan WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':status', $data['status']);
        $stmt->bindParam(':keterangan', $data['keterangan']);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    // Soft delete a record by ID
    public function softDelete($id)
    {
        $stmt = $this->db->prepare("UPDATE lembaga_pontren SET deleted_at = NOW() WHERE id = :id");
        $stmt->bindParam(':id', $id);

        return $stmt->execute();
    }

    // Add a new lembaga_pontren record
    public function add($data)
    {
        $query = "INSERT INTO lembaga_pontren (nspp, npsn, nama_lembaga, grup, jenjang, kecamatan_id, alamat, jumlah_santri_pria, jumlah_santri_wanita, jumlah_keseluruhan) 
                  VALUES (:nspp, :npsn, :nama_lembaga, :grup, :jenjang, :kecamatan_id, :alamat, :jumlah_santri_pria, :jumlah_santri_wanita, :jumlah_keseluruhan)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nspp', $data['nspp']);
        $stmt->bindParam(':npsn', $data['npsn']);
        $stmt->bindParam(':nama_lembaga', $data['nama_lembaga']);
        $stmt->bindParam(':grup', $data['grup']);
        $stmt->bindParam(':jenjang', $data['jenjang']);
        $stmt->bindParam(':kecamatan_id', $data['kecamatan_id']);
        $stmt->bindParam(':alamat', $data['alamat']);
        $stmt->bindParam(':jumlah_santri_pria', $data['jumlah_santri_pria']);
        $stmt->bindParam(':jumlah_santri_wanita', $data['jumlah_santri_wanita']);
        $stmt->bindParam(':jumlah_keseluruhan', $data['jumlah_keseluruhan']);
        return $stmt->execute();
    }
}