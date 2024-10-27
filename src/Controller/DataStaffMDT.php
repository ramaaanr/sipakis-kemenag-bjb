<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Model\StaffMDT;
use Sfy\AplikasiDataKemenagPAI\Helpers\PrintDataHelper;

class DataStaffMDT
{
  private $staffMdtModel;

  public function __construct()
  {
    $this->staffMdtModel = new StaffMDT();
    SessionHelper::startSession();
  }

  // Display the StaffMDT data
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
    $data = $this->staffMdtModel->getAll(); // Fetch all lembaga_mdt data
    include __DIR__ . '/../View/DataStaffMDT/index.php';
  }

  public function print($id)
  {
    $data = $this->staffMdtModel->getAll();
    include __DIR__ . '/../View/DataStaffMDT/cetak.php';
  }

  // Handle lembaga_mdt editing
  public function edit($id, $data)
  {
    $result = $this->staffMdtModel->edit($id, $data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true,] : ['success' => false]);
  }

  // Handle lembaga_mdt soft deletion
  public function delete($id)
  {
    $result = $this->staffMdtModel->softDelete($id);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }

  // Get all lembaga_mdt records in JSON format
  public function getAllJson()
  {
    header('Content-Type: application/json');
    $data = $this->staffMdtModel->getAll();
    echo json_encode($data);
  }

  // Add a new lembaga_mdt record
  public function addStaffMDT($data)
  {
    $result = $this->staffMdtModel->add($data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }
}