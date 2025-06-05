<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Model\Pontren;
use Sfy\AplikasiDataKemenagPAI\Helpers\PrintDataHelper;

class DataPontren
{
    private $pontrenModel;

    public function __construct()
    {
        $this->pontrenModel = new Pontren();
        SessionHelper::startSession();
    }

    // Display the data
    public function index()
    {
        // Check if admin is already logged in
        if (!SessionHelper::isUserLoggedIn()) {
            // If not logged in, redirect to login page
            header('Location: /auth/login');
            exit();
        }

        $username = SessionHelper::getUsername();
        $isKepalaLab = SessionHelper::isKepalaLab();
        $role = SessionHelper::getRole();
        $data = $this->pontrenModel->getAll('DISETUJUI'); // Fetch all lembaga_pontren data
        include __DIR__ . '/../View/DataPontren/index.php';
    }
    public function print($id)
    {
        $data = $this->pontrenModel->getAll('DISETUJUI');
        include __DIR__ . '/../View/DataPontren/cetak.php';
    }

    // Handle lembaga_pontren editing
    public function edit($id, $data)
    {
        if (!$data['status']) {
            $data['status'] = 'DIPROSES';
        }
        $result = $this->pontrenModel->edit($id, $data);
        header('Content-Type: application/json');
        echo json_encode($result ? ['success' => true] : ['success' => false]);
    }
    public function updateStatus($id, $data)
    {
        $result = $this->pontrenModel->updateStatus($id, $data);
        header('Content-Type: application/json');
        echo json_encode($result ? ['success' => true] : ['success' => false]);
    }

    // Handle lembaga_pontren soft deletion
    public function delete($id)
    {
        $result = $this->pontrenModel->softDelete($id);
        header('Content-Type: application/json');
        echo json_encode($result ? ['success' => true] : ['success' => false]);
    }


    // Get all lembaga_pontren records in JSON format
    public function getAllJson($status)
    {
        header('Content-Type: application/json');
        $data = $this->pontrenModel->getAll($status);

        echo json_encode($data);
    }

    // Add a new lembaga_pontren record
    public function addPontren($data)
    {
        $result = $this->pontrenModel->add($data);
        header('Content-Type: application/json');
        echo json_encode($result ? ['success' => true] : ['success' => false]);
    }
}