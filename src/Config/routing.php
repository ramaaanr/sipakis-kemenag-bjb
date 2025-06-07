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






        // 🏁 Controller $JabatanStaff DIMULAI 

        case 'jabatan-staff':
            $JabatanStaffController = new \Sfy\AplikasiDataKemenagPAI\Controller\JabatanStaffController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $JabatanStaffController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $JabatanStaffController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $JabatanStaffController->show($id);
                        break;
                    case 'POST':
                        echo $JabatanStaffController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $JabatanStaffController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk JabatanStaff/$id"]);
                        break;
                }
            }
            break;

        // 🏁 Controller $LembagaPendidikan DIMULAI 

        case 'lembaga-pendidikan':
            $LembagaPendidikanController = new \Sfy\AplikasiDataKemenagPAI\Controller\LembagaPendidikanController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $LembagaPendidikanController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $LembagaPendidikanController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $LembagaPendidikanController->show($id);
                        break;
                    case 'POST':
                        echo $LembagaPendidikanController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $LembagaPendidikanController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk LembagaPendidikan/$id"]);
                        break;
                }
            }
            break;

        // 🏁 Controller $JenisLembagaPendidikan DIMULAI 

        case 'jenis-lembaga-pendidikan':
            $JenisLembagaPendidikanController = new \Sfy\AplikasiDataKemenagPAI\Controller\JenisLembagaPendidikanController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $JenisLembagaPendidikanController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $JenisLembagaPendidikanController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $JenisLembagaPendidikanController->show($id);
                        break;
                    case 'POST':
                        echo $JenisLembagaPendidikanController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $JenisLembagaPendidikanController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk JenisLembagaPendidikan/$id"]);
                        break;
                }
            }
            break;

        // 🏁 Controller $OperatorLembagaPendidikan DIMULAI 

        case 'operator-lembaga-pendidikan':
            $OperatorLembagaPendidikanController = new \Sfy\AplikasiDataKemenagPAI\Controller\OperatorLembagaPendidikanController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $OperatorLembagaPendidikanController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $OperatorLembagaPendidikanController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $OperatorLembagaPendidikanController->show($id);
                        break;
                    case 'POST':
                        echo $OperatorLembagaPendidikanController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $OperatorLembagaPendidikanController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk OperatorLembagaPendidikan/$id"]);
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