<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\Staff;
use Sfy\AplikasiDataKemenagPAI\Model\LembagaPendidikan;
use Sfy\AplikasiDataKemenagPAI\Model\JabatanStaff;
use Exception;

class StaffController
{
    private $staff;
    private $LembagaPendidikan;
    private $JabatanStaff;

    public function __construct()
    {
        $this->staff = new Staff();
        $this->JabatanStaff = new JabatanStaff();
        $this->LembagaPendidikan = new LembagaPendidikan();
    }

    public function index(): string
    {
        try {
            if ($_GET['lembaga_pendidikan_id'] ?? false) {
                $data = $this->staff->getAll(['lembaga_pendidikan_id' => $_GET['lembaga_pendidikan_id']]);
                if (!$data) {
                    return ResponseFormatter::error('Data Staff tidak ditemukan untuk lembaga pendidikan ini');
                }
            } else {
                $data = $this->staff->getAll();
            }
            return ResponseFormatter::success('Data Staff berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->staff->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Staff tidak ditemukan');
            }
            return ResponseFormatter::success('Data Staff ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $lembagaPendidikan = $this->LembagaPendidikan->getBy(['id' => $request['lembaga_pendidikan_id']]);

            if (!$lembagaPendidikan) {
                return ResponseFormatter::error('Lembaga Pendidikan Tidak Ditemukan');
            }
            $jabatanStaff = $this->JabatanStaff->getBy(['id' => $request['jabatan_staff_id']]);

            if (!$jabatanStaff) {
                return ResponseFormatter::error('Jabatan Staff Tidak Ditemukan');
            }
            $created = $this->staff->create([
                'lembaga_pendidikan_id' => $request['lembaga_pendidikan_id'] ?? null,
                'jabatan_staff_id' => $request['jabatan_staff_id'] ?? null,
                'nama' => $request['nama'] ?? '',
                'alamat' => $request['alamat'] ?? '',
                'no_hp' => $request['no_hp'] ?? '',
                'email' => $request['email'] ?? '',
                'nik' => $request['nik'] ?? '',
                'jenis_kelamin' => $request['jenis_kelamin'] ?? ''
            ]);

            return $created
                ? ResponseFormatter::success('Staff berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $lembagaPendidikan = $this->LembagaPendidikan->getBy(['id' => $request['lembaga_pendidikan_id']]);

            if (!$lembagaPendidikan) {
                return ResponseFormatter::error('Lembaga Pendidikan Tidak Ditemukan');
            }
            $jabatanStaff = $this->JabatanStaff->getBy(['id' => $request['jabatan_staff_id']]);

            if (!$jabatanStaff) {
                return ResponseFormatter::error('Jabatan Staff Tidak Ditemukan');
            }
            $updated = $this->staff->update($id, [
                'lembaga_pendidikan_id' => $request['lembaga_pendidikan_id'] ?? null,
                'jabatan_staff_id' => $request['jabatan_staff_id'] ?? null,
                'nama' => $request['nama'] ?? '',
                'alamat' => $request['alamat'] ?? '',
                'no_hp' => $request['no_hp'] ?? '',
                'email' => $request['email'] ?? '',
                'nik' => $request['nik'] ?? '',
                'jenis_kelamin' => $request['jenis_kelamin'] ?? ''
            ]);;

            return $updated
                ? ResponseFormatter::success('Staff berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->staff->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Staff tidak ditemukan');
            }

            $deleted = $this->staff->delete($id);

            return $deleted
                ? ResponseFormatter::success('Staff berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Staff');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}