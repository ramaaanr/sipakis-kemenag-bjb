<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Config\Database;

use PDO;

class LaporanController
{
    protected $db;


    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function laporanLembaga()
    {
        $sql = "SELECT lp.*, k.nama AS nama_kecamatan, jlp.nama AS jenis_lembaga
                FROM lembaga_pendidikan lp
                LEFT JOIN kecamatan k ON lp.kecamatan_id = k.id
                LEFT JOIN jenis_lembaga_pendidikan jlp ON lp.jenis_lembaga_pendidikan_id = jlp.id
                WHERE lp.deleted_at IS NULL";
        return $this->fetchData($sql);
    }

    public function laporanMurid()
    {
        $sql = "SELECT m.*, lp.nama AS nama_lembaga
                FROM murid m
                LEFT JOIN lembaga_pendidikan lp ON m.lembaga_pendidikan_id = lp.id
                WHERE m.deleted_at IS NULL";
        return $this->fetchData($sql);
    }

    public function laporanStaff()
    {
        $sql = "SELECT s.*, js.nama AS jabatan, lp.nama AS nama_lembaga
                FROM staff s
                LEFT JOIN jabatan_staff js ON s.jabatan_staff_id = js.id
                LEFT JOIN lembaga_pendidikan lp ON s.lembaga_pendidikan_id = lp.id
                WHERE s.deleted_at IS NULL";
        return $this->fetchData($sql);
    }

    public function laporanStaffPerLembaga($lembagaId)
    {
        $sql = "SELECT s.*, js.nama AS jabatan
                FROM staff s
                LEFT JOIN jabatan_staff js ON s.jabatan_staff_id = js.id
                WHERE s.deleted_at IS NULL AND s.lembaga_pendidikan_id = :lembagaId";
        return $this->fetchData($sql, ['lembagaId' => $lembagaId]);
    }

    public function laporanMuridPerJenjang()
    {
        $sql = "SELECT lp.jenjang, COUNT(m.id) AS total_murid
                FROM murid m
                INNER JOIN lembaga_pendidikan lp ON m.lembaga_pendidikan_id = lp.id
                WHERE m.deleted_at IS NULL
                GROUP BY lp.jenjang";
        return $this->fetchData($sql);
    }

    public function laporanJumlahLembagaPerKecamatan()
    {
        $sql = "SELECT k.nama AS nama_kecamatan, COUNT(lp.id) AS total_lembaga
                FROM lembaga_pendidikan lp
                LEFT JOIN kecamatan k ON lp.kecamatan_id = k.id
                WHERE lp.deleted_at IS NULL
                GROUP BY k.id";
        return $this->fetchData($sql);
    }

    public function laporanJumlahMuridPerLembaga()
    {
        $sql = "SELECT lp.nama AS nama_lembaga, COUNT(m.id) AS total_murid
                FROM murid m
                LEFT JOIN lembaga_pendidikan lp ON m.lembaga_pendidikan_id = lp.id
                WHERE m.deleted_at IS NULL
                GROUP BY lp.id";
        return $this->fetchData($sql);
    }

    public function laporanOperatorPerLembaga()
    {
        $sql = "SELECT lp.nama AS nama_lembaga, COUNT(olp.user_id) AS total_operator
                FROM operator_lembaga_pendidikan olp
                LEFT JOIN lembaga_pendidikan lp ON olp.lembaga_pendidikan_id = lp.id
                WHERE olp.deleted_at IS NULL
                GROUP BY lp.id";
        return $this->fetchData($sql);
    }

    // Helper
    private function fetchData($sql, $params = [])
    {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'status' => true,
            'message' => 'Data berhasil diambil',
            'data' => $results
        ];
    }
}