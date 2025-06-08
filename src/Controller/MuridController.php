<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\Murid;
use Sfy\AplikasiDataKemenagPAI\Model\LembagaPendidikan;
use Exception;

class MuridController
{
    private $Murid;
    private $LembagaPendidikan;

    public function __construct()
    {
        $this->Murid = new Murid();
        $this->LembagaPendidikan = new LembagaPendidikan();
    }

    public function index(): string
    {
        try {
            if ($_GET['lembaga_pendidikan_id'] ?? false) {
                $data = $this->Murid->getAll(['lembaga_pendidikan_id' => $_GET['lembaga_pendidikan_id']]);
                if (!$data) {
                    return ResponseFormatter::error('Data Murid tidak ditemukan untuk lembaga pendidikan ini');
                }
            } else {
                $data = $this->Murid->getAll();
            }
            return ResponseFormatter::success('Data Murid berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->Murid->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Murid tidak ditemukan');
            }
            return ResponseFormatter::success('Data Murid ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $lembagaId = $request['lembaga_pendidikan_id'] ?? null;

            // Cek apakah lembaga_pendidikan_id valid
            $lembagaPendidikan = $this->LembagaPendidikan->getBy(['id' => $request['lembaga_pendidikan_id']]);

            if (!$lembagaPendidikan) {
                return ResponseFormatter::error('Lembaga Pendidikan Tidak Ditemukan');
            }

            $created = $this->Murid->create([
                'lembaga_pendidikan_id' => $lembagaId,
                'nama' => $request['nama'] ?? '',
                'alamat' => $request['alamat'] ?? '',
                'tempat_tanggal_lahir' => $request['tempat_tanggal_lahir'] ?? '',
                'rombel_kelas' => $request['rombel_kelas'] ?? '',
                'tingkat' => $request['tingkat'] ?? '',
                'nisn' => $request['nisn'] ?? '',
                'jenis_kelamin' => $request['jenis_kelamin'] ?? ''
            ]);

            return $created
                ? ResponseFormatter::success('Murid berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Murid');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $lembagaId = $request['lembaga_pendidikan_id'] ?? null;

            // Cek apakah lembaga_pendidikan_id valid
            $lembagaPendidikan = $this->LembagaPendidikan->getBy(['id' => $request['lembaga_pendidikan_id']]);

            if (!$lembagaPendidikan) {
                return ResponseFormatter::error('Lembaga Pendidikan Tidak Ditemukan');
            }
            $updated = $this->Murid->update($id, [
                'lembaga_pendidikan_id' => $lembagaId,
                'nama' => $request['nama'] ?? '',
                'alamat' => $request['alamat'] ?? '',
                'tempat_tanggal_lahir' => $request['tempat_tanggal_lahir'] ?? '',
                'rombel_kelas' => $request['rombel_kelas'] ?? '',
                'tingkat' => $request['tingkat'] ?? '',
                'nisn' => $request['nisn'] ?? '',
                'jenis_kelamin' => $request['jenis_kelamin'] ?? ''
            ]);

            return $updated
                ? ResponseFormatter::success('Murid berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Murid');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }


    public function destroy(int $id): string
    {
        try {
            $data = $this->Murid->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Murid tidak ditemukan');
            }

            $deleted = $this->Murid->delete($id);

            return $deleted
                ? ResponseFormatter::success('Murid berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Murid');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}