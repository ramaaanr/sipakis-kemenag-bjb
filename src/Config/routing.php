<?php

use Sfy\AplikasiDataKemenagPAI\Controller\AuthController;

return function () {
    header('Content-Type: application/json');

    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    $controller = strtolower($parts[0] ?? 'auth');
    $method = strtolower($parts[1] ?? 'login');
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    // Ambil input sesuai metode HTTP (POST prioritas, GET fallback)
    $request = $httpMethod === 'POST' ? $_POST : $_GET;

    switch ($controller) {
        case 'auth':
            $authController = new AuthController();

            switch ($method) {
                case 'login':
                    if ($httpMethod !== 'POST') {
                        http_response_code(405);
                        echo json_encode([
                            'status' => false,
                            'message' => 'Metode HTTP harus POST untuk login',
                        ]);
                        break 2; // keluar switch controller + method
                    }
                    echo $authController->login($request);
                    break;

                // case 'register':
                //     if ($httpMethod !== 'POST') {
                //         http_response_code(405);
                //         echo json_encode([
                //             'status' => false,
                //             'message' => 'Metode HTTP harus POST untuk registrasi',
                //         ]);
                //         break 2;
                //     }
                //     echo $authController->register($request);
                //     break;

                case 'logout':
                    if ($httpMethod !== 'POST') {
                        http_response_code(405);
                        echo json_encode([
                            'status' => false,
                            'message' => 'Metode HTTP harus POST untuk logout',
                        ]);
                        break 2;
                    }
                    echo $authController->logout();
                    break;

                default:
                    http_response_code(404);
                    echo json_encode([
                        'status' => false,
                        'message' => "Oops! Halaman '$method' tidak ditemukan di Auth.",
                    ]);
                    break;
            }
            break;

        // Controller lain bisa ditambahkan di sini, dengan pengecekan metode HTTP serupa

        default:
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => "Ups, controller '$controller' gak ada nih.",
            ]);
            break;
    }
};