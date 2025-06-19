<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Helpers\ResponseFormatter;
use Sfy\AplikasiDataKemenagPAI\Model\Users;
use Exception;

class AuthController
{
    private Users $users;

    public function __construct()
    {
        $this->users = new Users();
        SessionHelper::startSession();
    }

    public function login(array $request): string
    {
        try {
            $username = $request['username'] ?? '';
            $password = $request['password'] ?? '';

            if (!$username || !$password) {
                return ResponseFormatter::error('Username dan password wajib diisi');
            }

            $users = $this->users->getUserForLogin($username);
            if (!$users || !password_verify($password, $users['password'])) {
                return ResponseFormatter::error('Username atau password salah');
            }

            $_SESSION['user'] = [
                'id'       => $users['id'],
                'username' => $users['username'],
                'role'     => $users['role']
            ];

            return ResponseFormatter::success('Berhasil login', $_SESSION['user']);
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan saat login: ' . $e->getMessage());
        }
    }

    public function register(array $request): string
    {
        try {
            $username = $request['username'] ?? '';
            $password = $request['password'] ?? '';
            $role     = $request['role'] ?? 'user';

            if (!$username || !$password) {
                return ResponseFormatter::error('Username dan password wajib diisi');
            }

            $existing = $this->users->getBy(['username' => $username]);
            if ($existing) {
                return ResponseFormatter::error('Username sudah terdaftar');
            }

            $success = $this->users->create([
                'username' => $username,
                'password' => $password,
                'role'     => $role
            ]);

            return $success
                ? ResponseFormatter::success('Berhasil register')
                : ResponseFormatter::error('Gagal register');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan saat register: ' . $e->getMessage());
        }
    }

    public function logout(): string
    {
        try {
            if (!SessionHelper::isLoggedIn()) {
                return ResponseFormatter::error('Tidak ada sesi login yang aktif');
            }

            SessionHelper::destroy();
            return ResponseFormatter::success('Berhasil logout');
        } catch (Exception $e) {
            return ResponseFormatter::error('Terjadi kesalahan saat logout: ' . $e->getMessage());
        }
    }
}