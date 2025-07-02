<?php

use Sfy\AplikasiDataKemenagPAI\Controller\AuthController;
use Sfy\AplikasiDataKemenagPAI\Controller\KecamatanController;
use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Helpers\ViewHelper;
use Sfy\AplikasiDataKemenagPAI\Middlewares\Middleware;
use Sfy\AplikasiDataKemenagPAI\Model\JabatanStaff;
use Sfy\AplikasiDataKemenagPAI\Model\JenisLembagaPendidikan;
use Sfy\AplikasiDataKemenagPAI\Model\Kecamatan;
use Sfy\AplikasiDataKemenagPAI\Model\LembagaPendidikan;
use Sfy\AplikasiDataKemenagPAI\Model\Murid;
use Sfy\AplikasiDataKemenagPAI\Model\OperatorLembagaPendidikan;
use Sfy\AplikasiDataKemenagPAI\Model\staff;
use Sfy\AplikasiDataKemenagPAI\Model\Users;

return function () {

    $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $parts = explode('/', $uri);
    $controller = strtolower($parts[0] ?? 'auth');
    $param = $parts[1] ?? null;
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    // Ambil request body untuk PUT/PATCH/DELETE
    $rawInput = file_get_contents('php://input');
    $isJson = isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'application/json');

    $inputData = $isJson
        ? json_decode($rawInput, true)
        : ($_POST ?: $_GET);


    switch ($controller) {
        case '':
            if ($httpMethod === 'GET') {
                ViewHelper::render('Login.index');
            }
            break;
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
                    Middleware::Auth();
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
        case 'dashboard':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Dashboard.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /dashboard",
                ]);
            }
            break;
        // 🖨️ Cetak data laporan
        case 'laporan':
            Middleware::Auth();
            $LaporanController = new \Sfy\AplikasiDataKemenagPAI\Controller\LaporanController();

            switch ($param) {
                case 'lembaga':
                    $data = $LaporanController->laporanLembaga();
                    var_dump($data);
                    break;

                case 'murid':
                    echo $LaporanController->laporanMurid();
                    break;

                case 'staff':
                    echo $LaporanController->laporanStaff();
                    break;

                case 'staff-per-lembaga':
                    $lembagaId = $_GET['lembaga_id'] ?? null;
                    if (!$lembagaId) {
                        echo json_encode([
                            'status' => false,
                            'message' => 'Parameter lembaga_id wajib diisi.'
                        ]);
                    } else {
                        echo $LaporanController->laporanStaffPerLembaga($lembagaId);
                    }
                    break;

                case 'murid-per-jenjang':
                    echo $LaporanController->laporanMuridPerJenjang();
                    break;

                case 'jumlah-lembaga-per-kecamatan':
                    echo $LaporanController->laporanJumlahLembagaPerKecamatan();
                    break;

                case 'jumlah-murid-per-lembaga':
                    echo $LaporanController->laporanJumlahMuridPerLembaga();
                    break;

                case 'operator-per-lembaga':
                    echo $LaporanController->laporanOperatorPerLembaga();
                    break;

                default:
                    http_response_code(404);
                    echo json_encode([
                        'status' => false,
                        'message' => "Endpoint laporan '$param' tidak ditemukan."
                    ]);
                    break;
            }
            break;



        case 'lembaga-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Lembaga.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /lembaga-show",
                ]);
            }
            break;
        case 'lembaga-admin-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Lembaga.admin-index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /lembaga-show",
                ]);
            }
            break;

        case 'operator-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Operator.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /operator-show",
                ]);
            }
            break;

        case 'jenis-lembaga-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('JenisLembaga.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /jenis-lembaga-show",
                ]);
            }
            break;

        case 'murid-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Murid.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /murid-show",
                ]);
            }
            break;

        case 'staff-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Staff.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /staff-show",
                ]);
            }
            break;

        case 'jabatan-staff-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('JabatanStaff.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /jabatan-staff-show",
                ]);
            }
            break;

        case 'kecamatan-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Kecamatan.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /kecamatan-show",
                ]);
            }
            break;

        case 'user-show':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                ViewHelper::render('User.index');
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /user-show",
                ]);
            }
            break;


        case 'kecamatan':
            Middleware::Auth();
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
            Middleware::Auth();

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
            Middleware::Auth();

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
            Middleware::Auth();

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
            Middleware::Auth();

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
        // 🖨️ Cetak data lembaga
        case 'lembaga-cetak':
            Middleware::Auth();


            if ($httpMethod === 'GET') {
                $model = new LembagaPendidikan();
                $data = $model->getAll();
                ViewHelper::render('Lembaga.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /lembaga-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data jenis lembaga pendidikanopera
        case 'jenis-lembaga-cetak':
            Middleware::Auth();

            $model = new JenisLembagaPendidikan();
            $data = $model->getAll();
            if ($httpMethod === 'GET') {
                ViewHelper::render('JenisLembaga.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /jenis-lembaga-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data operator lembaga pendidikan
        case 'operator-cetak':
            Middleware::Auth();
            if ($httpMethod === 'GET') {

                $model = new OperatorLembagaPendidikan();
                $data = $model->getAllWithRelations();
                ViewHelper::render('Operator.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /operator-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data kecamatan
        case 'kecamatan-cetak':
            Middleware::Auth();
            if ($httpMethod === 'GET') {

                $model = new Kecamatan();
                $data = $model->getAll();
                ViewHelper::render('Kecamatan.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /kecamatan-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data jabatan staff
        case 'jabatan-staff-cetak':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                $model = new JabatanStaff();
                $data = $model->getAll();
                ViewHelper::render('JabatanStaff.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /jabatan-staff-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data staff
        case 'staff-cetak':
            Middleware::Auth();

            $model = new staff();
            $data = $model->getAll();
            if ($httpMethod === 'GET') {
                ViewHelper::render('Staff.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /staff-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data murid
        case 'murid-cetak':
            Middleware::Auth();
            if ($httpMethod === 'GET') {

                $model = new Murid();
                $data = $model->getAll();
                ViewHelper::render('Murid.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /murid-cetak",
                ]);
            }
            break;

        // 🖨️ Cetak data user
        case 'user-cetak':
            Middleware::Auth();
            if ($httpMethod === 'GET') {
                $model = new Users();
                $data = $model->getAll();
                ViewHelper::render('User.cetak', $data);
            } else {
                http_response_code(405);
                echo json_encode([
                    'status' => false,
                    'message' => "Metode $httpMethod tidak didukung untuk /user-cetak",
                ]);
            }
            break;


        // 🏁 Controller $staff DIMULAI 

        case 'staff':
            Middleware::Auth();

            $staffController = new \Sfy\AplikasiDataKemenagPAI\Controller\StaffController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $staffController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $staffController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $staffController->show($id);
                        break;
                    case 'POST':
                        echo $staffController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $staffController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk staff/$id"]);
                        break;
                }
            }
            break;

        // 🏁 Controller $murid DIMULAI 

        case 'murid':
            Middleware::Auth();

            $muridController = new \Sfy\AplikasiDataKemenagPAI\Controller\MuridController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $muridController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $muridController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $muridController->show($id);
                        break;
                    case 'POST':
                        echo $muridController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $muridController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk murid/$id"]);
                        break;
                }
            }
            break;

        // 🏁 Controller $User DIMULAI 

        case 'user-operator':
            $UserController = new \Sfy\AplikasiDataKemenagPAI\Controller\UserController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $UserController->showAvaliableOperator();
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            }
            break;

        case 'user':
            $UserController = new \Sfy\AplikasiDataKemenagPAI\Controller\UserController();

            if (!$param) {
                if ($httpMethod === 'GET') {
                    echo $UserController->index();
                } elseif ($httpMethod === 'POST') {
                    echo $UserController->store($inputData);
                } else {
                    http_response_code(405);
                    echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak didukung."]);
                }
            } else {
                $id = (int) $param;
                switch ($httpMethod) {
                    case 'GET':
                        echo $UserController->show($id);
                        break;
                    case 'POST':
                        echo $UserController->update($id, $inputData);
                        break;
                    case 'DELETE':
                        echo $UserController->destroy($id);
                        break;
                    default:
                        http_response_code(405);
                        echo json_encode(['status' => false, 'message' => "Method $httpMethod tidak diizinkan untuk User/$id"]);
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