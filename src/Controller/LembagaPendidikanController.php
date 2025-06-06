<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\LembagaPendidikan;
use Exception;
use Sfy\AplikasiDataKemenagPAI\Model\Kecamatan;

class LembagaPendidikanController
{
    private $LembagaPendidikan;

    public function __construct()
    {
        $this->LembagaPendidikan = new LembagaPendidikan();
        $this->LembagaPendidikan = new Kecamatan();
    }

    public function index(): string
    {
        try {
            $data = $this->LembagaPendidikan->getAll();
            return ResponseFormatter::success('Data Lembaga Pendidikan berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->LembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Lembaga Pendidikan tidak ditemukan');
            }
            return ResponseFormatter::success('Data Lembaga Pendidikan ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $nama = $request['nama'] ?? '';

            if (!$nama) {
                return ResponseFormatter::error('Nama Lembaga Pendidikan wajib diisi');
            }

            $kecamatan = $$created = $this->LembagaPendidikan->create([
                'nama' => $nama
            ]);

            return $created
                ? ResponseFormatter::success('Lembaga Pendidikan berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $data = $this->LembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Lembaga Pendidikan tidak ditemukan');
            }

            $nama = $request['nama'] ?? '';

            if (!$nama) {
                return ResponseFormatter::error('Nama Lembaga Pendidikan wajib diisi');
            }

            $updated = $this->LembagaPendidikan->update($id, [
                'nama' => $nama
            ]);

            return $updated
                ? ResponseFormatter::success('Lembaga Pendidikan berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->LembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Lembaga Pendidikan tidak ditemukan');
            }

            $deleted = $this->LembagaPendidikan->delete($id);

            return $deleted
                ? ResponseFormatter::success('Lembaga Pendidikan berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}