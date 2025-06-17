<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\Users;
use Exception;

class UserController
{
    private $User;

    public function __construct()
    {
        $this->User = new Users();
    }

    public function index(): string
    {
        try {
            $data = $this->User->getAll();
            return ResponseFormatter::success('Data User berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->User->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('User tidak ditemukan');
            }
            return ResponseFormatter::success('Data User ditemukan', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(array $request): string
    {
        try {
            $created = $this->User->create([
                'username' => $request["username"],
                'password' => $request["password"],
                'role' => $request["role"],
            ]);

            return $created
                ? ResponseFormatter::success('User berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan User');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function update(int $id, array $request): string
    {
        try {
            $data = $this->User->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('User tidak ditemukan');
            }

            $updated = $this->User->update($id, [
                'username' => $request["username"],
                'password' => $request["password"],
                'role' => $request["role"],
            ]);

            return $updated
                ? ResponseFormatter::success('User berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui User');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->User->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('User tidak ditemukan');
            }

            $deleted = $this->User->delete($id);

            return $deleted
                ? ResponseFormatter::success('User berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus User');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
