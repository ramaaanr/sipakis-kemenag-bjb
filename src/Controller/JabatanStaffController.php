<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\JabatanStaff;
use Exception;

class JabatanStaffController
{
    private $JabatanStaff;

    public function __construct()
    {
        $this->JabatanStaff = new JabatanStaff();
    }

    public function index(): string
    {
        try {
            $data = $this->JabatanStaff->getAll();
            return ResponseFormatter::success('Data Jabatan Staff berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->JabatanStaff->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jabatan Staff tidak ditemukan');
            }
            return ResponseFormatter::success('Data Jabatan Staff ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';

            if (!$nama) {
                return ResponseFormatter::error('Nama Jabatan Staff wajib diisi');
            }

            $created = $this->JabatanStaff->create([
                'nama' => $nama
            ]);

            return $created
                ? ResponseFormatter::success('Jabatan Staff berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Jabatan Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';
            $data = $this->JabatanStaff->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jabatan Staff tidak ditemukan');
            }
            if (!$nama) {
                return ResponseFormatter::error('Nama Jabatan Staff wajib diisi');
            }

            $updated = $this->JabatanStaff->update($id, [
                'nama' => $nama
            ]);

            return $updated
                ? ResponseFormatter::success('Jabatan Staff berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Jabatan Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->JabatanStaff->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jabatan Staff tidak ditemukan');
            }
            $deleted = $this->JabatanStaff->delete($id);

            return $deleted
                ? ResponseFormatter::success('Jabatan Staff berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Jabatan Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}