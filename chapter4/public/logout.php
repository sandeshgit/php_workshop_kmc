<?php
if(session_status() == PHP_SESSION_NONE){
  session_start();
}

require_once __DIR__ . '/../src/Core/Autoloader.php';

use App\Controllers\AuthController;

$auth = new AuthController();
$auth->logout();