<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\Kecamatan;
use Exception;

class KecamatanController
{
    private Kecamatan $Kecamatan;

    public function __construct()
    {
        $this->Kecamatan = new Kecamatan();
    }

    public function index(): string
    {
        try {
            $data = $this->Kecamatan->getAll();
            return ResponseFormatter::success('Data Kecamatan berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->Kecamatan->getBy(['id' => $id]);;
            if (!$data) {
                return ResponseFormatter::error('Kecamatan tidak ditemukan');
            }
            return ResponseFormatter::success('Data Kecamatan ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';

            if (!$nama) {
                return ResponseFormatter::error('Nama Kecamatan wajib diisi');
            }

            $created = $this->Kecamatan->create([
                'nama' => $nama
            ]);

            return $created
                ? ResponseFormatter::success('Kecamatan berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Kecamatan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';
            if (!$nama) {
                return ResponseFormatter::error('Nama Kecamatan wajib diisi');
            }

            $updated = $this->Kecamatan->update($id, [
                'nama' => $nama
            ]);

            return $updated
                ? ResponseFormatter::success('Kecamatan berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Kecamatan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $deleted = $this->Kecamatan->delete($id);

            return $deleted
                ? ResponseFormatter::success('Kecamatan berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Kecamatan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}