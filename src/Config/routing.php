<?php

use Sfy\AplikasiDataKemenagPAI\Controller\AuthController;
use Sfy\AplikasiDataKemenagPAI\Controller\KecamatanController;

return function () {
    header('Content-Type: application/json');

    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    $controller = strtolower($parts[0] ?? 'auth');
    $param = $parts[1] ?? null;
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    // Ambil request body untuk PUT/PATCH/DELETE
    $inputData = in_array($httpMethod, ['PUT', 'PATCH', 'DELETE'])
        ? json_decode(file_get_contents('php://input'), true) ?? []
        : ($_POST ?: $_GET);

    switch ($controller) {
        case 'auth':
            $authController = new AuthController();

            switch ($param) {
                case 'login':
                    if ($httpMethod !== 'POST') {
                        http_response_code(405);
                        echo json_encode([
                            'status' => false,
                            'message' => 'Metode HTTP harus POST untuk login',
                        ]);
                        break 2;
                    }
                    echo $authController->login($inputData);
                    break;

                case 'register':
                    if ($httpMethod !== 'POST') {
                        http_response_code(405);
                        echo json_encode([
                            'status' => false,
                            'message' => 'Metode HTTP harus POST untuk register',
                        ]);
                        break 2;
                    }
                    echo $authController->register($inputData);
                    break;

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
                        'message' => "Halaman '$param' tidak ditemukan pada controller Auth.",
                    ]);
                    break;
            }
            break;

        case 'kecamatan':
            $kecamatanController = new KecamatanController();

            if (!$param) {
                // /kecamatan
                if ($httpMethod === 'GET') {
                    echo $kecamatanController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $kecamatanController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode([
                        'status' => false,
                        'message' => "Metode $httpMethod tidak didukung untuk /kecamatan",
                    ]);
                }
            } else {
                $id = (int) $param;
                // /kecamatan/{id}
                switch ($httpMethod) {
                    case 'GET':
                        echo $kecamatanController->show($id);
                        break;
                    case 'POST':
                        echo $kecamatanController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $kecamatanController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode([
                            'status' => false,
                            'message' => "Metode $httpMethod tidak diizinkan untuk /kecamatan/$id",
                        ]);
                        break;
                }
            }
            break;



        // ✅ [ROUTE_REGISTER_MARKER]

        default:
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => "Ups, controller '$controller' tidak ditemukan.",
            ]);
            break;
    }
};