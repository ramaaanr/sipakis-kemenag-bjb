<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Model\User;
use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;

class Auth
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new User();
        SessionHelper::startSession();
    }
    public function login()
    {
        // Check if user is already logged in
        if (SessionHelper::isUserLoggedIn()) {
            header('Location: /dashboard');
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userModel->getuserByUsername($username);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['id_user'] = $user['id'];
                $_SESSION['user_username'] = $user['username'];
                $_SESSION['role'] = 'user';

                // Redirect to dashboard and set success message
                $success = 'Login berhasil!';
                include __DIR__ . '/../View/Admin/login.php';
                echo "<script>
                Swal.fire({
                  icon: 'success',
                  title: '$success',
                  showConfirmButton: false,
                  timer: 2000
                }).then(function() {
                  window.location.href = '/dashboard';
                });
                </script>";
                exit();
            } else {
                $error = 'Username atau password salah';
                echo "<script>
                Swal.fire({
                  icon: 'error',
                  title: 'Login gagal!',
                  text: '$error',
                  showConfirmButton: true,
                });
                </script>";
            }
        } else {
            include __DIR__ . '/../View/Admin/login.php';
        }
    }


    public function logout()
    {
        // Destroy the session
        session_destroy();

        // Redirect to login
        header('Location: /auth/login');
        exit();
    }

    public function dashboard()
    {
        if (!SessionHelper::isuserLoggedIn()) {
            header('Location: /auth/login');
            exit();
        }

        $username = SessionHelper::getUsername();
        include __DIR__ . '/../View/Admin/dashboard.php';
    }
}