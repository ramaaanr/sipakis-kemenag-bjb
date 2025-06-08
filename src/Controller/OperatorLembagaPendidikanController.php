<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\OperatorLembagaPendidikan;
use Exception;
use Sfy\AplikasiDataKemenagPAI\Model\LembagaPendidikan;
use Sfy\AplikasiDataKemenagPAI\Model\Users;

class OperatorLembagaPendidikanController
{
    private $OperatorLembagaPendidikan;
    private $LembagaPendidikan;
    private $Users;

    public function __construct()
    {
        $this->OperatorLembagaPendidikan = new OperatorLembagaPendidikan();
        $this->LembagaPendidikan = new LembagaPendidikan();
        $this->Users = new Users();
    }

    public function index(): string
    {
        try {
            $data = $this->OperatorLembagaPendidikan->getAllWithRelations();
            return ResponseFormatter::success('Data Operator Lembaga Pendidikan berhasil diambil', $data);
        } catch (Exception $e) {
            return ResponseFormatter::error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function show(int $id): string
    {
        try {
            $data = $this->OperatorLembagaPendidikan->getByWithRelations(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Operator Lembaga Pendidikan tidak ditemukan');
            }
            return ResponseFormatter::success('Data Operator Lembaga Pendidikan ditemukan', $data);
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
            $users = $this->Users->getBy(['id' => $request['user_id']]);

            if (!$users) {
                return ResponseFormatter::error('Pengguna Tidak Ditemukan');
            }

            if ($users['role'] !== 'operator') {
                return ResponseFormatter::error('Pengguna harus memiliki peran sebagai Operator Lembaga Pendidikan');
            }

            $operatorFounded = $this->OperatorLembagaPendidikan->getBy(['user_id' => $request['user_id']]);

            if ($operatorFounded) {
                return ResponseFormatter::error('Pengguna sudah menjadi Operator Lembaga Pendidikan');
            }

            $created = $this->OperatorLembagaPendidikan->create([
                'user_id' => $request['user_id'],
                'lembaga_pendidikan_id' => $request['lembaga_pendidikan_id'],

            ]);
            return $created
                ? ResponseFormatter::success('Operator Lembaga Pendidikan berhasil ditambahkan')
                : ResponseFormatter::error('Gagal menambahkan Operator Lembaga Pendidikan');
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
            $users = $this->Users->getBy(['id' => $request['user_id']]);

            if (!$users) {
                return ResponseFormatter::error('Pengguna Tidak Ditemukan');
            }

            if ($users['role'] !== 'operator') {
                return ResponseFormatter::error('Pengguna harus memiliki peran sebagai Operator Lembaga Pendidikan');
            }

            $operatorFounded = $this->OperatorLembagaPendidikan->getAll(['user_id' => $request['user_id']]);

            if (count($operatorFounded) >= 1) {
                return ResponseFormatter::error('Pengguna sudah menjadi Operator Lembaga Pendidikan');
            }

            $updated = $this->OperatorLembagaPendidikan->update($id, [
                'user_id' => $request['user_id'],
                'lembaga_pendidikan_id' => $request['lembaga_pendidikan_id'],
            ]);

            return $updated
                ? ResponseFormatter::success('Operator Lembaga Pendidikan berhasil diperbarui')
                : ResponseFormatter::error('Gagal memperbarui Operator Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy(int $id): string
    {
        try {
            $data = $this->OperatorLembagaPendidikan->getBy(['id' => $id]);
            if (!$data) {
                return ResponseFormatter::error('Operator Lembaga Pendidikan tidak ditemukan');
            }

            $deleted = $this->OperatorLembagaPendidikan->delete($id);

            return $deleted
                ? ResponseFormatter::success('Operator Lembaga Pendidikan berhasil dihapus')
                : ResponseFormatter::error('Gagal menghapus Operator Lembaga Pendidikan');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}