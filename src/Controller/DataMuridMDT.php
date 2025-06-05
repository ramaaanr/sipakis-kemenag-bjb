<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Model\MuridMDT;
use Sfy\AplikasiDataKemenagPAI\Helpers\PrintDataHelper;

class DataMuridMDT
{
  private $muridMdtModel;

  public function __construct()
  {
    $this->muridMdtModel = new MuridMDT();
    SessionHelper::startSession();
  }

  // Display the MuridMDT data
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

    $data = $this->muridMdtModel->getAll('DISETUJUI'); // Fetch all lembaga_mdt data
    include __DIR__ . '/../View/DataMuridMDT/index.php';
  }

  public function print($id)
  {
    $data = $this->muridMdtModel->getAll('DISETUJUI');
    include __DIR__ . '/../View/DataMuridMDT/cetak.php';
  }

  // Handle lembaga_mdt editing
  public function edit($id, $data)
  {
    if (!$data['status']) {
      $data['status'] = 'DIPROSES';
    }
    $result = $this->muridMdtModel->edit($id, $data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true,] : ['success' => false]);
  }
  public function updateStatus($id, $data)
  {
    $result = $this->muridMdtModel->updateStatus($id, $data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }

  // Handle lembaga_mdt soft deletion
  public function delete($id)
  {
    $result = $this->muridMdtModel->softDelete($id);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }

  // Get all lembaga_mdt records in JSON format
  public function getAllJson($status)
  {
    header('Content-Type: application/json');
    $data = $this->muridMdtModel->getAll($status);
    echo json_encode($data);
  }

  // Add a new lembaga_mdt record
  public function addMuridMDT($data)
  {
    $result = $this->muridMdtModel->add($data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }
}