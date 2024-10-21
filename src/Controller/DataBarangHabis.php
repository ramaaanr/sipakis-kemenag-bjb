<?php

namespace Sfy\AplikasiDataKemenagPAI\Controller;

use Sfy\AplikasiDataKemenagPAI\Helpers\SessionHelper;

class DataBarangHabis
{


    public function __construct()
    {
        SessionHelper::startSession();
    }
    public function index()
    {
        $username = SessionHelper::getUsername();
        include __DIR__ . '/../View/DataBarangHabis/index.php';
    }
}
