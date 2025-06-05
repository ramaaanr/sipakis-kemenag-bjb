<?php

use Sfy\AplikasiDataKemenagPAI\Controller\Auth;
use Sfy\AplikasiDataKemenagPAI\Controller\DataPontren;
use Sfy\AplikasiDataKemenagPAI\Controller\DataMDT;
use Sfy\AplikasiDataKemenagPAI\Controller\DataStaffMDT;
use Sfy\AplikasiDataKemenagPAI\Controller\DataMuridMDT;

return function () {
    // Instantiate controllers
    $authController = new Auth();
    $pontrenController = new DataPontren();
    $mdtController = new DataMDT();
    $staffMdtController = new DataStaffMDT();
    $muridMdtController = new DataMuridMDT();
    // Get the requested URI and parse it
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = trim($uri, '/'); // Trim leading and trailing slashes

    // If the URI is empty, redirect to 'auth/login'
    if (empty($uri)) {
        header('Location: /auth/login');
        exit();
    }

    // Split the URI into parts
    $parts = explode('/', $uri);

    // Get the controller and method
    $controller = $parts[0] ?? 'auth';  // Default to 'auth' controller
    $method = $parts[1] ?? 'login';     // Default to 'login' method
    $id = $parts[2] ?? null;            // Get the ID if it's available

    // Route to the appropriate controller and method
    switch (strtolower($controller)) {
        case 'auth':
            switch (strtolower($method)) {
                case 'login':
                    $authController->login();
                    break;

                case 'logout':
                    $authController->logout();
                    break;

                default:
                    // Handle unknown methods
                    header('HTTP/1.0 404 Not Found');
                    echo '404 Not Found';
                    break;
            }
            break;
        case 'dashboard':
            $authController->dashboard();
            break;
        case 'pontren':
            switch (strtolower($method)) {
                case 'show':
                    $pontrenController->index();
                    break;
                case 'cetak':
                    $pontrenController->print($id);
                    break;
                case 'edit':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $pontrenController->edit($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $pontrenController->updateStatus($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'delete':
                    $pontrenController->delete($id);
                    break;

                case 'getall':
                    $status = isset($_GET['status']) ? $_GET['status'] : 'DISETUJUI';
                    $pontrenController->getAllJson($status);
                    break;
                case 'add':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $pontrenController->addPontren($_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;

                default:
                    // Handle unknown methods
                    header('HTTP/1.0 404 Not Found');
                    echo '404 Not Found';
                    break;
            }
            break;
        case 'mdt':
            switch (strtolower($method)) {
                case 'show':
                    $mdtController->index();
                    break;
                case 'cetak':
                    $mdtController->print($id);
                    break;
                case 'edit':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $mdtController->edit($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $mdtController->updateStatus($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'delete':
                    $mdtController->delete($id);
                    break;

                case 'getall':
                    $status = isset($_GET['status']) ? $_GET['status'] : 'DISETUJUI';
                    $mdtController->getAllJson($status);
                    break;
                case 'add':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $mdtController->addMDT($_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;

                default:
                    // Handle unknown methods
                    header('HTTP/1.0 404 Not Found');
                    echo '404 Not Found';
                    break;
            }
            break;
        case 'staff_mdt':
            switch (strtolower($method)) {
                case 'show':
                    $staffMdtController->index();
                    break;
                case 'cetak':
                    $staffMdtController->print($id);
                    break;
                case 'edit':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $staffMdtController->edit($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $staffMdtController->updateStatus($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'delete':
                    $staffMdtController->delete($id);
                    break;

                case 'getall':
                    $status = isset($_GET['status']) ? $_GET['status'] : 'DISETUJUI';
                    $staffMdtController->getAllJson($status);
                    break;


                case 'add':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $staffMdtController->addStaffMDT($_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;

                default:
                    // Handle unknown methods
                    header('HTTP/1.0 404 Not Found');
                    echo '404 Not Found';
                    break;
            }
            break;

        case 'murid_mdt':
            switch (strtolower($method)) {
                case 'show':
                    $muridMdtController->index();
                    break;
                case 'cetak':
                    $muridMdtController->print($id);
                    break;
                case 'edit':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $muridMdtController->edit($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;
                case 'update':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $muridMdtController->updateStatus($id, $_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;

                case 'delete':
                    $muridMdtController->delete($id);
                    break;

                case 'getall':
                    $status = isset($_GET['status']) ? $_GET['status'] : 'DISETUJUI';
                    $muridMdtController->getAllJson($status);
                    break;

                case 'add':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $muridMdtController->addMuridMDT($_POST);
                    } else {
                        echo 'Invalid request method';
                    }
                    break;

                default:
                    // Handle unknown methods
                    header('HTTP/1.0 404 Not Found');
                    echo '404 Not Found';
                    break;
            }
            break;

        default:
            // Handle unknown controllers
            header('HTTP/1.0 404 Not Found');
            echo '404 Not Found';
            break;
    }
};