<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Model\Barang;
use Sfy\AplikasiDataKemenagPAI\Helpers\PrintDataHelper;

class DataBarang
{
    private $barangModel;

    public function __construct()
    {
        $this->barangModel = new Barang();
        SessionHelper::startSession();
    }

    // Display the data
    public function index()
    {
        // Check if admin is already logged in
        if (!SessionHelper::isAdminLoggedIn()) {
            // If logged in, redirect to dashboard
            header('Location: /auth/login');
            exit();
        }
        $username = SessionHelper::getUsername();
        $isKepalaLab = SessionHelper::isKepalaLab();
        $data = $this->barangModel->getAll();
        include __DIR__ . '/../View/DataBarang/index.php';
    }

    // Handle item editing
    public function edit($id, $data)
    {
        $result = $this->barangModel->edit($id, $data);
        header('Content-Type: application/json');
        echo json_encode($result);
        if ($result) {
            // Redirect or display a success message
        } else {

            // Handle the error
            echo "Error updating the item.";
        }
    }

    // Handle item soft deletion
    public function delete($id)
    {
        if ($this->barangModel->softDelete($id)) {
            // Redirect or display a success message
            header('Location: /barang');
        } else {
            // Handle the error
            echo "Error deleting the item.";
        }
    }

    // Get all items in JSON format
    public function getAllJson()
    {
        header('Content-Type: application/json');
        $data = $this->barangModel->getAll();
        echo json_encode($data);
    }
    public function getAllEmptyStock()
    {
        header('Content-Type: application/json');
        $data = $this->barangModel->getAllEmptyStock();
        echo json_encode($data);
    }


    // Add a new Barang
    public function addBarang($data)
    {
        $result = $this->barangModel->add($data);
        header('Content-Type: application/json');
        echo json_encode($result ? ['success' => true] : ['success' => false]);
    }

    public function exportBarangToPdf()
    {
        $data = $this->barangModel->getAll();
        PrintDataHelper::exportDataBarang($data);
    }
    public function exportDataHabis()
    {
        $data = $this->barangModel->getAllEmptyStock();
        PrintDataHelper::exportDataBarangHabis($data);
    }
}
