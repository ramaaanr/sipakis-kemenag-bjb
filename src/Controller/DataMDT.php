<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;
use Sfy\AplikasiDataKemenagPAI\Model\MDT;
use Sfy\AplikasiDataKemenagPAI\Helpers\PrintDataHelper;

class DataMDT
{
  private $mdtModel;

  public function __construct()
  {
    $this->mdtModel = new MDT();
    SessionHelper::startSession();
  }

  // Display the MDT data
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
    $data = $this->mdtModel->getAll(); // Fetch all lembaga_mdt data
    include __DIR__ . '/../View/DataMDT/index.php';
  }

  public function print($id)
  {
    $data = $this->mdtModel->getAll();
    include __DIR__ . '/../View/DataMDT/cetak.php';
  }

  // Handle lembaga_mdt editing
  public function edit($id, $data)
  {
    $result = $this->mdtModel->edit($id, $data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true,] : ['success' => false]);
  }

  // Handle lembaga_mdt soft deletion
  public function delete($id)
  {
    $result = $this->mdtModel->softDelete($id);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }

  // Get all lembaga_mdt records in JSON format
  public function getAllJson()
  {
    header('Content-Type: application/json');
    $data = $this->mdtModel->getAll();
    echo json_encode($data);
  }

  // Add a new lembaga_mdt record
  public function addMDT($data)
  {
    $result = $this->mdtModel->add($data);
    header('Content-Type: application/json');
    echo json_encode($result ? ['success' => true] : ['success' => false]);
  }
}