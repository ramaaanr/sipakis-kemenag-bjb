<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\JenisLembagaPendidikan;
use Exception;

class JenisLembagaPendidikanController
{
    private $JenisLembagaPendidikan;

    public function __construct()
    {
        $this->JenisLembagaPendidikan = new JenisLembagaPendidikan();
    }

    public function index(): string
    {
        try {
            $data = $this->JenisLembagaPendidikan->getAll();
            return ResponseFormatter::success('Data Jenis Lembaga Pendidikan berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->JenisLembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jenis Lembaga Pendidikan tidak ditemukan');
            }
            return ResponseFormatter::success('Data Jenis Lembaga Pendidikan ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';
            if (!$nama) {
                return ResponseFormatter::error('Nama Jenis Lembaga Pendidikan wajib diisi');
            }

            $created = $this->JenisLembagaPendidikan->create([
                'nama' => $nama
            ]);

            return $created
                ? ResponseFormatter::success('Jenis Lembaga Pendidikan berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Jenis Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $data = $this->JenisLembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jenis Lembaga Pendidikan tidak ditemukan');
            }

            $nama = $request['nama'] ?? '';

            if (!$nama) {
                return ResponseFormatter::error('Nama Jenis Lembaga Pendidikan wajib diisi');
            }

            $updated = $this->JenisLembagaPendidikan->update($id, [
                'nama' => $nama
            ]);

            return $updated
                ? ResponseFormatter::success('Jenis Lembaga Pendidikan berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Jenis Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->JenisLembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Jenis Lembaga Pendidikan tidak ditemukan');
            }

            $deleted = $this->JenisLembagaPendidikan->delete($id);

            return $deleted
                ? ResponseFormatter::success('Jenis Lembaga Pendidikan berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Jenis Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}